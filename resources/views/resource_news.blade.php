@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection



@push('page-css')
<style>
    /* Search Input */
.search-input {
    padding: 12px 50px 12px 45px;
    border: 2px solid #e9ecef;
    border-radius: 50px;
    font-size: 15px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.search-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
    outline: none;
}

.search-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: #6c757d;
    transition: color 0.3s ease;
}

.search-input:focus + .search-icon,
.search-input:not(:placeholder-shown) + .search-icon {
    color: #007bff;
}

/* Results Dropdown */
.search-results {
    top: calc(100% + 8px);
    left: 0;
    border-top: 3px solid #007bff;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    backdrop-filter: blur(10px);
    animation: slideDown 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Result Items */
.search-result-item {
    padding: 16px 20px;
    border-bottom: 1px solid #f8f9fa;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    color: #212529;
    display: block;
}

.search-result-item:hover,
.search-result-item:focus {
    background: linear-gradient(90deg, #f8f9ff 0%, #e8f4fd 100%);
    border-left: 4px solid #007bff;
    transform: translateX(4px);
    box-shadow: inset 0 0 0 1px rgba(0,123,255,0.1);
}

.search-result-item:last-child {
    border-bottom: none;
}

/* Result Content */
.search-result-item h6 {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 4px 0;
    color: #1a1a1a;
    line-height: 1.3;
}

.search-result-preview {
    font-size: 14px;
    color: #6c757d;
    margin: 0 0 8px 0;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.search-result-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 13px;
}

.search-result-date {
    color: #6c757d;
    font-weight: 500;
}

.search-result-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.category-tag {
    background: #e3f2fd;
    color: #1976d2;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
}

/* No Results */
.no-results {
    padding: 40px 20px;
    text-align: center;
    color: #6c757d;
}

.no-results svg {
    width: 64px;
    height: 64px;
    opacity: 0.5;
    margin-bottom: 16px;
}

.no-results h6 {
    color: #495057;
    margin-bottom: 8px;
}

/* Loading */
#searchLoading {
    transition: opacity 0.2s ease;
}

/* Responsive */
@media (max-width: 768px) {
    .search-results {
        position: fixed;
        top: auto;
        left: 0;
        right: 0;
        bottom: 0;
        max-height: 70vh;
        border-radius: 20px 20px 0 0;
        margin: 0;
    }
}




/*  Copy Link */
.si-copy {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.si-copy.copied svg {
    opacity: 0;
}

.si-copy.copied::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-weight: bold;
    color: white;
    z-index: 3;
}

.si-copy:hover::after {
    opacity: 1;
}

.si-copy svg {
    position: relative;
    z-index: 2;
    transition: transform 0.2s ease;
}

.si-copy:hover svg {
    transform: scale(1.1);
}

/* Copy Success Animation */
.si-copy.copied {
    animation: copySuccess 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.si-copy.copied svg {
    opacity: 0;
    transform: scale(0.8);
}

.si-copy.copied::after {
    background: rgba(46, 125, 50, 0.8) !important;
    opacity: 1;
}

.si-copy.copied::before {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-weight: bold;
    color: white;
    z-index: 3;
    animation: checkPulse 0.4s ease-out forwards;
}

@keyframes copySuccess {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

@keyframes checkPulse {
    0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0) rotate(-180deg);
    }
    50% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1.2) rotate(0deg);
    }
    100% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1) rotate(0deg);
    }
}

.category-link.active { 
    font-weight: bold; 
    color: ##262761; 
    text-decoration: underline; 
}
</style>
@endpush


