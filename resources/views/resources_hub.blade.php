@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')

<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="{{ asset($page->page_image) }}" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb wow fadeInUp">
                <li><a href="{{ route('home') }}">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $page->header_footer_name ?? '' }}</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp">
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


<section id="nextSection" class="py-100 resourse-hub-1"
    style="background-image: url(images/__bg__effect.png); background-size: cover; background-repeat: no-repeat; background-position: center center;">
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-between mb-5">
                <h3 class="section-title wow fadeInUp">News</h3>
                <div class="d-lg-inline-block d-none">
                    <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                        </svg> See All News<svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="resource-slider-wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="resource-box wow fadeInUp">
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
                <div class="col-lg-4">
                    <div class="resource-box wow fadeInUp">
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
                <div class="col-lg-4">
                    <div class="resource-box wow fadeInUp">
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
                <div class="col-lg-4">
                    <div class="resource-box wow fadeInUp">
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
                <div class="col-lg-4">
                    <div class="resource-box wow fadeInUp">
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
                <div class="col-lg-4">
                    <div class="resource-box wow fadeInUp">
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
            </div>
        </div>
        <div class="resource-slider-controls">
            <div class="d-flex align-items-center gap-3">
                <button class="reg-prev d-none d-lg-inline-block"><svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                    </svg></button>
                <div class="reg-dots"></div>
                <button class="reg-next d-none d-lg-inline-block"><svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                    </svg></button>
            </div>
            <hr class="w-50 me-auto d-none d-lg-inline-block">
            <a href="events-hub.php" class="btn-style-3 d-none d-lg-inline-block"> <svg class="svg-icon">
                    <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                </svg> Go To Our Blogs <svg class="svg-icon arrow-svg">
                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                </svg> </a>
        </div>
        <!-- Mobile btns  -->
        <div class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none mt-4 text-center">
            <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                    <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                </svg> See All News <svg class="svg-icon arrow-svg">
                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                </svg> </a>
        </div>
    </div>
</section>


<!-- Reports -->

<section class="py-100 resourse-hub-2">
    <div class="container ">
        <div class="row">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-between mb-5">
                <h3 class="section-title wow fadeInUp">Reports</h3>
                <div class="d-lg-inline-block d-none">
                    <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg> Go To Reports <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <span class="help-filter-text d-lg-none d-block mb-3 p-0">Showing the 3 most recent reports</span>
            <!-- Report Item -->
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <!-- Bottom Pagination -->
            <div class="reports-bottom d-none d-lg-flex">
                <div class="year-pagination">
                    <button class="circle-btn"><svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                        </svg></button>
                    <span>2024</span>
                    <span class="active-year">2025</span>
                    <span>2026</span>
                    <button class="circle-btn"><svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                        </svg></button>
                </div>
                <hr class="w-50 me-auto">
                <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg> See all Reports <svg class="svg-icon arrow-svg">
                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                    </svg> </a>
            </div>
            <!-- Mobile btns  -->
            <div class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none text-center">
                <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg> See all Reports <svg class="svg-icon arrow-svg">
                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                    </svg> </a>
            </div>

        </div>
    </div>
</section>


<!-- Documnets -->

<section class="py-100 bg-grey resourse-hub-3">
    <div class="container ">
        <div class="row">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-between mb-5">
                <h3 class="section-title wow fadeInUp">Documents</h3>
                <div class="d-lg-inline-block d-none">
                    <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                        </svg> Go To Documents Library <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="row m-0">

            <span class="help-filter-text d-lg-none d-block mb-3 p-0">Showing the 3 most recent reports</span>
            <!-- Report Item -->
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>

            <!-- Bottom Pagination -->
            <div class="reports-bottom d-none d-lg-flex">
                <hr class="w-75 me-auto">
                <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg> See all Documents <svg class="svg-icon arrow-svg">
                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                    </svg> </a>
            </div>

            <!-- Mobile btns  -->
            <div class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none text-center">
                <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                    </svg> See all Documents <svg class="svg-icon arrow-svg">
                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                    </svg> </a>
            </div>

        </div>
    </div>
</section>


<!-- Updates -->

<section class="py-100 resourse-hub-4">
    <div class="container ">
        <div class="row ">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-between mb-5">
                <h3 class="section-title wow fadeInUp">Regularly Updates</h3>
                <div class="d-lg-inline-block d-none">
                    <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                        </svg> See All Updates <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="regulatory-swiper-section">
                <div class="resource-slider-wrapper">
                    <div class="row">

                        <!-- Slide -->
                        <div class="reg-slide col-lg-4">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="./images/UAB EKKO LT/Untitled-1.jpg" alt="">
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-share">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-link">
                                                    </use>
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
                                        <h5>regularity Update lorem ipsum sit dollor ameet adiscpling</h5>
                                    </a>
                                    <p>vestibulum sed venenatis manga. curabitur mi diam, efficitur eu
                                        blandit non, placerat quis tellus. Integer nisi no...</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                </use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="reg-slide col-lg-4">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="./images/Consivo Group AB/Untitled-1.jpg" alt="">
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-share">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-link">
                                                    </use>
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
                                        <h5>regularity Update lorem ipsum sit dollor ameet adiscpling</h5>
                                    </a>
                                    <p>vestibulum sed venenatis manga. curabitur mi diam, efficitur eu
                                        blandit non, placerat quis tellus. Integer nisi no...</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                </use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="reg-slide col-lg-4">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="./images/Nordic Well Group/Untitled-1.jpg" alt="">
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-share">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-link">
                                                    </use>
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
                                        <h5>regularity Update lorem ipsum sit dollor ameet adiscpling</h5>
                                    </a>
                                    <p>vestibulum sed venenatis manga. curabitur mi diam, efficitur eu
                                        blandit non, placerat quis tellus. Integer nisi no...</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                </use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="reg-slide col-lg-4">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="./images/event-4.jpg" alt="">
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-share">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-link">
                                                    </use>
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
                                        <h5>regularity Update lorem ipsum sit dollor ameet adiscpling</h5>
                                    </a>
                                    <p>vestibulum sed venenatis manga. curabitur mi diam, efficitur eu
                                        blandit non, placerat quis tellus. Integer nisi no...</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                </use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="reg-slide col-lg-4">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="images/image 24 (3).webp" alt="">
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-share">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-link">
                                                    </use>
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
                                        <h5>regularity Update lorem ipsum sit dollor ameet adiscpling</h5>
                                    </a>
                                    <p>vestibulum sed venenatis manga. curabitur mi diam, efficitur eu
                                        blandit non, placerat quis tellus. Integer nisi no...</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                </use>
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
                </div>

                <div class="resource-slider-controls">
                    <div class="d-flex align-items-center gap-3">
                        <button class="reg-prev d-none d-lg-inline-block"><svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                            </svg></button>
                        <div class="reg-dots"></div>
                        <button class="reg-next d-none d-lg-inline-block"><svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                            </svg></button>
                    </div>
                    <hr class="w-50 me-auto d-none d-lg-inline-block">
                    <a href="events-hub.php" class="btn-style-3 d-none d-lg-inline-block"> <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                        </svg> Go To Our Blogs <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                        </svg> </a>
                </div>
                <!-- Mobile btns  -->
                <div
                    class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none mt-4 text-center">
                    <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                        </svg> See All Updates <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                        </svg> </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection