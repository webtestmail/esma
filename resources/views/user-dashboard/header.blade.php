@php
$user = Auth::user();
$company = \App\Models\Admin\Company::select('company_logo', 'company_name','company_icon')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('dashboard-title')</title>
    <link rel="shortcut icon" href="{{ asset($company->company_icon) }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/outer.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="dashboard-body">
    <header class="header dashboard-navbar">
        <div class="container">
            <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset($company->company_logo) }}"
                        alt="{{ $company->company_name }}"></a></div>
            <ul class="menus">
                <li><a href="{{ route('member.directory') }}">Member Directory</a></li>
                <li>
                    <a href="{{ route('events.hub') }}">Events Hub</a>
                    <ul class="dropdown-menu">
                        <li><a href="events-hub.php">Events Hub</a></li>
                        <li><a href="">Events Hub</a></li>
                        <li><a href="">Events Hub</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Resources Hub</a>
                    <ul class="dropdown-menu">
                        <li><a href="">Resources Hub</a></li>
                        <li><a href="">Resources Hub</a></li>
                        <li><a href="">Resources Hub</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">About</a>
                    @php
                        
                        $aboutData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 6]);

                        $memberData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 9]);

                         $contactData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 7]);

                          $help_centerData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 10]);
                    @endphp
                    <ul class="dropdown-menu">
                        @if(isset($aboutData))
                        <li><a href="{{ $aboutData->client_page_urls }}">{{ $aboutData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($memberData))
                        <li><a href="{{ $memberData->client_page_urls }}">{{ $memberData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($contactData))
                        <li><a href="{{ $contactData->client_page_urls }}">{{ $contactData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($help_centerData))
                        <li><a href="{{ $help_centerData->client_page_urls }}">{{ $help_centerData->header_footer_name }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <div class="nav-right d-flex align-items-center gap-2">
                <div class="login-btns">
                    <!-- ================= SEARCH DROPDOWN ================= -->
                    <div class="dropdown-item-wrapper">
                        <a href="#" class="dropdown-toggle-btn">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-user-outline"></use>
                            </svg>
                        </a>
                        <div class="custom-dropdown search-dropdown">
                            <!-- Keyword -->
                            <div class="form-group">
                                <label>Keyword</label>
                                <div class="input-box">
                                    <i class="bi bi-search"></i>
                                    <input type="search" placeholder="Type what you want to find">
                                </div>
                            </div>
                            <!-- Search In -->
                            <div class="form-group">
                                <label>Search In</label>
                                <div class="select-box">
                                    <select class="w-100">
                                        <option>All Website Content</option>
                                        <option>Member Directory</option>
                                        <option>Events Hub</option>
                                        <option>Resources Hub</option>
                                    </select>
                                    <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="search-actions">
                                <a href="#" class="p-4" style="color: var(--primary-400); font-weight: 600;">Clear</a>
                                <button class="search-btn btn-style-2 text-end">
                                    <svg class="svg-icon">
                                        <use href="{{ asset('/images/icons/icons-sprite.svg#icon-arrow-box-right') }}"></use>
                                    </svg> Search <svg class="svg-icon arrow-svg">
                                        <use href="{{ asset('/images/icons/icons-sprite.svg#icon-arrow-right') }}"></use>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>


                    <!-- ================= LANGUAGE DROPDOWN ================= -->
                    <div class="dropdown-item-wrapper">
                        <a href="#" class="dropdown-toggle-btn">
                            <svg class="svg-icon">
                                <use href="../images/icons/icons-sprite.svg#icon-language"></use>
                            </svg>
                            <span class="toggle-btn-active-language">EN</span>
                        </a>
                        <ul class="custom-dropdown language-dropdown">

                            <li>
                                <img src="https://flagcdn.com/w20/gb.png">
                                English
                                <span class="lang-code">EN</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/es.png">
                                Español
                                <span class="lang-code">ES</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/de.png">
                                Deutsch
                                <span class="lang-code">DE</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/it.png">
                                Italiano
                                <span class="lang-code">IT</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/pt.png">
                                Português
                                <span class="lang-code">PT</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/fr.png">
                                Français
                                <span class="lang-code">FR</span>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </header>