@php
$contact = resolve(App\Http\Controllers\Admin\CompanyController::class)->getCompanyData();
@endphp

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
                      
        <a href="{{ route('resource_news') }}"  class="mobile-cat-tab {{ !request('category_name') ? 'active' : '' }}">All</a>
        @foreach($categories as $cat)
        <a href="?category_name={{ urlencode($cat->name) }}" class="mobile-cat-tab {{ request('category_name') == $cat->name ? 'active' : '' }}">{{ $cat->name ?? '' }}</a>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9 filterd-content pe-lg-4">
                <div class="row">
                     @if(isset($news) && count($news) > 0)
                        @foreach($news as $val)
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4 ">
                        <div class="resource-box" data-cat="category-01">
                            <div class="resource-img">
                                  @if(isset($val->banner))
                                <div class="re-img hover-img">
                                    <img src="{{ asset($val->banner) }}" alt="{{ $val->header_footer_name ?? '' }}">
                                </div>
                                @endif
                                    @if (!empty($val->categories))
                                        <div class="d-flex gap-1 resource-tag">
                                            @foreach ($val->categories as $catName)
                                                <div class="category-style-1">{{ $catName }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                <div class="share-wrap">
                                    <div class="c-share-1">
                                        <a href="#" class="events-share" data-index="3">
                                            <svg class="svg-icon">
                                                <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="social-popup events-share-popup" data-index="3"  data-raw-url="{{ route('news_detail', ['slug' => $val->slug]) }}" data-title="{!! html_entity_decode($val->name) ?? 'Check this out!' !!}" data-image="{{ asset($val->banner) ?? asset('images/og-image.jpg') }}">
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
                                <a href="{{ route('news_detail', ['slug' => $val->slug]) }}">
                                    <h5>{{ $val->header_footer_name ?? '' }}</h5>
                                </a>
                                <p>{{ $val->title ?? ''}}</p>
                                <hr class="my-1">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <div class="date-1 resource-date">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                        </svg>
                                         {{ $val->created_at ? $val->created_at->format('F j, Y') : '' }}
                                    </div>
                                    <a href="{{ route('news_detail', ['slug' => $val->slug]) }}" class="resoure-links">
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
                    @endforeach
                    @endif
                   
                </div>

            @if($news->lastPage() > 1)
                <div class="custom-pagination d-flex align-items-center justify-content-center gap-2 mt-2">
                    
                    <!-- Prev: Use previousPageUrl() to preserve filters -->
                    @if($news->onFirstPage())
                        <a href="javascript:void(0);" class="page-btn circle purple disabled">
                    @else
                        <a href="{{ $news->previousPageUrl() }}" class="page-btn circle purple">
                    @endif
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                            </svg>
                        </a>

                    <!-- Numbers: Preserve category filter -->
                    @php
                        $current = $news->currentPage();
                        $last = $news->lastPage();
                    @endphp

                    @for ($i = 1; $i <= $last; $i++)
                        @if ($i == 1 || $i == $last || ($i >= $current - 1 && $i <= $current + 1))
                            <a href="{{ $news->url($i) }}" 
                            class="page-btn circle {{ $i == $current ? 'active' : '' }}">
                                {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </a>
                        @elseif ($i == 2 || $i == $last - 1)
                            <span class="page-dots">...</span>
                        @endif
                    @endfor

                    <!-- Next: Use nextPageUrl() to preserve filters -->
                    @if($news->hasMorePages())
                        <a href="{{ $news->nextPageUrl() }}" class="page-btn circle purple">
                    @else
                        <a href="javascript:void(0);" class="page-btn circle purple disabled">
                    @endif
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                            </svg>
                        </a>
                </div>
            @endif
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
                            <input type="search" id="newsSearch" placeholder="What are you looking for?">
                            <div id="searchLoading" class="position-absolute top-50 end-0 translate-middle-y me-3" style="display: none;">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>

                            <!-- Results Dropdown -->
                            <div id="searchResults" class="search-results position-absolute w-100 bg-white shadow-lg border-0 rounded-3 mt-2 overflow-hidden" style="display: none; z-index: 1055; max-height: 450px; overflow-y: auto;">
                                <div id="resultsContent">
                                    <!-- Dynamic content here -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                     @if(isset($categories))
                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Categories</p>
                        </div>
                       
                        <ul class="category-filter">
                            @foreach($categories as $cat)
                            <li>    <a href="?category_name={{ urlencode($cat->name) }}" 
                                    class="category-link {{ request('category_name') == $cat->name ? 'active' : '' }}">
                                        {{ $cat->name ?? '' }}
                                    </a>
                            </li>
                            @endforeach
                            
                        </ul>
                        
                    </div>
                    @endif

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
                                <img src="{{ asset($contact->newsletter_image) }}" alt="" class="py-3">
                                <p class="m-0">{!! $contact->newsletter_description ?? '' !!}</p>
                                <form id="newsForm" class="pt-3">
                                    @csrf
                                    
                                    <div class="position-relative mb-3">

                                      <input type="email" name="email" placeholder="Enter your email">
                                         <div class="error invalid-feedback text-danger small"></div>

                                        <!-- SPINNER -->
                                        <div class="spinner-border spinner-border-sm loading position-absolute end-0 top-50 translate-middle-y"
                                            style="display: none; width: 1rem; height: 1rem;">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-style-2 mt-2 w-100">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                                        </svg> <span class="subscribe-text">Subscribe</span>
                                           <span class="subscribing-text d-none">Subscribing...</span>
                                <span class="success-text d-none">✓ Done!</span>
                                    </button>
                                </form>
                                   <div id="responseMsg" class="mt-3"></div>
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


<script>
document.addEventListener('DOMContentLoaded', function() {

    const sharePopups = document.querySelectorAll('.social-popup');

    sharePopups.forEach(popup => {

       const rawUrl = popup.dataset.rawUrl || window.location.href;
       const url = encodeURIComponent(rawUrl);
        const title = encodeURIComponent(popup.dataset.title || document.title);
        const description = encodeURIComponent(popup.dataset.description || '');
        const image = encodeURIComponent(popup.dataset.image || '');

        const icons = popup.querySelectorAll('.social-icon');

        icons.forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();

                const platform = this.dataset.share;

                switch(platform) {

                    case 'WhatsApp':
                        window.open(`https://wa.me/?text=${title}%20${url}`, '_blank');
                        break;

                    case 'Facebook':
                        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${title}`, '_blank');
                        break;

                    case 'Twitter':
                        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank');
                        break;

                    case 'LinkedIn':
                        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank');
                        break;

                    case 'Email':
                        window.location.href = `mailto:?subject=${title}&body=${title}%20${url}`;
                        break;

                    case 'Instagram':
                        copyToClipboard(decodeURIComponent(url), e);
                        window.open('https://www.instagram.com/', '_blank');
                        break;

                    case 'Copy Link':
                       copyToClipboard(rawUrl, e);
                        break;
                }
            });
        });
    });


    function copyToClipboard(text, event) {

        navigator.clipboard.writeText(text).then(() => {

            const button = event.target.closest('.social-icon');
            if(button){
                button.classList.add('copying');
                setTimeout(() => {
                    button.classList.remove('copying');
                }, 1500);
            }

            showToast('Link copied!');

        }).catch(err => {
            console.error('Copy failed:', err);
            fallbackCopy(text);
        });
    }


    function fallbackCopy(text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);

        showToast('Link copied!', 'success');
    }




});
</script>
<script>
function showToast(message) {

    const toast = document.getElementById('copyToast');
    const msg = document.getElementById('copyToastMsg');

    if (!toast || !msg) {
        console.log('Toast div not found');
        return;
    }

    msg.textContent = message;
    toast.style.display = 'block';

    setTimeout(() => {
        toast.style.display = 'none';
    }, 2000);
}
</script>

<script>
$(document).ready(function() {
    let searchTimeout;

    $('#newsSearch').on('input', function() {
        clearTimeout(searchTimeout);
        const query = $(this).val().trim();

        searchTimeout = setTimeout(function() {
            if (query.length >= 2) {
                performSearch(query);
            } else {
                $('#searchResults').hide();
            }
        }, 300); // 300ms debounce
    });

  function performSearch(query) {
    $.ajax({
        url: '{{ route("news.search") }}',
        method: 'GET',
        data: { q: query },
        success: function(response) {
            // Add safety check
            if (response && response.news && Array.isArray(response.news)) {
                displayResults(response.news);
            } else {
                displayResults([]);
            }
        },
        error: function(xhr, status, error) {
            console.error('Search error:', error);
            $('#searchResults').html('<div class="no-results">Search failed. Please try again.</div>').show();
        }
    });
}

function displayResults(news) {
    // Safe guard - ensure news is always an array
    if (!Array.isArray(news)) {
        news = [];
    }

    let html = '';

    if (news.length > 0) {
        news.forEach(function(item) {
            // Safe property access
            const title = item.header_footer_name || 'No title';
            const slug = item.slug || '';
            const metaDesc = item.meta_description || item.content || 'No description';
            const createdAt = item.created_at || item.updated_at || new Date().toISOString();

            html += `
                <a href="/news/${slug}" class="text-decoration-none search-result-item">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">

                                <svg class="svg-icon text-white" style="width: 20px; height: 20px;">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-news"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">${title}</h6>
                            <small class="text-muted">${formatDate(createdAt)}</small>
                        </div>
                    </div>
                </a>
            `;
        });
    } else {
        html = '<div class="no-results">No news found</div>';
    }

    $('#searchResults').html(html).show();
}
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    // Hide results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.news-search').length) {
            $('#searchResults').hide();
        }
    });

    // Hide on Escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            $('#searchResults').hide();
        }
    });
});
</script>

<script>
$(document).ready(function() {

    const $form = $('#newsForm');
    const $input = $form.find('input[name="email"]');
    const $error = $form.find('.error');

    const $btn = $form.find('button[type="submit"]');
    const $subscribeText = $form.find('.subscribe-text');
    const $successText = $form.find('.success-text');
    const $subscribingText = $form.find('.subscribing-text'); // ✅ ADD THIS IN HTML

    function clearErrors() {
        $error.text('').removeClass('text-danger d-block');
        $input.removeClass('is-invalid');
    }

    function showError(msg) {
        $error.text(msg).addClass('text-danger d-block');
        $input.addClass('is-invalid');
    }

    $form.submit(function(e) {
        e.preventDefault();
        clearErrors();

        const email = $input.val().trim();

        // ✅ VALIDATION
        if (!email) {
            showError('Email is required.');
            return;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('Please enter valid email.');
            return;
        }

        // 🔄 STEP 1: SHOW "SUBSCRIBING..."
        $btn.prop('disabled', true);

        $subscribeText.addClass('d-none');
        $successText.addClass('d-none');
        $subscribingText.removeClass('d-none');

        $.ajax({
            url: '{{ route("newsletter.subscribe") }}',
            method: 'POST',
            data: { email: email },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(data) {

                // ✅ STEP 2: SHOW SUCCESS TEXT
                $subscribingText.addClass('d-none');
                $successText.removeClass('d-none');

                // Optional SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Subscribed successfully!',
                    timer: 3000,
                });

                // Optional: reset after 3 sec
                setTimeout(() => {
                    $successText.addClass('d-none');
                    $subscribeText.removeClass('d-none');
                    $btn.prop('disabled', false);
                    $form[0].reset();
                }, 3000);
            },

            error: function(xhr) {

                let errorMsg = 'Something went wrong.';

                if (xhr.status === 422 && xhr.responseJSON?.errors?.email) {
                    errorMsg = xhr.responseJSON.errors.email[0];
                }

                showError(errorMsg);

                // ❌ RESET UI
                $subscribingText.addClass('d-none');
                $subscribeText.removeClass('d-none');
                $btn.prop('disabled', false);
            }
        });
    });

});
</script>
@endpush