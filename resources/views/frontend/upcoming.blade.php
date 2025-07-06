@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
<div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
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
</div>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Events Calendar</title>
    <style>
        /* Banner */
        .banner-area {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 250px;
            position: relative;
        }
        .banner-area::before {
            content: '';
            background: rgba(0,0,0,0.6);
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .banner-text {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        /* Titles */
        .banner-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #2ecc71;
            --light-accent: #e8f8f0;
            --text-color: #2c3e50;
            --light-bg: #f8f9fa;
            --border-radius: 10px;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--text-color);
        }

        /* Main Content Styling */
        .main-content {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            margin-bottom: 30px;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: white;
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            height: 100%;
        }

        .sidebar-title {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.1rem;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 10px;
            position: relative;
        }

        .sidebar-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .month-list {
            list-style: none;
            padding: 0;
        }

        .month-list li {
            margin-bottom: 8px;
        }

        .month-list a {
            color: var(--primary-color);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .month-list a:before {
            content: '';
            position: absolute;
            left: -100%;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: var(--light-accent);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .month-list a:hover,
        .month-list a.active {
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .month-list a:hover:before,
        .month-list a.active:before {
            left: 0;
        }

        /* Current Month Events Header */
        .events-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
            position: relative;
        }

        .events-header:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -1px;
            width: 100px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .events-header h2 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
            display: flex;
            align-items: center;
        }

        .events-header h2 i {
            color: var(--accent-color);
            margin-right: 10px;
            font-size: 1.2em;
        }

        /* Month Navigation */
        .month-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: white;
            padding: 15px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .month-navigation h4 {
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
            font-size: 1.1rem;
            flex-grow: 1;
            text-align: center;
        }

        .month-navigation .btn {
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Calendar Styling */
        .calendar-container {
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            box-shadow: var(--box-shadow);
        }

        .calendar {
            width: 100%;
        }

        .calendar th {
            text-align: center;
            color: var(--primary-color);
            font-weight: 600;
            padding: 12px 5px;
            font-size: 0.85rem;
        }

        .calendar td {
            text-align: center;
            padding: 10px 5px;
            position: relative;
            height: 40px;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .calendar td:hover {
            background-color: var(--light-accent);
        }

        .event-day {
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.2s;
        }

        .event-day:hover {
            transform: scale(1.1);
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.2);
        }

        .current-day {
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            box-shadow: 0 0 0 2px rgba(46, 204, 113, 0.3);
        }

        /* Event Cards */
        .event-card {
            margin-bottom: 30px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: none;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            background-color: white;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .event-badge {
            background-color: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 12px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .card-text {
            color: #555;
            line-height: 1.7;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        /* Upcoming Events Section */
        .upcoming-events {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .upcoming-event-item {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f1f1;
        }

        .upcoming-event-date {
            min-width: 70px;
            text-align: center;
            margin-right: 15px;
            background-color: var(--light-accent);
            border-radius: 6px;
            padding: 10px;
        }

        .upcoming-event-day {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-color);
            line-height: 1;
        }

        .upcoming-event-month {
            font-size: 0.8rem;
            color: var(--primary-color);
            text-transform: uppercase;
            font-weight: 600;
        }

        .upcoming-event-details {
            flex-grow: 1;
        }

        .upcoming-event-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .upcoming-event-time {
            font-size: 0.9rem;
            color: #666;
        }

        /* No Events Styling */
        .no-events {
            padding: 40px;
            background: white;
            border-radius: var(--border-radius);
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        .no-events i {
            font-size: 3rem;
            color: #e0e0e0;
            margin-bottom: 15px;
        }

        .no-events h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .calendar th,
            .calendar td {
                padding: 8px 3px;
                font-size: 0.8rem;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .events-header h2 {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-bottom: 30px;
            }

            .event-card .col-md-5 {
                height: 200px;
            }

            .events-header h2 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Sidebar Column - Browse by Month -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <h4 class="sidebar-title">Browse by month</h4>
                    <ul class="month-list" id="month-list">
                        <li><a href="#" data-month="0">January</a></li>
                        <li><a href="#" data-month="1">February</a></li>
                        <li><a href="#" data-month="2">March</a></li>
                        <li><a href="#" data-month="3">April</a></li>
                        <li><a href="#" data-month="4">May</a></li>
                        <li><a href="#" data-month="5">June</a></li>
                        <li><a href="#" data-month="6">July</a></li>
                        <li><a href="#" data-month="7">August</a></li>
                        <li><a href="#" data-month="8">September</a></li>
                        <li><a href="#" data-month="9">October</a></li>
                        <li><a href="#" data-month="10">November</a></li>
                        <li><a href="#" data-month="11">December</a></li>
                    </ul>

                    <!-- Upcoming Events Sidebar -->
                    <div class="upcoming-events">
                        <h4 class="sidebar-title">Upcoming Events</h4>
                        <div id="upcoming-events-list">
                            <!-- Will be populated by JavaScript -->
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
                                        <i class="far fa-calendar-alt"></i>Current month events
                                    </h2>
                                </div>

                                <!-- Event Cards Container -->
                                <div class="col-lg-12" id="events-container">
                                    <div class="no-events">
                                        <i class="far fa-calendar-times"></i>
                                        <h4>No events scheduled</h4>
                                        <p class="text-muted">There are no events scheduled for this month.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Dynamic Calendar -->
                            <div class="col-lg-4">
                                <!-- Current Month Navigation -->
                                <div class="month-navigation">
                                    <button id="prev-month" class="btn btn-outline-danger">&lt; Prev</button>
                                    <h4 id="display-month-year" class="mb-0">
                                        Current month
                                    </h4>
                                    <button id="next-month" class="btn btn-outline-danger">Next &gt;</button>
                                </div>

                                <div class="calendar-container">
                                    <table class="table table-borderless calendar">
                                        <thead>
                                            <tr>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tue</th>
                                                <th>Wed</th>
                                                <th>Thu</th>
                                                <th>Fri</th>
                                                <th>Sat</th>
                                            </tr>
                                        </thead>
                                        <tbody id="calendar-body">
                                            <!-- Calendar will be generated by JavaScript -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="calendar-legend mt-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="current-day me-2">1</span>
                                        <small>Today</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="event-day me-2">1</span>
                                        <small>Event day</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sample events data for demonstration
            const eventsByMonth = {
                0: [ // January
                    {
                        title: "New Year's National Address",
                        start_date: "2025-01-01",
                        end_date: null,
                        location: "National Assembly",
                        description: "President's New Year address to the nation",
                        image: null,
                        type: "Official event"
                    },
                    {
                        title: "Chilembwe Day",
                        start_date: "2025-01-15",
                        end_date: null,
                        location: "Chiradzuru",
                        description: "Commemoration day for Chilembwe Day",
                        image: null,
                        type: "Government meeting"
                    }
                ],
                1: [ // February
                    {
                        title: "National Unity Day",
                        start_date: "2025-02-10",
                        end_date: "2025-02-12",
                        location: "Various locations",
                        description: "Celebrations promoting national unity",
                        image: null,
                        type: "Public holiday"
                    }
                ],
                14: [ // May
                    {
                        title: "Kamuzu Day",
                        start_date: "2025-05-14",
                        end_date: "2025-05-14",
                        location: "Kamuzu Mausoleum",
                        description: "Commemoration of the late President Dr. Kamuzu Banda",
                        image: null,
                        type: "Official event"
                    },
                    {
                        title: "International Workers' Day",
                        start_date: "2025-05-01",
                        end_date: null,
                        location: "Nationwide",
                        description: "Celebration of workers' rights and achievements",
                        image: null,
                        type: "Public holiday"
                    }
                ],
                6: [ // July
                    {
                        title: "Independence Day",
                        start_date: "2025-07-06",
                        end_date: null,
                        location: "Kamuzu Stadium",
                        description: "Celebration of Malawi's independence",
                        image: null,
                        type: "National celebration"
                    }
                ],
                // Add current month events
                [new Date().getMonth()]: [
                    {
                        title: "OPC Website Presentation",
                        start_date: new Date().toISOString().split('T')[0],
                        end_date: null,
                        location: "Government Building",
                        description: "This is a sample event for the current month",
                        image: null,
                        type: "Demo event"
                    }
                ]
            };

            // Set initial month to current month
            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();
            const today = new Date();

            // Initialize calendar
            generateCalendar(currentMonth, currentYear);
            loadEventsForMonth(currentMonth);
            updateActiveMonthLink();
            updateMonthYearDisplay();
            loadUpcomingEvents();

            // Navigation event listeners
            document.getElementById('prev-month').addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                updateCalendar();
            });

            document.getElementById('next-month').addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                updateCalendar();
            });

            // Month list event listeners
            document.querySelectorAll('#month-list a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    currentMonth = parseInt(this.getAttribute('data-month'));
                    updateCalendar();
                });
            });

            function updateCalendar() {
                generateCalendar(currentMonth, currentYear);
                loadEventsForMonth(currentMonth);
                updateActiveMonthLink();
                updateMonthYearDisplay();
            }

            function generateCalendar(month, year) {
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                const calendarBody = document.getElementById('calendar-body');
                calendarBody.innerHTML = '';

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    if (date > daysInMonth) break;

                    const row = document.createElement('tr');

                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');

                        if (i === 0 && j < firstDay) {
                            cell.textContent = '';
                        } else if (date > daysInMonth) {
                            cell.textContent = '';
                        } else {
                            const daySpan = document.createElement('span');
                            daySpan.textContent = date;

                            // Highlight today (only if viewing current month and year)
                            if (year === today.getFullYear() && month === today.getMonth() && date === today.getDate()) {
                                daySpan.className = 'current-day';
                            }

                            // Highlight event days
                            const hasEvent = checkForEvent(month, date);
                            if (hasEvent) {
                                daySpan.className = 'event-day';
                                cell.title = hasEvent;
                            }

                            cell.appendChild(daySpan);
                            date++;
                        }

                        row.appendChild(cell);
                    }

                    calendarBody.appendChild(row);
                }
            }

            function loadEventsForMonth(month) {
                const eventsContainer = document.getElementById('events-container');
                const monthEvents = eventsByMonth[month] || [];

                if (monthEvents.length > 0) {
                    let eventsHTML = '<div class="row">';

                    monthEvents.forEach(event => {
                        const startDate = new Date(event.start_date);
                        const endDate = event.end_date ? new Date(event.end_date) : startDate;

                        let dateDisplay = startDate.getDate() + getOrdinalSuffix(startDate.getDate());
                        if (event.end_date && endDate > startDate) {
                            dateDisplay += ' - ' + endDate.getDate() + getOrdinalSuffix(endDate.getDate()) + ' ' + getMonthName(endDate.getMonth());
                        } else {
                            dateDisplay += ' ' + getMonthName(startDate.getMonth());
                        }

                        eventsHTML += `
                            <div class="col-md-12 mb-4">
                                <div class="card event-card">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <img src="${event.image || 'https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&h=500&q=80'}"
                                                 class="img-fluid w-100 h-100"
                                                 style="object-fit: cover;"
                                                 alt="${event.title}">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body p-4">
                                                <span class="event-badge">${event.type || 'Event'}</span>
                                                <h3 class="card-title">${event.title}</h3>
                                                <p class="card-text">
                                                    <strong class="text-danger"><i class="far fa-calendar mr-1"></i>Date:</strong>
                                                    ${dateDisplay}
                                                </p>
                                                <p class="card-text">
                                                    <strong class="text-danger"><i class="fas fa-map-marker-alt mr-1"></i>Venue:</strong> ${event.location}
                                                </p>
                                                <p class="card-text">${event.description}</p>
                                                <a href="#" class="btn btn-sm btn-outline-danger">More details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    eventsHTML += '</div>';
                    eventsContainer.innerHTML = eventsHTML;
                } else {
                    eventsContainer.innerHTML = `
                        <div class="no-events">
                            <i class="far fa-calendar-times"></i>
                            <h4>No events scheduled</h4>
                            <p class="text-muted">There are no events scheduled for ${getMonthName(currentMonth)} ${currentYear}.</p>
                        </div>
                    `;
                }
            }

            function loadUpcomingEvents() {
                const upcomingEventsList = document.getElementById('upcoming-events-list');
                let allEvents = [];

                // Collect all events from all months
                for (const month in eventsByMonth) {
                    if (eventsByMonth.hasOwnProperty(month)) {
                        eventsByMonth[month].forEach(event => {
                            allEvents.push({
                                ...event,
                                month: parseInt(month)
                            });
                        });
                    }
                }

                // Sort events by date
                allEvents.sort((a, b) => new Date(a.start_date) - new Date(b.start_date));

                // Filter upcoming events (today or future)
                const todayStr = today.toISOString().split('T')[0];
                const upcomingEvents = allEvents.filter(event =>
                    event.start_date >= todayStr
                ).slice(0, 1); // Show next 5 events

                if (upcomingEvents.length > 0) {
                    let upcomingHTML = '';

                    upcomingEvents.forEach(event => {
                        const startDate = new Date(event.start_date);
                        const endDate = event.end_date ? new Date(event.end_date) : startDate;

                        upcomingHTML += `
                            <div class="upcoming-event-item">
                                <div class="upcoming-event-date">
                                    <div class="upcoming-event-day">${startDate.getDate()}</div>
                                    <div class="upcoming-event-month">${getMonthName(startDate.getMonth()).substring(0, 3)}</div>
                                </div>
                                <div class="upcoming-event-details">
                                    <div class="upcoming-event-title">${event.title}</div>
                                    <div class="upcoming-event-time">
                                        <i class="far fa-clock mr-1"></i>
                                        ${formatTime(startDate)}
                                        ${event.end_date ? ' - ' + formatTime(endDate) : ''}
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    upcomingEventsList.innerHTML = upcomingHTML;
                } else {
                    upcomingEventsList.innerHTML = `
                        <div class="text-muted">No upcoming events scheduled</div>
                    `;
                }
            }

            function formatTime(date) {
                return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            }

            function checkForEvent(month, day) {
                const monthEvents = eventsByMonth[month] || [];
                let eventTitles = [];

                monthEvents.forEach(event => {
                    const startDate = new Date(event.start_date);
                    const endDate = event.end_date ? new Date(event.end_date) : startDate;

                    if (day >= startDate.getDate() && day <= endDate.getDate()) {
                        eventTitles.push(event.title);
                    }
                });

                return eventTitles.length > 0 ? eventTitles.join('\n') : false;
            }

            function updateActiveMonthLink() {
                document.querySelectorAll('#month-list a').forEach(link => {
                    link.classList.remove('active');
                    if (parseInt(link.getAttribute('data-month')) === currentMonth) {
                        link.classList.add('active');
                    }
                });
            }

            function updateMonthYearDisplay() {
                const monthYear = `${getMonthName(currentMonth)} ${currentYear}`;
                document.getElementById('display-month-year').textContent = monthYear;
                document.getElementById('current-month-year').innerHTML = `
                    <i class="far fa-calendar-alt"></i>${monthYear} events
                `;
            }

            function getMonthName(monthIndex) {
                const months = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                return months[monthIndex];
            }

            function getOrdinalSuffix(day) {
                if (day > 3 && day < 21) return 'th';
                switch (day % 10) {
                    case 1: return 'st';
                    case 2: return 'nd';
                    case 3: return 'rd';
                    default: return 'th';
                }
            }
        });
    </script>
</body>
@endsection
