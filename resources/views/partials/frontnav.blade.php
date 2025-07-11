<div id="top-bar" class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i>
                        <p class="info-text">OPC, Capital Hill Circle, Private Bag 301, Capital City, Lilongwe 3</p>
                    </li>
                </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">

                    <a title="Boma - Mail" href="https://mail.boma.gov.mw/" target="_blank"
                        rel="noopener noreferrer">Boma - Mail</a>

                </ul>
            </div>
            <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
<!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
    <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-1 mb-md-1 mb-lg-0">
                        <a class="d-block" href="index.html">
                            <img loading="lazy" src="{{asset('frontendassets/images/logo.jpg')}}" alt="Emblame"
                                style="height: 50px; width: auto;">
                        </a>
                    </div><!-- logo end -->
                    <div class="col-lg-9 header-right">
                        <ul class="top-info-box">
                            <li class="header-get-a-quote">
                                <a href="#" style="display: inline-block; padding: 0;">
                                    <img src="{{asset('frontendassets/images/flags/emblam1.jpg')}}" alt="Malawi Flag"
                                        style="height: 40px; width: auto; border: none; box-shadow: none;">
                                </a>
                            </li>
                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>

    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto flex-wrap ">

                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('about') }}">OPC Headquarters</a></li>
                                        <li><a href="{{ route('executive') }}">The Executive</a></li>
                                        <li><a href="{{ route('profile') }}">His Excellency Profile</a></li>
                                        <li><a href="{{ route('management') }}">OPC Top Management</a></li>
                                        {{-- <li><a href="{{ route('charter') }}">Service Charter</a></li> --}}
                                        <li><a href="{{ route('history') }}">History of the Republic of Malawi</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="nav-link" href="{{route('departments.index')}}">Departments</a></li>

                                {{-- <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        id="departmentsDropdown" aria-haspopup="true" aria-expanded="false">
                                        Departments <i class="fa fa-angle-down ml-1"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="departmentsDropdown">
                                        <li><a class="dropdown-item" href="{{ route('dodma') }}">Disaster Management
                                                Affairs</a></li>
                                        <li><a class="dropdown-item" href="{{ route('human') }}">Department of Human
                                                Resource Management & Development</a></li>
                                        <li><a class="dropdown-item" href="{{ route('statutory') }}">Statutory
                                                Corporations</a></li>
                                        <li><a class="dropdown-item" href="{{ route('printing') }}">Printing
                                                Services</a></li>
                                        <li><a class="dropdown-item" href="{{ route('civil') }}">Civil Service Club</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('cgstores') }}">Central
                                                Government Stores</a></li>
                                        <li><a class="dropdown-item" href="{{ route('contracting') }}">Government
                                                Contracting Unit</a></li>
                                        <li><a class="dropdown-item" href="{{ route('performance') }}">Performance
                                                Reporting Department</a></li>
                                        <li><a class="dropdown-item" href="{{ route('events') }}">Public Events</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('innovations') }}">Innovations
                                                and Creativity</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cabinet
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('ministers') }}">Ministers</a></li>
                                        <li><a href="{{ route('deputy') }}">Deputy Ministers</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('charter') }}"
                                        rel="noopener noreferrer">Service Charter</a>
                                </li>
                                {{-- <li class="nav-item"><a class="nav-link" href="{{route('services')}}">Services</a></li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('news') }}">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('upcoming') }}">Events</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Resources <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">

                                        <li><a href="{{ route('documents') }}">Documents Library</a></li>
                                        <li><a href="{{ route('photo') }}">Photo Gallery</a></li>
                                        <li><a href="{{ route('video') }}">Video Gallery</a></li>

                                        {{-- <li><a href="404.html">Publications</a></li> --}}
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="https://ogp.gov.mw/" target="_blank"
                                        rel="noopener noreferrer">OGP</a>
                                </li>

                                <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Contact
                                        </a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->

        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
<!--/ Header end -->
