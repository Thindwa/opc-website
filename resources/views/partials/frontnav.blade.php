<style>
    .opc-header {
        position: sticky;
        top: 0;
        z-index: 1100;
        background: #fff;
        font-family: "Montserrat", sans-serif;
        box-shadow: 0 2px 14px rgba(15, 23, 42, 0.08);
    }

    .opc-header .container {
        max-width: 1540px;
        padding-left: 32px;
        padding-right: 32px;
    }

    .opc-header .top-bar {
        background: #3f3f3f;
        color: #fff;
        font-size: 12px;
        padding: 6px 0;
    }

    .opc-header .top-bar-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .opc-header .top-bar-left,
    .opc-header .top-bar-right {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .opc-header .top-bar-right {
        flex-wrap: nowrap;
    }

    .opc-header .top-bar a {
        color: #ffd9d9;
        text-decoration: none;
        font-size: 11px;
        white-space: nowrap;
        line-height: 1;
    }

    .opc-header .top-bar i {
        color: #2f8f3a;
        font-size: 13px;
        margin-right: 4px;
        vertical-align: -1px;
    }

    .opc-header .top-bar .divider {
        width: 1px;
        height: 12px;
        background: rgba(255, 255, 255, 0.28);
        align-self: center;
    }

    .opc-header .top-bar-right .nav-search {
        width: 28px;
        height: 28px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(17, 17, 17, 0.08);
        border: 1px solid rgba(17, 17, 17, 0.25);
        color: #2f8f3a;
        padding: 0;
        line-height: 1;
        vertical-align: middle;
        align-self: center;
        flex: 0 0 28px;
        position: relative;
        top: 0;
        transition: background 0.15s ease, border-color 0.15s ease, transform 0.15s ease;
    }

    .opc-header .top-bar-right .nav-search:hover {
        background: rgba(17, 17, 17, 0.14);
        border-color: rgba(47, 143, 58, 0.5);
        transform: translateY(-1px);
    }

    .opc-header .top-bar-right .nav-search i {
        margin-right: 0;
        font-size: 15px;
        color: inherit;
        line-height: 1;
        display: block;
        position: relative;
        top: 0;
    }

    .opc-header .main-header {
        background: #fff;
        border-bottom: 3px solid #8b0000;
        margin-bottom: 0;
    }

    .opc-header .main-header-inner {
        min-height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        flex-wrap: nowrap;
    }

    .opc-header .logo-area {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
        flex: 0 0 235px;
        max-width: 235px;
        text-decoration: none;
        color: inherit;
    }

    .opc-header .logo-mark {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .opc-header .logo-mark img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .opc-header .logo-text {
        line-height: 1.2;
    }

    .opc-header .logo-text .org-name {
        display: block;
        font-size: 9px;
        font-weight: 800;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        line-height: 1.1;
    }

    .opc-header .logo-text .org-sub {
        display: block;
        font-size: 8px;
        color: #8b0000;
        letter-spacing: 0.04em;
        margin-top: 2px;
    }

    .opc-header .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .opc-header .search-btn {
        width: 34px;
        height: 34px;
        border: 1px solid #cfcfcf;
        border-radius: 4px;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #555;
    }

    .opc-header .search-btn:hover {
        background: #fdf5f5;
        border-color: #8b0000;
        color: #8b0000;
    }

    .opc-header .search-btn i {
        margin-right: 0;
        color: inherit;
        font-size: 16px;
    }

    .opc-header .nav-row {
        flex: 1 1 auto;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        min-width: 0;
    }

    .opc-header .navbar {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        padding: 0;
    }

    .opc-header .navbar-collapse {
        justify-content: flex-end;
        min-width: 0;
    }

    .opc-header .navbar-toggler {
        margin-left: auto;
    }

    .opc-header .opc-main-nav {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0;
        width: auto;
        margin-left: auto;
        flex-wrap: nowrap;
    }

    .opc-header .opc-main-nav > li {
        position: relative;
        display: inline-block;
        flex-shrink: 0;
    }

    .opc-header .opc-main-nav > li > a {
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 18px 8px !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        color: #333 !important;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        white-space: nowrap;
        cursor: pointer;
        transition: color 0.15s ease;
        border-bottom: 3px solid transparent;
        margin-bottom: -3px;
    }

    .opc-header .opc-main-nav > li > a:hover,
    .opc-header .opc-main-nav > li.active > a {
        color: #8b0000 !important;
        border-bottom-color: #8b0000;
    }

    .opc-header .opc-main-nav .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        border: 1px solid #ddd;
        border-top: 2px solid #8b0000;
        min-width: 190px;
        z-index: 100;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        padding: 0;
        border-radius: 0;
    }

    .opc-header .opc-main-nav .nav-item:hover > .dropdown-menu {
        display: block;
    }

    .opc-header .opc-main-nav .dropdown-menu li a {
        display: block;
        padding: 10px 16px;
        font-size: 12px;
        color: #444;
        text-decoration: none;
        border-bottom: 1px solid #f0f0f0;
        text-transform: none;
        font-weight: 600;
    }

    .opc-header .opc-main-nav .dropdown-menu li a:hover {
        background: #fdf5f5;
        color: #8b0000;
        padding-left: 20px;
    }

    .opc-header .search-block {
        z-index: 50;
    }

    @media (max-width: 991px) {
        .opc-header {
            position: sticky;
            top: 0;
        }

        .opc-header .container {
            max-width: none;
            padding-left: 15px;
            padding-right: 15px;
        }

        .opc-header .top-bar-inner {
            justify-content: center;
        }

        .opc-header .main-header-inner {
            flex-wrap: wrap;
            padding: 10px 0;
        }

        .opc-header .logo-area {
            width: 100%;
            justify-content: center;
            flex: 0 0 auto;
            max-width: none;
        }

        .opc-header .nav-row {
            width: 100%;
            justify-content: flex-start;
        }

        .opc-header .opc-main-nav {
            width: 100%;
            justify-content: flex-start;
            padding-top: 0.5rem;
        }

        .opc-header .opc-main-nav > li {
            width: 100%;
        }

        .opc-header .opc-main-nav > li > a {
            padding: 12px 0;
        }
    }
</style>

<header class="opc-header" id="header">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-inner">
                <div class="top-bar-left">
                    <span><i class="fas fa-map-marker-alt"></i>OPC, Capital Hill Circle, Private Bag 301, Lilongwe 3</span>


                </div>

                <div class="top-bar-right">
                    <a href="https://mail.boma.gov.mw/" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-envelope-open-text"></i>Webmail
                    </a>
                    <div class="divider"></div>
                    <a href="#" aria-label="Search site" class="nav-search" role="button" tabindex="0">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-header">
        <div class="container">
            <div class="main-header-inner">
                <a class="logo-area" href="{{ route('frontend.home') }}">
                    <span class="logo-mark">
                        <img src="{{ asset('frontendassets/images/flags/emblam1.jpg') }}" alt="Coat of arms">
                    </span>
                    <span class="logo-text">
                        <span class="org-name">Office of the President</span>
                        <span class="org-name">and Cabinet</span>
                        <span class="org-sub">Republic of Malawi</span>
                    </span>
                </a>

                <div class="nav-row">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse"
                            aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav opc-main-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('executive') }}">The Executive</a></li>
                                        <li><a href="{{ route('profile') }}">His Excellency Profile</a></li>
                                        <li><a href="{{ route('management') }}">OPC Top Management</a></li>
                                        <li><a href="{{ route('history') }}">Chronology of the Malawi Presidency</a></li>
                                        <li><a href="{{ route('chief-secretaries') }}">Chronology of the Malawi Chief Secretaries</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cabinet <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('ministers') }}">Ministers</a></li>
                                        <li><a href="{{ route('deputy') }}">Deputy Ministers</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('charter') }}">Service Charter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('news') }}">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('upcoming') }}">Events</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Resources <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('documents') }}">Documents Library</a></li>
                                        <li><a href="{{ route('photo') }}">Photo Gallery</a></li>
                                        <li><a href="{{ route('video') }}">Video Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('documents', ['category' => 'circulars']) }}">Circulars</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contacts') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="search-block">
                <span class="search-close" aria-label="Close search" role="button" tabindex="0">&times;</span>
                <form action="{{ route('search') }}" method="GET" class="mb-0">
                    <div class="form-group mb-2">
                        <input
                            type="search"
                            name="q"
                            class="form-control"
                            placeholder="Search news, circulars, events..."
                            autocomplete="off"
                            id="site-search-input"
                        >
                    </div>
                    <button type="submit" class="btn btn-success btn-sm btn-block">Search</button>
                    <div id="site-search-suggestions" class="mt-3"></div>
                </form>
            </div>
        </div>
    </div>
</header>
