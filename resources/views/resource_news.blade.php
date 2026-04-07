@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')

<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="{{ asset($page->page_image ?? '') }}" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb ">
                <li><a href="{{ route('home') }}">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $data['category']->header_footer_name ?? '' }}</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $page->header_footer_name ?? '' }}</li>
            </ul>
            <h1 class="inner-heading ">
               {{ $page->breadcrumb_headline ?? '' }}
            </h1>
            <p>{!! html_entity_decode($page->breadcrumb_description ?? '') !!}</p>
            <div class="scroll-div">
                <div class="line-1"></div>
                <div class="scroll-box flex-shrink-0 d-flex align-items-center gap-2" id="scrollDownBtn">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-scrolldown"></use>
                    </svg>
                    <span>Scroll Down</span>
                </div>
                <div class="line-2"></div>
            </div>
        </div>
    </div>
</section>


<section id="nextSection" class="py-100 news-hub-1 rounded-corners-sec bg-grey">
    <!-- this for design prupose  the rounded corners -->
    <div class="rounded-corners-sec corner-sec-2"></div>
    <!-- Mobile-only category tabs -->
    <div class="mobile-cat-tabs d-lg-none mb-3" id="mobileCatTabs">
        <button class="mobile-cat-tab active" onclick="filterMobileCat(this, 'all')">All</button>
        <button class="mobile-cat-tab" onclick="filterMobileCat(this, 'category-01')">Category 01</button>
        <button class="mobile-cat-tab" onclick="filterMobileCat(this, 'category-02')">Category 02</button>
        <button class="mobile-cat-tab" onclick="filterMobileCat(this, 'category-03')">Category 03</button>
        <button class="mobile-cat-tab" onclick="filterMobileCat(this, 'category-04')">Category 04</button>
        <button class="mobile-cat-tab" onclick="filterMobileCat(this, 'category-05')">Category 05</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9 filterd-content pe-lg-4">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box" data-cat="category-01">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24 (2).webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box" data-cat="category-01">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24.webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box " data-cat="category-02">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24 (3).webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box " data-cat="category-03">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24 (2).webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box " data-cat="category-04">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24.webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box " data-cat="category-05">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24 (3).webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box " data-cat="category-03">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24 (2).webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box " data-cat="category-04">
                            <div class="resource-img">
                                <div class="re-img hover-img">
                                    <img src="images/image 24.webp" alt="">
                                </div>
                                <div class="d-flex gap-1 resource-tag">
                                    <div class="category-style-1">Convention</div>
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="share-wrap">
                                    <div class="c-share-1">
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
                                        <a class="social-icon si-facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                            title="Facebook" data-share="Facebook">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                            </svg>
                                        </a>
                                        <!-- Pinterest -->
                                        <a class="social-icon si-pinterest"
                                            href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                            title="Pinterest" data-share="Pinterest">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                            </svg>
                                        </a>
                                        <!-- X (Twitter) -->
                                        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                            target="_blank" title="X / Twitter" data-share="Twitter">
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
                                        <span style="color: var(--primary-300);" class="share-label">Share
                                            this</span>
                                    </div>
                                </div>
                            </div>
                            <div class="resource-text">
                                <a href="">
                                    <h5>USA Food Export Group Business Conference</h5>
                                </a>
                                <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                    members
                                    who were
                                    exhibiting at the Angua Trade Fair…</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                        November 16, 2025
                                    </div>
                                    <a href="" class="resoure-links">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-pagination d-flex align-items-center justify-content-center gap-2 mt-2">
                    <!-- Prev -->
                    <a href="#" class="page-btn circle purple">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                        </svg>
                    </a>
                    <!-- Numbers -->
                    <a href="#" class="page-btn circle active">01</a>
                    <a href="#" class="page-btn circle">02</a>
                    <span class="page-dots">...</span>
                    <a href="#" class="page-btn circle">05</a>
                    <!-- Next -->
                    <a href="#" class="page-btn circle purple">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 d-none d-lg-block">

                <div class="news-hub-sidebar">

                    <div class="news-search">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-search"></use>
                            </svg>
                            <p class="m-0 news-p">Search News</p>
                        </div>
                        <div class="filter-search mb-2">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-search"></use>
                            </svg>
                            <input type="search" placeholder="What are you looking for?">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Categories</p>
                        </div>
                        <ul>
                            <li><a href="#">Category 01</a></li>
                            <li><a href="#">Category 02</a></li>
                            <li><a href="#">Category 03</a></li>
                            <li><a href="#">Category 04</a></li>
                            <li><a href="#">Category 05</a></li>
                        </ul>
                    </div>

                    <hr class="my-4">

                    <div class="news-upcoming">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                            </svg>
                            <p class="m-0 news-p">Upcoming Events</p>
                        </div>
                        <div class="events-lists-home h-auto">
                            <div class="events-list-hm">
                                <a href="" tabindex="0" class="flex-shrink-0">
                                    <img src="images/Cover.webp" alt="">
                                </a>
                                <div><a href="" tabindex="0">
                                        <span class="date">11th to 13th June ’26</span>
                                    </a><a href="" class="event-lits-a" tabindex="0">48th ESMA Convention,London,
                                        UK</a>
                                </div>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                </svg>
                            </div>
                            <div class="events-list-hm">
                                <a href="" tabindex="0" class="flex-shrink-0">
                                    <img src="images/image 24 (1).webp" alt="">
                                </a>
                                <div><a href="" tabindex="0">
                                        <span class="date">11th to 13th June ’26</span>
                                    </a><a href="" class="event-lits-a" tabindex="0">48th ESMA Convention,London,
                                        UK</a>
                                </div>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                </svg>
                            </div>
                            <div class="events-list-hm">
                                <a href="" tabindex="0" class="flex-shrink-0">
                                    <img src="images/Cover (1).webp" alt="">
                                </a>
                                <div><a href="" tabindex="0">
                                        <span class="date">11th to 13th June ’26</span>
                                    </a><a href="" class="event-lits-a" tabindex="0">48th ESMA Convention,London,
                                        UK</a>
                                </div>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                </svg>
                            </div>
                            <div class="events-list-hm">
                                <a href="" tabindex="0" class="flex-shrink-0">
                                    <img src="images/Cover (2).webp" alt="">
                                </a>
                                <div><a href="" tabindex="0">
                                        <span class="date">11th to 13th June ’26</span>
                                    </a><a href="" class="event-lits-a" tabindex="0">48th ESMA Convention,London,
                                        UK</a>
                                </div>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                </svg>
                            </div>
                            <div class="events-list-hm">
                                <a href="" tabindex="0" class="flex-shrink-0">
                                    <img src="images/image 24 (4).webp" alt="">
                                </a>
                                <div><a href="" tabindex="0">
                                        <span class="date">11th to 13th June ’26</span>
                                    </a><a href="" class="event-lits-a" tabindex="0">48th ESMA Convention,London,
                                        UK</a>
                                </div>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="news-newsletter">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                            </svg>
                            <p class="m-0 news-p">Newsletter</p>
                        </div>
                        <div class="side-newsletter">
                            <div class="news-newsletter-form">
                                <img src="images/journal-blue.png" alt="" class="py-3">
                                <p class="m-0">Subscribe to receive handpicked luxury listings, exclusive previews, and
                                    market insights — all delivered straight to your inbox. Stay effortlessly connected
                                    to the finest properties, tailored to your taste.</p>
                                <form class="pt-3">
                                    <input type="email" placeholder="Enter your email">
                                    <button type="submit" class="btn-style-2 mt-2 w-100">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                                        </svg> Sign Up
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-js')
<script>
function filterMobileCat(el, cat) {
    document.querySelectorAll('.mobile-cat-tab').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    document.querySelectorAll('.resource-box').forEach(box => {
        box.closest('.col-sm-12').style.display =
            (cat === 'all' || box.dataset.cat === cat) ? '' : 'none';
    });
}
</script>
@endpush