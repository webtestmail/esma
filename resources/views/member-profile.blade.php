@extends('layouts.MainLayouts')
@section('title', 'Member Profile')

@section('content')
     
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="images/logo-colord.png" type="image/x-icon">
    <link rel="stylesheet" href="css/outer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="css/custome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body class="preload">




    <!-- Mobile Menus Canvas -->
    <div class="offcanvas offcanvas-end custome-mobile-canvas" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-4 position-relative">
            <div class="mobile-menu-icons">
                <!-- Search Bar  -->
                <div class="dropdown-item-wrapper">
                    <a href="#" class="dropdown-toggle-btn">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                        </svg>
                    </a>
                    <div class="custom-dropdown search-dropdown">
                        <div class="form-group">
                            <label>Keyword</label>
                            <div class="input-box">
                                <svg class="svg-icon input-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                </svg>
                                <input type="search" placeholder="Type what you want to find">
                            </div>
                        </div>
                        <!-- Search In -->
                        <div class="form-group select-box">
                            <label>Search In</label>
                            <div class="select-box content-filter" multiple>
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
                                    <use href="images/icons/icons-sprite.svg#icon-arrow-box-right"></use>
                                </svg> Search <svg class="svg-icon arrow-svg">
                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- language  -->
                <div class="dropdown-item-wrapper">
                    <a href="#" class="dropdown-toggle-btn">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-language"></use>
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
                <!--Profile will show when the user loged in / sinup -->
                <!-- Profile -->
                <!--only d-block when account logged in -->
                <div class="dropdown-item-wrapper">
                    <a href="#" class="dropdown-toggle-btn">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-user-outline"></use>
                        </svg>
                    </a>

                    <div class="custom-dropdown profile-dropdown">

                        <div class="profile-header">
                            <img src="./images/A. Loacker SpaAG/Untitled-2.png" class="profile-img">
                            <div>
                                <h6 class="m-0">{{ $userProfile->company_name}}</h6>
                                <small>Pure goodness / Che bontà</small>
                            </div>
                        </div>

                        <ul class="mt-2">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">See Profile</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Library</a></li>
                            <li><a href="#">Users</a></li>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>

                    </div>
                </div>
                <!-- Mobile menus  -->
                <div class="dropdown-item-wrapper">
                    <a href="#" class="dropdown-toggle-btn">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-gridmenu"></use>
                        </svg>
                    </a>
                    <ul class="custom-dropdown mobile-dropdown">
                        <li class="mobile-menu-box">
                            <ul class="menus mobile-menus">
                                <li><a href="members-directory.php">Member Directory</a></li>
                                <li>
                                    <a href="events-hub.php">Events Hub</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#upcomingevents">Upcoming Events</a></li>
                                        <li><a href="#pastevents">Past Events</a></li>
                                        <li><a href="#eventscalender">Event Calendar</a></li>
                                        <li><a href="#tradefair">Trade Fairs</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="resource-hub.php">Resources Hub</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="resource-news.php">News & Announcements</a></li>
                                        <li><a href="resource-reports.php">Articles & Reports</a></li>
                                        <li><a href="resource-document.php">Document Library</a></li>
                                        <li><a href="resource-regulatory-update.php">Regulatory Updates</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">About</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.php">ESMA International Network</a></li>
                                        <li><a href="membership.php">Membership</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="help-center.php">Help Center</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div
                                class="nav-btns mobile-nav-btns d-flex align-items-center  justify-content-between gap-2">
                                <a class="btn-style-1 text-dark" id="signupBtn" data-bs-toggle="modal"
                                    data-bs-target="#joinModal"><svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-user-plus"></use>
                                    </svg> Sign Up </a>
                                <a href="login.php" class="btn-style-4"><svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-arrow-right-box"></use>
                                    </svg> Login </a>
                            </div>
                        </li>
                        <div class="mobile-top-info">
                            <ul>
                                <li>
                                    <a href="tel:" class="d-flex gap-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat-rectangle"></use>
                                        </svg> + 353 (87) 444 2121
                                    </a>
                                </li>
                                <hr class="my-3"
                                    style="background: linear-gradient(90deg, rgba(255, 228, 179, 0.5) 0%, rgba(217, 217, 217, 0) 61.06%);">
                                <li>
                                    <a href="" class="d-flex gap-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                        </svg> david.oneill@esma.org
                                    </a>
                                </li>
                                <hr class="my-3"
                                    style="background: linear-gradient(90deg, rgba(255, 228, 179, 0.5) 0%, rgba(217, 217, 217, 0) 61.06%);">
                                <li>
                                    <a href="" class="d-flex gap-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                        </svg> olga.mulcahy@esma.org
                                    </a>
                                </li>
                                <hr class="my-3"
                                    style="background: linear-gradient(90deg, rgba(255, 228, 179, 0.5) 0%, rgba(217, 217, 217, 0) 61.06%);">
                            </ul>
                            <div class="mobile-top-socials">
                                <ul
                                    class="list-inline mb-0 footer-social-icons  d-flex align-items-center justify-content-between">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-cross"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<!-- Same img gonna display here - the profile img in backend dev  -->
