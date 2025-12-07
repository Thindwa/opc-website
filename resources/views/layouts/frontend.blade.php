<!DOCTYPE html>
<html lang="en">
            <head>
                <!-- Basic Page Needs
                ================================================== -->
                <meta charset="utf-8">

                @php
                    // Get page-specific SEO or use defaults
                    $pageTitle = isset($seo) && isset($seo['title']) ? $seo['title'] : null;
                    $pageDescription = isset($seo) && isset($seo['description']) ? $seo['description'] : null;
                    $pageKeywords = isset($seo) && isset($seo['keywords']) ? $seo['keywords'] : null;
                    $pageImage = isset($seo) && isset($seo['image']) ? $seo['image'] : null;

                    // Get defaults from settings
                    $defaultTitle = setting('seo.title', 'Office of the President and Cabinet - Government of Malawi');
                    $defaultDescription = setting('seo.description', 'Official website of the Office of the President and Cabinet, Government of Malawi.');
                    $defaultKeywords = setting('seo.keywords', 'Malawi, Government, OPC, Office of the President and Cabinet');
                    $defaultImageSetting = setting('seo.image');
                    $defaultImage = $defaultImageSetting ? asset('storage/' . $defaultImageSetting) : asset('frontendassets/images/default.jpg');

                    // Use page-specific or defaults
                    $seoTitle = $pageTitle ?? $defaultTitle;
                    $seoDescription = $pageDescription ?? $defaultDescription;
                    $seoKeywords = $pageKeywords ?? $defaultKeywords;
                    $seoImage = $pageImage ?? $defaultImage;
                    $siteName = setting('general.brand_name', 'Office of the President and Cabinet');
                    $currentUrl = url()->current();
                @endphp

                <title>@yield('title', $seoTitle)</title>

                <!-- Mobile Specific Metas
                ================================================== -->
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

                <!-- SEO Meta Tags -->
                <meta name="description" content="{{ $seoDescription }}">
                @if(!empty($seoKeywords))
                <meta name="keywords" content="{{ $seoKeywords }}">
                @endif
                <meta name="author" content="{{ $siteName }}">
                <meta name="robots" content="index, follow">
                <link rel="canonical" href="{{ $currentUrl }}">

                <!-- Open Graph / Facebook -->
                <meta property="og:type" content="website">
                <meta property="og:url" content="{{ $currentUrl }}">
                <meta property="og:title" content="@yield('title', $seoTitle)">
                <meta property="og:description" content="{{ $seoDescription }}">
                <meta property="og:image" content="{{ $seoImage }}">
                <meta property="og:site_name" content="{{ $siteName }}">

                <!-- Twitter -->
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:url" content="{{ $currentUrl }}">
                <meta name="twitter:title" content="@yield('title', $seoTitle)">
                <meta name="twitter:description" content="{{ $seoDescription }}">
                <meta name="twitter:image" content="{{ $seoImage }}">

                @yield('meta')

                <!-- Favicon
                ================================================== -->
                <link rel="icon" type="image/png" href="frontendassets/images/favicon.png">

                <!-- CSS
                ================================================== -->
                <!-- Bootstrap -->
                <link rel="stylesheet" href="{{ asset('frontendassets/plugins/bootstrap/bootstrap.min.css')}}">
                <!-- FontAwesome -->
                <link rel="stylesheet" href="{{ asset('frontendassets/plugins/fontawesome/css/all.min.css')}}">
                <!-- Animation -->
                <link rel="stylesheet" href="{{ asset('frontendassets/plugins/animate-css/animate.css')}}">
                <!-- slick Carousel -->
                <link rel="stylesheet" href="{{ asset('frontendassets/plugins/slick/slick.css')}}">
                <link rel="stylesheet" href="{{ asset('frontendassets/plugins/slick/slick-theme.css')}}">
                <!-- Colorbox -->
                <link rel="stylesheet" href="{{ asset('frontendassets/plugins/colorbox/colorbox.css')}}">
                <!-- Template styles-->
                <link rel="stylesheet" href="{{ asset('frontendassets/css/style.css')}}">
                <!-- Slider styles -->
                <link rel="stylesheet" href="{{ asset('css/sliders.css')}}">
            </head>
        <body>
            <div class="body-inner">

                @include('partials.frontnav')
                @yield('content')

                <!-- FOOTER CODE WAS HERE-->
                @include('partials.frontfooter')
                <!-- Javascript Files
        ================================================== -->

                <!-- initialize jQuery Library -->
                <script src="{{asset('frontendassets/plugins/jQuery/jquery.min.js')}}"></script>
                <!-- Bootstrap jQuery -->
                <script src="{{asset('frontendassets/plugins/bootstrap/bootstrap.min.js')}}" defer></script>
                <!-- Slick Carousel -->
                <script src="{{asset('frontendassets/plugins/slick/slick.min.js')}}"></script>
                <script src="{{asset('frontendassets/plugins/slick/slick-animation.min.js')}}"></script>
                <!-- Color box -->
                <script src="{{asset('frontendassets/plugins/colorbox/jquery.colorbox.js')}}"></script>
                <!-- shuffle -->
                <script src="{{asset('frontendassets/plugins/shuffle/shuffle.min.js')}}" defer></script>


                <!-- Google Map API Key-->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
                <!-- Google Map Plugin-->
                <script src="{{asset('frontendassets/plugins/google-map/map.js')}}" defer></script>

                <!-- Template custom -->
                <script src="{{asset('frontendassets/js/script.js')}}"></script>

                </div><!-- Body inner end -->
        </body>
 </html>


