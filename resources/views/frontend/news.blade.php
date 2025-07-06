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
                                <li class="breadcrumb-item active" aria-current="page">News Center</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- News Section -->
<section class="news-section section-padding">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h4 class="section-title">Latest News & Updates</h4>
            <div class="title-divider">
                <span class="divider-line"></span>
                <span class="divider-icon">
                    <i class="fas fa-newspaper"></i>
                </span>
                <span class="divider-line"></span>
            </div>
        </div>

        <div class="row">
            @foreach ([
                [
                    'image' => 'news1.jpg',
                    'title' => 'Chakwera hails Pope Francis for his love and humility',
                    'excerpt' => 'President Dr Lazarus Chakwera has described late Pope Francis as a man of grand vision for humanity, kindness and faith.',
                    'date' => 'April 26, 2025'
                ],
                [
                    'image' => 'news2.jpg',
                    'title' => 'National Action Plan for Open Government Partnership in Malawi',
                    'excerpt' => 'National Action Plan for Open Government Partnership in Malawi.',
                    'date' => 'April 15, 2025'
                ],
                [
                    'image' => 'news3.jpg',
                    'title' => 'Chakwera Satisfied With Projects In Blantyre And Chikwawa',
                    'excerpt' => 'Chakwera Satisfied With Projects In Blantyre And Chikwawa.',
                    'date' => 'April 10, 2025'
                ],
                [
                    'image' => 'news4.jpg',
                    'title' => 'International Federation of Red Cross and Red Crescent (IFRC) Secretary General Meets President Chakwera   ',
                    'excerpt' => 'International Federation of Red Cross and Red Crescent (IFRC) Secretary General Meets President Chakwera  at Kamuzu Palace .',
                    'date' => 'March 17, 2025'
                ],
                [
                    'image' => 'news5.jpg',
                    'title' => 'US government commended for assisting Malawi with new secondary schools',
                    'excerpt' => 'US government commended for assisting Malawi with new secondary schools.',
                    'date' => 'March 15, 2025'
                ],
                [
                    'image' => 'news7.jpg',
                    'title' => '2023-2024 National Forestry Season Launched',
                    'excerpt' => '2023-2024 National Forestry Season Launched.',
                    'date' => 'February 18, 2025'
                ],
                [
                    'image' => 'news6.jpg',
                    'title' => 'Faith leaders reaffirm their commitment to work with government ',
                    'excerpt' => 'Faith leaders reaffirm their commitment to work with government in promoting development, peace and unity.',
                    'date' => 'February 05, 2025'
                ],
                [
                    'image' => 'news9.jpg',
                    'title' => 'President Chakwera Opens 2024/2025 Budget Session ',
                    'excerpt' => 'President Chakwera Opens 2024/2025 Budget Session with the State of the Nation Address (SONA).',
                    'date' => 'February 02, 2025'
                ],
                [
                    'image' => 'news8.jpg',
                    'title' => 'Government Commited To Uplift Mzuzu University',
                    'excerpt' => 'President Dr. Lazarus Chakwera has said the construction of the Mzuzu University Auditorium and Library is part of his administration.',
                    'date' => 'January 28, 2025'
                ]
            ] as $news)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="news-card card h-100 border-0 shadow-sm">
                    <div class="news-image-wrapper">
                        <img loading="lazy" class="card-img-top" src="{{ asset('frontendassets/images/news/'.$news['image']) }}" alt="{{ $news['title'] }}">
                    </div>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="text-muted"><i class="far fa-calendar-alt mr-2"></i>{{ $news['date'] }}</span>
                        </div>
                        <h3 class="card-title">
                            <a href="{{route('singlenews')}}" class="stretched-link">{{ $news['title'] }}</a>
                        </h3>
                        <p class="card-text">{{ $news['excerpt'] }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                <a class="learn-more" href="{{route('singlenews')}}" aria-label="Read more about {{ $news['title'] }}">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="News pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="route('singlenews')" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<style>
/* Banner */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 300px;
    position: relative;
    display: flex;
    align-items: center;
}
.banner-area::before {
    content: '';
    background: rgba(0,0,0,0.6);
    position: absolute;
    width: 100%;
    height: 100%;
}
.banner-text {
    position: relative;
    z-index: 1;
    color: #fff;
}
.banner-title {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}

/* News Section */
.news-section {
    padding: 5rem 0;
    background-color: #f8f9fa;
}
.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.title-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1.5rem auto;
    max-width: 300px;
}
.divider-line {
    flex: 1;
    height: 1px;
    background: #dee2e6;
}
.divider-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #5bc0de;
    border: 1px solid #dee2e6;
    margin: 0 15px;
    font-size: 1.25rem;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

/* News Cards */
.news-card {
    border-radius: 8px;
    transition: all 0.3s ease;
    overflow: hidden;
}
.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.news-image-wrapper {
    overflow: hidden;
    height: 200px;
}
.news-card img {
    transition: transform 0.5s ease;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.news-card:hover img {
    transform: scale(1.05);
}
.card-title {
    font-size: 1rem; /* Changed from 1.25rem to 1rem for medium size */
    font-weight: 500; /* Changed from 600 to 500 for medium weight */
    margin-bottom: 1rem;
    line-height: 1.4;
}
.card-title a {
    color: #2c3e50;
    text-decoration: none;
    transition: color 0.3s ease;
}
.card-title a:hover {
    color: #5bc0de;
}
.card-text {
    color: #6c757d;
    margin-bottom: 1.5rem;
    font-size: 0.9rem; /* Adjusted to complement the medium title size */
}
.learn-more {
    color: #5bc0de;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s ease;
}
.learn-more:hover {
    color: #2c3e50;
}

/* Pagination */
.pagination {
    margin-top: 3rem;
}
.page-item.active .page-link {
    background-color: #5bc0de;
    border-color: #5bc0de;
}
.page-link {
    color: #2c3e50;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: 4px;
}
.page-link:hover {
    color: #5bc0de;
    background-color: #f8f9fa;
}

/* Responsive */
@media (max-width: 992px) {
    .banner-title { font-size: 1.75rem; }
    .section-title { font-size: 1.4rem; }
    .news-image-wrapper { height: 180px; }
    .card-title { font-size: 0.95rem; } /* Adjusted for medium size on tablets */
}
@media (max-width: 768px) {
    .banner-area { height: 250px; }
    .banner-title { font-size: 1.5rem; }
    .section-title { font-size: 1.3rem; }
    .divider-icon { width: 40px; height: 40px; font-size: 1rem; }
    .news-image-wrapper { height: 160px; }
    .card-title { font-size: 0.9rem; } /* Adjusted for medium size on mobile */
}
@media (max-width: 576px) {
    .banner-title { font-size: 1.4rem; }
    .news-section { padding: 3rem 0; }
    .news-image-wrapper { height: 140px; }
    .card-title { font-size: 0.85rem; } /* Final adjustment for smallest screens */
}
</style>

@endsection