<section class="inner-banner member-profile-banner text-white"
    style="background-image: url('images/company-m-img.png');">
    <video autoplay muted loop playsinline class="hero-bg-video opacity-75">
        <source src="./images/banner-video.mp4" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="row pt-4">
            <div class="col-lg-12 mb-4 wow fadeInUp">
                <div
                    class="member-profile-bradcrumb w-100 d-flex justify-content-center justify-content-lg-between align-items-center">
                    <ul class="c-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <svg class="svg-icon svg-three-arrow">
                            <use href="images/icons/icons-sprite.svg#icon-three-arrow"></use>
                        </svg>
                        <li>Members Directory</li>
                        <svg class="svg-icon svg-three-arrow">
                            <use href="images/icons/icons-sprite.svg#icon-three-arrow"></use>
                        </svg>
                        <li>{{ $userProfile->company_name }}</li>
                    </ul>
                    <div class="d-lg-flex d-none gap-2 align-items-center ">
                        <span class="c-tag-2">Manufacturers</span>
                        <div class="share-wrap position-relative">
                            <div class="c-share-1 mem-profile-share">
                                <a href="#" class="events-share" data-index="3">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="social-popup events-share-popup" data-index="3">
                                <!-- WhatsApp -->
                                <a class="social-icon si-whatsapp" href="https://wa.me/?text=Check this out!"
                                    target="_blank" title="WhatsApp" data-share="WhatsApp">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                    </svg>
                                </a>
                                <!-- LinkedIn -->
                                <a class="social-icon si-linkedin"
                                    href="https://www.linkedin.com/sharing/share-offsite/?url=" target="_blank"
                                    title="LinkedIn" data-share="LinkedIn">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                    </svg>
                                </a>
                                <!-- Facebook -->
                                <a class="social-icon si-facebook" href="https://www.facebook.com/sharer/sharer.php?u="
                                    target="_blank" title="Facebook" data-share="Facebook">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                    </svg>
                                </a>
                                <!-- Pinterest -->
                                <a class="social-icon si-pinterest" href="https://pinterest.com/pin/create/button/?url="
                                    target="_blank" title="Pinterest" data-share="Pinterest">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                    </svg>
                                </a>
                                <!-- X (Twitter) -->
                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url=" target="_blank"
                                    title="X / Twitter" data-share="Twitter">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                    </svg>
                                </a>
                                <!-- Instagram -->
                                <a class="social-icon si-instagram" href="https://instagram.com" target="_blank"
                                    title="Instagram" data-share="Instagram">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                    </svg>
                                </a>
                                <!-- Email -->
                                <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                    title="Email" data-share="Email">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                    </svg>
                                </a>
                                <!-- Copy Link -->
                                <button class="social-icon si-copy" title="Copy Link" data-share="Copy Link">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
                                    </svg>
                                </button>
                                <hr class="block m-0 share-divider">
                                <span style="color: var(--primary-300);" class="share-label">Share this</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-4 wow fadeInUp">
                <div class="member-profile-img">
                    <img src="{{ asset('images/company-m-img.png') }}" alt="Member Profile">
                </div>
            </div>
            <div class="col-lg-8 ps-lg-5 wow fadeInUp">
                <div class="member-profile-content">
                    <div class="position-relative m-logos-wrap">
                        <div class="m-logo-brand">
                            <img src="{{ asset('images/c-brands__circles.png') }}" alt="{{ $userProfile->company_name }}">
                        </div>
                        <div class="m-logo-flag">
                            <img src="{{ asset('images/c-glyph-flags.png') }}" alt="{{ $userProfile->company_name }}">
                        </div>
                    </div>
                    <div class="mem-proflir-title">{{ $userProfile->company_name }}</div>
                    <span>Pure goodness / Che bontà</span>
                    <p>{{ $userProfile->company_description }}</p>
                </div>
            </div>

        </div>
        <div class="scroll-div my-5 py-1">
            <div class="line-1"></div>
            <div class="scroll-box flex-shrink-0 d-flex align-items-center gap-2" id="scrollDownBtn">
                <svg class="svg-icon">
                    <use href="images/icons/icons-sprite.svg#icon-scrolldown"></use>
                </svg>
                <span>Scroll Down</span>
            </div>
            <div class="line-2"></div>
        </div>
    </div>
    <!-- ABover is Hero section  -->
