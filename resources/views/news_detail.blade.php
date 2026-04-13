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
</style>
@endpush


@php
$contact = resolve(App\Http\Controllers\Admin\CompanyController::class)->getCompanyData();
@endphp


@section('content')

<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="{{ asset($news->breadcrumb_image ?? '')}}" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb wow fadeInUp">
                <li><a href="{{ route('home') }}">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $data['category']->header_footer_name ?? '' }}</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $data['subcategory']->header_footer_name ?? '' }}</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
               <li>{{ implode(' ', array_slice(explode(' ', $news->header_footer_name ?? ''), 0, 3)) }}...</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp">
               {!! html_entity_decode($news->name ?? '') !!}
            </h1>
            <p>{!! html_entity_decode($news->breadcrumb_description ?? '') !!}</p>
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

<section class="news-detail-pg bg-grey py-100 rounded-corners-sec" id="nextSection">
    <!-- this for design prupose  the rounded corners -->
    <div class="rounded-corners-sec corner-sec-2"></div>
    <div class="container">
        <div class="row">
            <div class=" col-md-12 col-lg-9">
                <div class="news-detail-content pe-lg-4">

                    @if(isset($news->banner))
                    <div class="wow fadeInUp detail-img mb-3 ">
                        <img src="{{ asset($news->banner ?? '')}}" alt="" class="img-fluid rounded">
                    </div>
                    @endif

                    {!! html_entity_decode($news->subtitle ?? '') !!}

                    @if(isset($news->image) || isset($news->video))
                    <div class="new-detail-video position-relative">
                        @if(isset($news->image))
                        <div class="detail-img mb-3">
                            <img src="{{ asset($news->image ?? '')}}" alt="" class="img-fluid rounded">
                        </div>
                        @endif
                        <!-- On click - Video Play  -->
                        <div
                            class="btn-play-primary large-play-btn mb-lg-5 position-absolute top-50 start-50 translate-middle text-white">
                            <a data-bs-toggle="modal" data-bs-target="#promostionVideoModal"><svg class="svg-icon ">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-play"></use>
                                </svg></a>
                        </div>
                    </div>
                    @endif


                    {!! html_entity_decode($news->short_description ?? '') !!}

                    @if(isset($news->image1))
                    <div class="wow fadeInUp detail-img mb-3 ">
                        <img src="{{ asset($news->image1 ?? '') }}" alt="" class="img-fluid rounded">
                    </div>
                    @endif

                      {!! html_entity_decode($news->description ?? '') !!}



                    <div class="image-grid-section">

                        <div class="custom-grid-gallery">
                             @if(!empty($news->more_images))
                            @php
                                $images = json_decode($news->more_images, true);
                            @endphp
                            @foreach($images as $img)
                            <img src="{{ asset($img) }}" alt="News Image">
                            @endforeach
                            @endif
                        </div>

                    </div>

                        {!! html_entity_decode($news->full_description ?? '') !!}
                    <div class="news-detail-attachments mt-5">
                        <div class="heading-26 mb-3">Attachments</div>
                        <div class="report-card mb-3">
                            <div class="icon-box desk">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-globe"></use>
                                </svg>
                            </div>
                            <div class="report-text desk">{{ $news->website_name ?? ''}}</div>

                            <a href="{{ $news->website_url ?? '' }}" target="_blank" class="download-btn desk">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-globe"></use>
                                </svg>
                                Access
                            </a>
                            <!-- MObile shows  -->
                            <div class="mob-reportcard w-100 d-lg-none">
                                <div class="mob-reportcard-icon">
                                    <svg class="svg-icon mob-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-globe"></use>
                                    </svg>
                                    <div class="report-text-mob">{{ $news->website_name ?? ''}}
                                    </div>
                                </div>
                                <div class="mob-reportcard-info">

                                    <div class="line my-3"></div>
                                    <a href="{{ $news->website_url ?? '' }}" target="_blank" class="download-btn mob">
                                        <svg class="svg-icon">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-globe"></use>
                                        </svg>
                                        Access <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                            <!-- MObile shows end  -->
                        </div>

                        <div class="report-card">
                            <div class="icon-box desk">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                                </svg>
                            </div>
                            <div class="report-text desk">Download {{ implode(' ', array_slice(explode(' ', $news->header_footer_name ?? ''), 0, 3)) }}... File</div>
                            <div class="meta-info desk">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                </svg>
                                <span>{{ $news->created_at ? $news->created_at->format('M, Y') : '' }}</span>
                          @php
                            $file = public_path($news->pdf_file);
                            $size = file_exists($file) ? filesize($file) : 0;
                            $ext  = file_exists($file) ? pathinfo($file, PATHINFO_EXTENSION) : '';
                            @endphp
                                <span class="size">{{ round($size / 1024, 2) }}kb</span>
                                <span class="pdf-pill">.{{ $ext}}</span>
                            </div>

                            <a href="{{ asset($news->pdf_file ?? '') }}" target="_blank" class="download-btn desk">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                            <!-- MObile shows  -->
                            <div class="mob-reportcard w-100 d-lg-none">
                                <div class="mob-reportcard-icon">
                                    <svg class="svg-icon mob-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                                    </svg>
                                    <div class="report-text-mob">Download {{ implode(' ', array_slice(explode(' ', $news->header_footer_name ?? ''), 0, 3)) }}... File
                                    </div>
                                </div>
                                <div class="mob-reportcard-info">
                                    <div class="meta-info justify-content-center">
                                        <div class="d-flex gap-2 align-items-center">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            <span>{{ $news->created_at ? $news->created_at->format('M, Y') : '' }}</span>
                                        </div>
                                        <span class="size">{{ round($size / 1024, 2) }}kb</span>
                                        <span class="pdf-pill">.{{ $ext }}</span>
                                    </div>
                                    <div class="line my-3"></div>
                                    <a href="{{ asset($news->pdf_file ?? '') }}" target="_blank" class="download-btn mob">
                                        <svg class="svg-icon">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-down-arrow-circle"></use>
                                        </svg>
                                        Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                            <!-- MObile shows end  -->
                        </div>
                    </div>

                    <!-- share -->
                <div class="news-detail-share mt-5 d-none d-lg-flex flex-wrap align-items-center gap-3 justify-content-between"    style="background-image: url('{{ asset('images/detail1.webp') }}');"
                    data-url="{{ url()->current() }}"
                    data-title="{{ $news->header_footer_name ?? 'Check this out!' }}"
                    data-image="{{ !empty($news->banner) ? asset($news->banner) : asset('images/og-image.jpg') }}">

                    <div class="share-overlay"></div>
                    <a href="" class="text-white share-news">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                        </svg>
                        Share This News
                    </a>
                    <ul class="share-news-icons">
                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="LinkedIn">
                                <i><svg class="svg-icon" class="share-btn">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="Facebook">
                                <i><svg class="svg-icon" class="share-btn">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="Instagram">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="Email">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="Pinterest">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="WhatsApp">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="Twitter">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="share-btn" data-share="Copy Link">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link"></use>
                                    </svg></i>
                            </a>
                        </li>
                    </ul>
                </div>


                    <div class="mt-5 news-detail-post">
                        <div class="heading-26 mb-3">Post Meta</div>
                        <div class="post-meta">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                            </svg>
                            <span><b>Publication date:</b>{{ $news->created_at ? $news->created_at->format('M, Y') : '' }}</span>
                        </div>
                        <div class="post-meta">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-tag-stroke"></use>
                            </svg>
                            <span><b>Categories:</b> {{ $categoryNames ? $categoryNames->implode(', ') : '' }}</span>
                        </div>
                        <div class="post-meta">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-tag-stroke"></use>
                            </svg>
                            <span><b>Tags:</b>{{ $news->tags ?? ''}}</span>
                        </div>
                        <div class="post-meta">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-user-plus"></use>
                            </svg>
                            <span><b>Published by</b>{{ $news->published_by ?? '' }}</span>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-lg-3 d-none d-lg-block">

                <div class="news-hub-sidebar news-detail-sidebar">

                    <div class="news-search">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-search"></use>
                            </svg>
                            <p class="m-0 news-p">Search News</p>
                        </div>
                        <div class="filter-search mb-2">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-search"></use>
                            </svg>
                            <input type="search" id="newsSearch"  placeholder="What are you looking for?">
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

                    @if(isset($data['categories']) && count($data['categories']) > 0)
                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Categories</p>
                        </div>
                        <ul>
                            @foreach ($data['categories'] as $cat)
                            <li><a href="#">{{ $cat->name ?? '' }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <hr class="my-4">

                    <div class="news-recent">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#megaphone"></use>
                            </svg>
                            <p class="m-0 news-p">Recent News</p>
                        </div>

                       @if(isset($recent_news) && count($recent_news) > 0)
                        @foreach($recent_news as $val)
                        <div class="col-lg-12 mb-3">
                            <div class="resource-box wow fadeInUp">
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
                                        {{-- <div class="category-style-1">Convention</div> --}}
                                    </div>
                                    @endif
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-raw-url="{{ route('news_detail', ['slug' => $val->slug]) }}" data-title="{!! html_entity_decode($val->name) ?? 'Check this out!' !!}" data-image="{{ asset($val->banner) ?? asset('images/og-image.jpg') }}">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp"></use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin"></use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook"></use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest"></use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter"></use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram"></use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link"></use>
                                                </svg>
                                            </button>
                                            <hr class="block m-0 share-divider">
                                            <span style="color: var(--primary-300);" class="share-label">Share
                                                this</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="resource-text">
                                    <a href="{{ route('news_detail', ['slug' => $val->slug])}}">
                                        <h5>{{ $val->header_footer_name ?? '' }}</h5>
                                    </a>
                                    <p>{{ $val->title ?? ''}}</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                       {{ $val->created_at ? $val->created_at->format('F j, Y') : '' }}
                                        </div>
                                        <a href="{{ route('news_detail', ['slug' => $val->slug])}}" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat"></use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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

                    <hr class="my-4">

                    <div class="news-upcoming">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
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
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
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
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
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
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
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
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
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
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="news-newsletter">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
                            </svg>
                            <p class="m-0 news-p">Newsletter</p>
                        </div>
                        <div class="side-newsletter">
                            <div class="news-newsletter-form">
                                <img src="{{ asset($contact->newsletter_image) }}" alt="" class="py-3">
                                <p class="m-0">{!! $contact->newsletter_description ?? '' !!}</p>
                                <form id="newsdetailForm" class="pt-3">
                                    @csrf
                                    <div class="position-relative mb-3">

                                      <input type="email" name="email" placeholder="Enter your email">
                                         <div class="error invalid-feedback text-danger small"></div>
                                  
                                </div>
                                    <button type="submit" class="btn-style-2 mt-2 w-100">
                                        <svg class="svg-icon">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
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

            <!-- Mobile Recent SLider  -->
            <div class="col-lg-12 d-lg-none">
                <hr class="my-5">
                <div class="news-recent">
                    <div class="heading-26 mb-3">Recent News</div>

                    <div class="recent-news-slider">
                    @if(isset($recent_news) && count($recent_news) > 0)
                        @foreach($recent_news as $val)
                        <div class="col-lg-12">
                            <div class="resource-box wow fadeInUp">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup"  data-raw-url="{{ route('news_detail', ['slug' => $val->slug]) }}" data-title="{!! html_entity_decode($val->name) ?? 'Check this out!' !!}" data-image="{{ asset($val->banner) ?? asset('images/og-image.jpg') }}">
                                            <!-- WhatsApp -->
                                            <a class="social-icon si-whatsapp"
                                                href="https://wa.me/?text=Check this out!" target="_blank"
                                                title="WhatsApp" data-share="WhatsApp">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp"></use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin"></use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook"></use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest"></use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter"></use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram"></use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link"></use>
                                                </svg>
                                            </button>
                                            <hr class="block m-0 share-divider">
                                            <span style="color: var(--primary-300);" class="share-label">Share
                                                this</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="resource-text">
                                    <a href="{{ route('news_detail', ['slug' => $val->slug])}}">
                                        <h5>{{ $val->header_footer_name ?? '' }}</h5>
                                    </a>
                                    <p>{{ $val->title ?? ''}}</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                        {{ $val->created_at ? $val->created_at->format('F j, Y') : '' }}
                                        </div>
                                        <a href="{{ route('news_detail', ['slug' => $val->slug])}}" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat"></use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade videoModal" id="promostionVideoModal" tabindex="-1" aria-labelledby="promostionVideoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
                    class="svg-icon arrow-svg">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-cross"></use>
                </svg></button>
            <div class="modal-body">
                <iframe src="{{ $news->video ?? '' }}" width="100%" height="100%" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection


@push('page-js')
<script>
$(document).ready(function() {

    const $form = $('#newsdetailForm');
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

                    case 'Copy':
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

            showToast('Link copied!', 'success');

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
document.addEventListener('DOMContentLoaded', function(){

    document.querySelectorAll('.news-detail-share').forEach(wrapper => {

        const rawUrl = wrapper.dataset.url || window.location.href;
        const title = encodeURIComponent(wrapper.dataset.title || document.title);
        const url = encodeURIComponent(rawUrl);

        wrapper.querySelectorAll('.share-btn').forEach(btn => {

            btn.addEventListener('click', function(e){
                e.preventDefault();

                const platform = this.dataset.share;

                switch(platform) {

                    case 'WhatsApp':
                        window.open(`https://wa.me/?text=${title}%20${url}`, '_blank');
                        break;

                  case 'Facebook':
                    window.open(
                        'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(rawUrl),
                        'facebook-share',
                        'width=600,height=500,top=100,left=100'
                    );
                    break;

                    case 'Twitter':
                        window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(rawUrl)}&text=${title}`, '_blank');
                        break;

                  case 'LinkedIn':
                    window.open(
                        'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(rawUrl),
                        'linkedin-share',
                        'width=600,height=500,top=100,left=100'
                    );
                    break;

                    case 'Pinterest':
                        window.open(`https://pinterest.com/pin/create/button/?url=${encodeURIComponent(rawUrl)}&description=${title}`, '_blank');
                        break;

                    case 'Email':
                        window.location.href = `mailto:?subject=${title}&body=${title}%20${url}`;
                        break;

                    case 'Instagram':
                        navigator.clipboard.writeText(rawUrl).then(() => {
                            showToast('Link copied! Paste on Instagram');
                            window.open('https://www.instagram.com/', '_blank');
                        }).catch(() => {
                            showToast('Unable to copy link');
                        });
                        break;

                    case 'Copy Link':
                        navigator.clipboard.writeText(rawUrl).then(() => {
                            showToast('Link copied successfully!');
                        }).catch(() => {
                            showToast('Unable to copy link');
                        });
                        break;
                }
            });

        });

    });

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
@endpush
