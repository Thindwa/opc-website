@php
    $footerPage = \App\Models\Page::where('slug', 'footer')->first();

@endphp

@if ($footerPage && $footerPage->content)
    <footer id="footer" class="footer bg-overlay">
        <div class="footer-main py-5">
            <div class="container">
                <div class="row justify-content-between">
                    @foreach ($footerPage->content as $index => $block)
                        @php
                            $type = $block['type'] ?? null;
                            $data = $block['data'] ?? [];
                            $view = $type && class_exists($type) ? $type::view() : null;

                            // Fallback static titles
                            $fallbackTitles = [
                                'About Us',
                                'Our Contacts & Hours',
                            ];
                            $staticTitle = $fallbackTitles[$index] ?? null;
                        @endphp

                        @if ($view && view()->exists($view))
                            <div class="col-lg-4 col-md-6 footer-widget mb-4 mb-md-0">
                                @if (!empty($data['title']))

                            @elseif($staticTitle)
                                <h3 class="widget-title text-white mb-4">{{ $staticTitle }}</h3>
                            @endif

                            {{-- Render block without repeating the title --}}
                            {!! view($view, collect($data)->except('title')->toArray())->render() !!}

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Copyright Section --}}
        <div class="copyright py-3 bg-dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="copyright-info text-center text-md-left">
                            <span class="text-light">
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script>,
                                Office of the President and Cabinet.
                                Developed by <a href="#" class="text-success">Dept. of E-Government</a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-center text-md-right">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ route('about') }}" class="text-light">About</a></li>
                                <li class="list-inline-item mx-2">|</li>
                                <li class="list-inline-item"><a href="{{ route('profile') }}" class="text-light">H.E. Profile</a></li>
                                <li class="list-inline-item mx-2">|</li>
                                <li class="list-inline-item"><a href="{{ route('executive') }}" class="text-light">Executive</a></li>
                                <li class="list-inline-item mx-2">|</li>
                                <li class="list-inline-item"><a href="news-left-sidebar.html" class="text-light">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Back to Top --}}
        <div id="back-to-top" class="back-to-top position-fixed">
            <button class="btn btn-success rounded-circle" title="Back to Top" style="width: 50px; height: 50px;">
                <i class="fa fa-arrow-up"></i>
            </button>
        </div>
    </footer>
@endif


<style>
.footer {
background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('frontendassets/images/footer-bg.jpg');
background-size: cover;
background-position: center;
color: #fff;
}

.widget-title {
font-size: 1.25rem;
font-weight: 600;
position: relative;
padding-bottom: 10px;
}

.widget-title:after {
content: '';
position: absolute;
left: 0;
bottom: 0;
width: 50px;
height: 2px;
background: #28a745;
}

.footer-social a {
display: inline-block;
width: 36px;
height: 36px;
line-height: 36px;
text-align: center;
background: #980816;
border-radius: 50%;
margin-right: 8px;
transition: all 0.3s;
}

.footer-social a:hover {
background: #28a745;
color: #fff;
transform: translateY(-3px);
}

.copyright {
border-top: 1px solid #980816;
}

.list-arrow li {
position: relative;
padding-left: 20px;
margin-bottom: 10px;
}

.list-arrow li:before {
content: '\f054';
font-family: 'Font Awesome 5 Free';
font-weight: 900;
position: absolute;
left: 0;
color: #28a745;
font-size: 12px;
}

@media (max-width: 768px) {
.footer-widget {
  margin-bottom: 30px;
}

.footer-menu ul li {
  display: block;
  margin-bottom: 5px;
}
}
</style>