</section>

<!-- Main content below  -->
<section class="member-profile-main-pg pb-100" id="nextSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-2 order-lg-1 mt-4 mt-lg-0">
                <div class="member-profile-left">
                    @if($user->pointOfContact)
                    <div class="content mb-5 wow fadeInUp">
                        <div class="member-profile-span">Point Of Contact</div>
                        
                        @foreach($user->pointOfContact as $point)
                        <div class="point-of-contact-box">
                            <img src="images/poc-1.png" alt="">
                            <div>
                                <p class="m-0">{{ $point->contact_name }} {{ $point->contact_surname }}</p>
                                <span>{{ $point->contact_position }}</span>
                                <hr class="my-2">
                                <a href="" class="d-flex align-items-center">
                                    <svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg#icon-phone-volume') }}"></use>
                                    </svg>
                                    {{ $point->contact_phone }}
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg#icon-mail') }}"></use>
                                    </svg>
                                    {{ $point->contact_email }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    @endif
                    <div class="content mb-5 wow fadeInUp">
                      
                        @php
                            $mainContact = $user->companycontacts->where('is_main', 1)->first();
                            $contactAddress = \App\Models\MemberCompanyContact::where('user_id', $user->id)->where('is_main', 0)->get();
                        @endphp
                        <div class="member-profile-span">Address</div>
                        
                        <div class="point-of-contact-box-2">
                            <span> <i class="bi bi-geo-alt"></i>{{ $mainContact->main_address ?? '' }} {{ $mainContact->country ?? '' }}</span>
                            <div class="map">
                                <iframe
                                    src="{{ $mainContact->google_map_link ?? '' }}"
                                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- <p class="m-0">Via Macello 30/A - 39100 Bolzano - Italy</p> -->
                            <hr class="my-1">
                            <a href="#" target="_blank"> Open Map <svg class="svg-icon arrow-svg ms-1">
                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                </svg> </a>
                        </div>
                        @if($contactAddress->count() > 0)
                         @foreach($contactAddress as $contact)
                        <div class="point-of-contact-box-2">
                            <span> <i class="bi bi-geo-alt"></i> {{ $contact->main_address }} {{ $contact->country }}</span>
                            <div class="map">
                                <iframe
                                    src="{{ $contact->google_map_link }}"
                                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- <p class="m-0"> - Italy</p> -->
                            <hr class="my-1">
                            <a href="#" target="_blank"> Open Map <svg class="svg-icon arrow-svg ms-1">
                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                </svg> </a>
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                    @if($user->companylinks)
                    <div class="content mb-5 wow fadeInUp">
                        <div class="member-profile-span">Company Links</div>
                        <div class="point-of-contact-box-3">
                            @if($user->companylinks->website_url)
                            <a href="{{ $user->companylinks->website_url }}" class="btn-style-2 w-100" target="_blank"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-globe"></use>
                                </svg> Visit Website <svg class="svg-icon arrow-svg">
                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                </svg></a>
                            @endif
                            @if($user->companylinks->linkedin_url)
                            <hr class="poc-line">
                            <div class="social-design-1">
                                <a href="{{ $user->companylinks->linkedin_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                        </svg></i>
                                    <span>Linkedin</span>
                                </a>
                            @endif
                            @if($user->companylinks->facebook_url)
                                <a href="{{ $user->companylinks->facebook_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                        </svg></i>
                                    <span>Facebook</span>
                                </a>
                            @endif
                            @if($user->companylinks->instagram_url)
                                <a href="{{ $user->companylinks->instagram_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                        </svg></i>
                                    <span>Instagram</span>
                                </a>
                            @endif
                            @if($user->companylinks->youtube_url)
                                <a href="{{ $user->companylinks->youtube_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-youtube"></use>
                                        </svg></i>
                                    <span>Youtube</span>
                                </a>
                            @endif
                            @if($user->companylinks->pinterest_url)
                                <a href="{{ $user->companylinks->pinterest_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                        </svg></i>
                                    <span>Pinterest</span>
                                </a>
                            @endif
                            @if($user->companylinks->whatsapp_url_or_number)

                                <a href="{{ $user->companylinks->whatsapp_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                        </svg></i>
                                    <span>Whatsapp</span>
                                </a>
                            @endif
                            @if($user->companylinks->twitter_url)
                                <a href="{{ $user->companylinks->twitter_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-twitter"></use>
                                        </svg></i>
                                    <span>X</span>
                                </a>
                            @endif
                            @if($user->companylinks->linktree_url)
                                <a href="{{ $user->companylinks->linktree_url }}" class="social-link" target="_blank">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-link"></use>
                                        </svg></i>
                                    <span>Linktree</span>
                                </a>
                            @endif
                            </div>
                        </div>
                    </div>
                    @endif  
                </div>
            </div>
            <div class="col-lg-8 ps-lg-5 order-1 order-lg-2 wow fadeInUp">
                <div class="member-profile-right">
                    <div class="member-profile-span wow fadeInUp" data-wow-delay="0.1s">Company Numbers</div>
                    <ul class="content-ul mb-5 wow fadeInUp" data-wow-delay="0.2s">
                        <li>
                            <span>{{ $employeeCount }}</span>
                            <p>Employees</p>
                        </li>
                        <li>
                            <span>{{ $tradeSectorCount }}</span>
                            <p>Trade Sectors</p>
                        </li>
                        <li>
                            <span>{{ $brandCount }}</span>
                            <p>Brands</p>
                        </li>
                        <li>
                            <span>{{ $productCategoryCount }}</span>
                            <p>Product Categories</p>
                        </li>
                    </ul>
                    <div class="member-profile-span wow fadeInUp" data-wow-delay="0.1s">More About A. Loacker Spa/AG
                    </div>
                    <div class="content-overview wow fadeInUp" data-wow-delay="0.2s">
                        <p>{{ $userProfile->company_description }}</p>
                    </div>
                    <div class="member-profile-content-img my-5 wow fadeInUp" data-wow-delay="0.3s">
                        <img src="images/members-profile.png" alt="">
                    </div>
                    <div class="member-profile-span wow fadeInUp" data-wow-delay="0.1s">Trade Sectors</div>
                    <ul class="trade-list-1 mb-5 wow fadeInUp" data-wow-delay="0.2s">
                        @foreach($user->tradesectors as $tradeSector)
                            <li>{{ $tradeSector->name }}</li>
                        @endforeach
                       
                        
                    </ul>
                    @if($user->brands->count() > 0)
                    <div class="member-profile-span">Brands</div>
                    <ul class="trade-list-1 mb-5">
                        @foreach($user->brands as $brand)
                        <li>{{ $brand->name }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if($user->productcategories->count() > 0)
                    <div class="member-profile-span">Product Categories</div>
                    <ul class="trade-list-1 mb-5">
                        @foreach($user->productcategories as $productCategory)
                        <li>{{ $productCategory->name }}</li>
                        @endforeach
                        
             
                    </ul>
                    @endif
                    @if($user->temperatures ->count() > 0)
                    <div class="member-profile-span">Temperature</div>
                    <ul class="trade-list-1 mb-5">
                        @foreach($user->temperatures as $temperature)
                        <li>{{ $temperature->name }}</li>
                        @endforeach

                    
                    </ul>
                    @endif
                    <div class="member-profile-span wow fadeInUp" data-wow-delay="0.1s">Connect at Upcoming Event
                    </div>
                    <div class="upcoming-event-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="event-header">
                            <div class="event-company-logo">
                                <img src="images/c-brands__circles.png" alt="Company Logo">
                            </div>
                            <div class="event-header-text">
                                <span class="company-name">A. Loacker Spa/AG</span>
                                <span class="event-status">registered interest</span>
                                <span class="event-text">at the event</span>
                                <span class="event-name">48th ESMA Convention, London, UK</span>
                            </div>
                        </div>
                        <div class="event-body">
                            <i class="bi bi-arrow-90deg-right"></i>
                            <div class="event-body-inner">
                                <div class="event-thumbnail flex-shrink-0">
                                    <img src="images/1-1.webp" alt="Event">
                                </div>
                                <div class="event-details">
                                    <h4 class="event-title">48th ESMA Convention, London, UK</h4>
                                    <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. Maecenas id ligula massa.</p>
                                    <div class="event-date date-1">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        <span>26th to 28th January '26</span>
                                    </div>
                                </div>
                                <!-- Desktop-arrow  -->
                                <a href="#" class="event-arrow d-lg-inline-block d-none">
                                    <i><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                        </svg></i>
                                </a>
                                <!-- Mobile - arrow  -->
                                <hr class="d-lg-none my-1">
                                <a href="" class="flex-shrink-0 d-lg-none d-flex align-items-center gap-2">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                    </svg> Read More <svg class="svg-icon arrow-svg">
                                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="more-member-sec py-100 rounded-corners-sec"
    style="background-image: url(images/__bg__effect.png); background-size: cover;">
    <!-- this for design prupose  the rounded corners -->
    <div class="rounded-corners-sec corner-sec-2"></div>
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-0">
                <h3 class="heading-36 text-dark">More Members</h3>
                <p class="lead">Every ESMA member is screened by our CEO and then endorsed by a board decision.</p>
                <div class="member-controls d-flex align-items-start gap-3 mt-4">
                    <button class="custom-arrow prev-member custom-arrow-purple">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="member-dots"></div>
                    <button class="custom-arrow next-member custom-arrow-purple">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-9 more-member-slider-wrap">
                <div class="more-member-slider">
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/A. Loacker SpaAG/Untitled-1.jpg"
                                    alt="A. Loacker Spa/AG"></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/c-brands__circles.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/c-glyph-flags.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/A.G. Barr p.l.c/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/A.G. Barr p.l.c/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/A.G. Barr p.l.c/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Company Name/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Company Name/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Company Name/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Consivo Group AB/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Consivo Group AB/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Consivo Group AB/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Emco/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Emco/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/Emco/Untitled-3.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/GRUPO HERDEZ/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/GRUPO HERDEZ/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/GRUPO HERDEZ/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Gü/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Gü/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/Gü/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Konings-Zuivel/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Konings-Zuivel/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Konings-Zuivel/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@push('')


@endpush
@endsection