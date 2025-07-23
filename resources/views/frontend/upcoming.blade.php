@extends('layouts.frontend')
<style>
    :root {
        --accent-color: #dc3545;
        --secondary-color: #0d6efd;
        --event-range-color: #ffc107;
        --event-start-color: #198754;
        --event-end-color: #6f42c1;
    }

    /* Sidebar */
    .sidebar-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .month-list {
        list-style: none;
        padding-left: 0;
    }

    .month-list li {
        margin-bottom: 0.5rem;
    }

    .month-list a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        display: block;
        border-radius: 4px;
    }

    .month-list a.active,
    .month-list a:hover {
        background-color: var(--accent-color);
        color: #fff;
    }

    /* Calendar Table */
    .calendar-container {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        overflow: hidden;
    }

    .calendar td {
        width: 14.28%;
        height: 80px;
        vertical-align: top;
        padding: 5px;
        position: relative;
    }

    .day-container {
        position: relative;
        height: 100%;
    }

    .day-number {
        font-size: 1rem;
        font-weight: bold;
        display: inline-block;
        padding: 2px 6px;
        border-radius: 50%;
        z-index: 2;
    }

    .current-day {
        background-color: var(--accent-color);
        color: #fff;
    }

    .event-day {
        background-color: var(--secondary-color);
        color: #fff;
    }

    .event-range {
        position: absolute;
        bottom: 0;
        left: 2px;
        right: 2px;
        height: 6px;
        background-color: var(--event-range-color);
        border-radius: 3px;
    }

    .event-start {
        background-color: var(--event-start-color) !important;
    }

    .event-end {
        background-color: var(--event-end-color) !important;
    }

    .event-single-day {
        background-color: var(--secondary-color) !important;
    }

    .event-continued {
        opacity: 0.8;
    }

    /* Event Cards */
    .event-card {
        border: 1px solid #dee2e6;
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .event-badge {
        display: inline-block;
        background-color: var(--accent-color);
        color: #fff;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-bottom: 0.5rem;
    }

    /* Upcoming Sidebar */
    .upcoming-event-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .upcoming-event-date {
        background-color: var(--secondary-color);
        color: #fff;
        text-align: center;
        padding: 8px;
        border-radius: 6px;
        margin-right: 10px;
        width: 50px;
    }

    .upcoming-event-day {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .upcoming-event-month {
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .legend-item {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }

    .legend-color {
        width: 18px;
        height: 18px;
        border-radius: 4px;
        margin-right: 10px;
    }
</style>

@section('content')

<!-- Banner Section -->
{{-- <div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-heading">
                        <h1 class="banner-title">Resource Center</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Events</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events Calendar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container-fluid py-4 mx-lg-0 mx-md-0">
    <div class="row">
        <!-- Sidebar Column - Browse by Month -->
        <div class="col-lg-3">
            <div class="sidebar">
                <h4 class="sidebar-title">Browse by month</h4>
                <ul class="month-list" id="month-list">
                    @foreach ([
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ] as $i => $month)
                        <li><a href="#" data-month="{{ $i }}">{{ $month }}</a></li>
                    @endforeach
                </ul>

                <!-- Upcoming Events Sidebar -->
                <div class="upcoming-events mt-5">
                    <h4 class="sidebar-title">Upcoming Events</h4>
                    <div id="upcoming-events-list">
                        <!-- Will be populated by JS -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Column -->
        <div class="col-lg-9">
            <div class="main-content">
                <section class="mb-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Current Month Events Header -->
                            <div class="events-header">
                                <h2 id="current-month-year">
                                    <i class="far fa-calendar-alt"></i> Events this Month
                                </h2>
                            </div>

                            <!-- Event Cards -->
                            <div class="col-lg-12" id="events-container">
                                <!-- Filled by JS -->
                            </div>
                        </div>

                        <!-- Calendar & Navigation -->
                        <div class="col-lg-4">
                            <div class="month-navigation mb-3">
                                <button id="prev-month" class="btn btn-outline-danger">&lt; Prev</button>
                                <h4 id="display-month-year" class="mb-0">Current month</h4>
                                <button id="next-month" class="btn btn-outline-danger">Next &gt;</button>
                            </div>

                            <div class="calendar-container">
                                <table class="table calendar table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Sun</th><th>Mon</th><th>Tue</th>
                                            <th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="calendar-body">
                                        <!-- Filled by JS -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="calendar-legend mt-3">
                                <h5 class="mb-3">Legend</h5>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: var(--accent-color);"></div>
                                    <small>Today</small>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: var(--secondary-color);"></div>
                                    <small>Event day</small>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: var(--event-range-color);"></div>
                                    <small>Event range</small>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: var(--event-start-color);"></div>
                                    <small>Event start</small>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: var(--event-end-color);"></div>
                                    <small>Event end</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

{{-- Inject Laravel Events into JavaScript --}}
<script>
    const eventsFromLaravel = @json($events);
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    // Process events and organize by month
    const eventsByMonth = {};
    const allEvents = [];

    eventsFromLaravel.forEach(event => {
        const start = new Date(event.start_date);
        const end = event.end_date ? new Date(event.end_date) : start;

        // Make sure end date is not before start date
        if (end < start) {
            event.end_date = event.start_date;
        }

        // Add to all events array
        allEvents.push({
            ...event,
            startDate: start,
            endDate: end
        });

        // Add to month index (for both start and end months if different)
        const startMonth = start.getMonth();
        const endMonth = end.getMonth();

        if (!eventsByMonth[startMonth]) eventsByMonth[startMonth] = [];
        eventsByMonth[startMonth].push(event);

        if (endMonth !== startMonth) {
            if (!eventsByMonth[endMonth]) eventsByMonth[endMonth] = [];
            eventsByMonth[endMonth].push(event);
        }
    });

    updateCalendar();
    loadUpcomingEvents();

    // Navigation event listeners
    document.getElementById('prev-month').addEventListener('click', () => {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        updateCalendar();
    });

    document.getElementById('next-month').addEventListener('click', () => {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        updateCalendar();
    });

    // Month list click handlers
    document.querySelectorAll('#month-list a').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            currentMonth = parseInt(link.dataset.month);
            updateCalendar();
        });
    });

    function updateCalendar() {
        generateCalendar(currentMonth, currentYear);
        loadEventsForMonth(currentMonth, currentYear);
        updateMonthYearDisplay();
        highlightActiveMonth();
    }

    function loadEventsForMonth(month, year) {
        const eventsContainer = document.getElementById('events-container');

        // Filter events for this month/year
        const monthEvents = allEvents.filter(event => {
            const eventStart = event.startDate;
            const eventEnd = event.endDate;

            // Check if event overlaps with the current month
            const firstDayOfMonth = new Date(year, month, 1);
            const lastDayOfMonth = new Date(year, month + 1, 0);

            return (eventStart <= lastDayOfMonth && eventEnd >= firstDayOfMonth);
        });

        if (monthEvents.length === 0) {
            eventsContainer.innerHTML = `
                <div class="no-events text-center my-5">
                    <i class="far fa-calendar-times fa-2x text-muted"></i>
                    <h4>No events scheduled</h4>
                    <p class="text-muted">There are no events scheduled for ${getMonthName(month)} ${year}.</p>
                </div>
            `;
            return;
        }

        let eventsHTML = '<div class="row">';
        monthEvents.forEach(event => {
            const displayDate = event.startDate.getTime() === event.endDate.getTime()
                ? `${formatDate(event.startDate)}`
                : `${formatDate(event.startDate)} - ${formatDate(event.endDate)}`;

            eventsHTML += `
                <div class="col-md-12 mb-4">
                    <div class="card event-card">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="${event.image || 'https://via.placeholder.com/400x300'}"
                                     alt="${event.title}"
                                     class="img-fluid w-100 h-100"
                                     style="object-fit: cover;">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-4">
                                    <span class="event-badge">${event.type}</span>
                                    <h3 class="card-title">${event.title}</h3>
                                    <p><strong class="text-danger"><i class="far fa-calendar mr-1"></i>Date:</strong> ${displayDate}</p>
                                    <p><strong class="text-danger"><i class="fas fa-map-marker-alt mr-1"></i>Venue:</strong> ${event.location}</p>
                                    <p class="card-text">${event.description}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        eventsHTML += '</div>';
        eventsContainer.innerHTML = eventsHTML;
    }

    function loadUpcomingEvents() {
        const list = document.getElementById('upcoming-events-list');
        const todayStr = today.toISOString().split('T')[0];

        const upcoming = allEvents
            .filter(e => e.startDate >= today && e.endDate >= today)
            .sort((a, b) => a.startDate - b.startDate)
            .slice(0, 5);

        if (upcoming.length === 0) {
            list.innerHTML = '<p class="text-muted">No upcoming events</p>';
            return;
        }

        let html = '';
        upcoming.forEach(event => {
            const start = event.startDate;
            const end = event.endDate;

            const displayDate = start.getTime() === end.getTime()
                ? formatDate(start, true)
                : `${formatDate(start, true)} - ${formatDate(end, true)}`;

            html += `
                <div class="upcoming-event-item">
                    <div class="upcoming-event-date">
                        <div class="upcoming-event-day">${start.getDate()}</div>
                        <div class="upcoming-event-month">${getMonthName(start.getMonth()).substring(0, 3)}</div>
                    </div>
                    <div class="upcoming-event-details">
                        <div class="upcoming-event-title">${event.title}</div>
                        <div class="upcoming-event-time">
                            <i class="far fa-clock"></i> ${displayDate}
                        </div>
                    </div>
                </div>
            `;
        });
        list.innerHTML = html;
    }

    function generateCalendar(month, year) {
    const tbody = document.getElementById('calendar-body');
    tbody.innerHTML = '';

    const firstDay = new Date(year, month, 1).getDay();
    const totalDays = new Date(year, month + 1, 0).getDate();
    let date = 1;

    const monthEvents = allEvents.filter(event => {
        const eventStart = new Date(event.startDate);
        const eventEnd = new Date(event.endDate);

        eventStart.setHours(0, 0, 0, 0);
        eventEnd.setHours(0, 0, 0, 0);

        const firstDayOfMonth = new Date(year, month, 1);
        const lastDayOfMonth = new Date(year, month + 1, 0);
        firstDayOfMonth.setHours(0, 0, 0, 0);
        lastDayOfMonth.setHours(0, 0, 0, 0);

        return (eventStart <= lastDayOfMonth && eventEnd >= firstDayOfMonth);
    });

    for (let i = 0; i < 6; i++) {
        const row = document.createElement('tr');

        for (let j = 0; j < 7; j++) {
            const cell = document.createElement('td');
            const dayContainer = document.createElement('div');
            dayContainer.className = 'day-container';

            if (i === 0 && j < firstDay) {
                cell.appendChild(dayContainer);
            } else if (date > totalDays) {
                cell.appendChild(dayContainer);
            } else {
                const dayNumber = document.createElement('span');
                dayNumber.className = 'day-number';
                dayNumber.textContent = date;

                const currentDate = new Date(year, month, date);
                currentDate.setHours(0, 0, 0, 0);

                const isToday = currentDate.getTime() === (new Date(today.getFullYear(), today.getMonth(), today.getDate())).getTime();
                if (isToday) {
                    dayNumber.classList.add('current-day');
                }

                const dayEvents = monthEvents.filter(event => {
                    const eventStart = new Date(event.startDate);
                    const eventEnd = new Date(event.endDate);
                    eventStart.setHours(0, 0, 0, 0);
                    eventEnd.setHours(0, 0, 0, 0);

                    return currentDate >= eventStart && currentDate <= eventEnd;
                });

                if (dayEvents.length > 0) {
                    dayNumber.classList.add('event-day');

                    dayEvents.forEach(event => {
                        const eventStart = new Date(event.startDate);
                        const eventEnd = new Date(event.endDate);
                        eventStart.setHours(0, 0, 0, 0);
                        eventEnd.setHours(0, 0, 0, 0);

                        const isStart = currentDate.getTime() === eventStart.getTime();
                        const isEnd = currentDate.getTime() === eventEnd.getTime();
                        const isSingleDay = eventStart.getTime() === eventEnd.getTime();

                        const marker = document.createElement('div');
                        marker.className = 'event-range';

                        if (isSingleDay) {
                            marker.classList.add('event-single-day');
                        } else {
                            if (isStart) {
                                marker.classList.add('event-start');
                            } else if (isEnd) {
                                marker.classList.add('event-end');
                            } else {
                                marker.classList.add('event-continued');
                            }
                        }

                        dayContainer.appendChild(marker);
                    });
                }

                dayContainer.appendChild(dayNumber);
                cell.appendChild(dayContainer);
                date++;
            }

            row.appendChild(cell);
        }

        tbody.appendChild(row);
        if (date > totalDays) break;
    }
}


    function updateMonthYearDisplay() {
        document.getElementById('display-month-year').textContent = `${getMonthName(currentMonth)} ${currentYear}`;
        document.getElementById('current-month-year').innerHTML = `<i class="far fa-calendar-alt"></i> ${getMonthName(currentMonth)} ${currentYear} events`;
    }

    function highlightActiveMonth() {
        document.querySelectorAll('#month-list a').forEach(a => {
            a.classList.remove('active');
            if (parseInt(a.dataset.month) === currentMonth) {
                a.classList.add('active');
            }
        });
    }

    function formatDate(date, includeTime = false) {
        const options = {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        };

        if (includeTime) {
            options.hour = '2-digit';
            options.minute = '2-digit';
            return date.toLocaleDateString(undefined, options);
        }

        return date.toLocaleDateString(undefined, options);
    }

    function getMonthName(index) {
        return ["January","February","March","April","May","June",
                "July","August","September","October","November","December"][index];
    }
});
</script>
@endsection

