@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection


@push('page-css')
    <style>
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
                    <a href="{{ route('resource_news') }}" class="btn-style-3"> <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
                        </svg> See All News<svg class="svg-icon arrow-svg">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="resource-slider-wrapper">
              @if(isset($news) && count($news) > 0)
            <div class="row">
                @foreach($news->take(10) as $val)
                <div class="col-lg-4">
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
                                <div class="social-popup events-share-popup" data-index="3" data-raw-url="{{ route('news_detail', ['slug' => $val->slug]) }}" data-title="{!! html_entity_decode($val->name) ?? 'Check this out!' !!}" data-image="{{ asset($val->banner) ?? asset('images/og-image.jpg') }}">
                                    <!-- WhatsApp -->
                                    <a class="social-icon si-whatsapp" href="https://wa.me/?text=Check this out!"
                                        target="_blank" title="WhatsApp" data-share="WhatsApp">
                                        <svg class="svg-icon">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp"></use>
                                        </svg>
                                    </a>
                                    <!-- LinkedIn -->
                                    <a class="social-icon si-linkedin"
                                        href="https://www.linkedin.com/sharing/share-offsite/?url=" target="_blank"
                                        title="LinkedIn" data-share="LinkedIn">
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
                                    <a class="social-icon si-instagram" href="https://instagram.com" target="_blank"
                                        title="Instagram" data-share="Instagram">
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
                                    <button class="social-icon si-copy" title="Copy Link" data-share="Copy Link">
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
                            <a href="{{ route('news_detail', ['slug' => $val->slug]) }}">
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
             
            </div>
            @endif
        </div>
        <div class="resource-slider-controls">
            <div class="d-flex align-items-center gap-3">
                <button class="reg-prev d-none d-lg-inline-block"><svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-left"></use>
                    </svg></button>
                <div class="reg-dots"></div>
                <button class="reg-next d-none d-lg-inline-block"><svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
                    </svg></button>
            </div>
            <hr class="w-50 me-auto d-none d-lg-inline-block">
            <a href="{{ route('resource_news') }}" class="btn-style-3 d-none d-lg-inline-block"> <svg class="svg-icon">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
                </svg> Go To Our Blogs <svg class="svg-icon arrow-svg">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                </svg> </a>
        </div>
        <!-- Mobile btns  -->
        <div class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none mt-4 text-center">
            <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
                </svg> See All News <svg class="svg-icon arrow-svg">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
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
                    <a href="{{ route('resource_reports') }}" class="btn-style-3"> <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                        </svg> Go To Reports <svg class="svg-icon arrow-svg">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @if(isset($reports) && count($reports) > 0)
        <div class="row m-0" id="reports-container">
            <span class="help-filter-text d-lg-none d-block mb-3 p-0"></span>
            <!-- Report Item -->
            <div id="report-items">
              @foreach($currentYears as $yearIndex => $year)
                    @php
                        $yearReports = $reports->where(fn($r) => $r->created_at->year == $year);
                        $showRecent = $yearIndex == 0 && $loop->first; // Only first year shows 3
                    @endphp
                    
               @foreach($yearReports->take($showRecent ? 3 : 8) as $report)
                <div class="report-card">
                    <div class="icon-box desk">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                        </svg>
                    </div>
                    <div class="report-text desk">{{ $report->file_name ?? '' }}</div>
                    <div class="meta-info desk">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                        </svg>
                        <span>{{ $report->created_at->format('M, Y') }}</span>
                        <span class="size">{{ number_format(filesize(public_path($report->file)) / 1024, 0) }}kb</span>
                        <span class="pdf-pill">.{{ pathinfo($report->file, PATHINFO_EXTENSION) }}</span>
                    </div>
                    <a href="{{ asset($report->file) }}" class="download-btn desk">
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
                                    <div class="report-text-mob">{{ Str::limit($report->file_name, 30) }}
                                    </div>
                                </div>
                                <div class="mob-reportcard-info">
                                    <div class="meta-info justify-content-center">
                                        <div class="d-flex gap-2 align-items-center">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            <span>{{ $report->created_at->format('M, Y') }}</span>
                                        </div>
                                        <span class="size">{{ number_format(filesize(public_path($report->file)) / 1024, 0) }}kb</span>
                                        <span class="pdf-pill">.{{ pathinfo($report->file, PATHINFO_EXTENSION) }}</span>
                                    </div>
                                    <div class="line my-3"></div>
                                    <a href="{{ asset($report->file) }}" class="download-btn mob">
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
                    @endforeach
                @endforeach
            </div>
            <!-- Bottom Pagination -->
           <div class="reports-bottom d-none d-lg-flex">
           <div class="year-pagination" id="year-pagination">
                    {{-- Previous Button --}}
                {{-- Previous Button --}}
            @if($currentYearPage > 1)
                <a href="javascript:void(0)" class="circle-btn year-nav prev-btn" 
                data-year-page="{{ $currentYearPage - 1 }}" title="Previous Years">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-left"></use>
                    </svg>
                </a>
            @else
                <button class="circle-btn disabled" disabled>
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-left"></use>
                    </svg>
                </button>
            @endif

            {{-- FIXED: Exactly 3 Years Max, 1 Active --}}
            @foreach($currentYears as $year)
                <a href="javascript:void(0)"
                class="year-link {{ $year == $activeYear ? 'active-year' : '' }}"
                data-year="{{ $year }}"
                data-year-page="{{ $currentYearPage }}">
                    {{ $year }}
                </a>
            @endforeach
                
              
            {{-- Next Button --}}
            @if($currentYearPage < $totalYearPages)
                <a href="javascript:void(0)" class="circle-btn year-nav next-btn" 
                data-year-page="{{ $currentYearPage + 1 }}" title="Next Years">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
                    </svg>
                </a>
            @else
                <button class="circle-btn disabled" disabled>
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
                    </svg>
                </button>
            @endif
        </div>
            <hr class="w-50 me-auto">
            <a href="{{ route('resource_reports') }}" class="btn-style-3">
                <svg class="svg-icon">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                </svg> 
                See all Reports 
                <svg class="svg-icon arrow-svg">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                </svg>
            </a>
        </div>
                    <!-- Mobile btns  -->
            <div class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none text-center">
                <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                    </svg> See all Reports <svg class="svg-icon arrow-svg">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                    </svg> </a>
            </div>

        </div>
        @endif
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
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                        </svg> Go To Documents Library <svg class="svg-icon arrow-svg">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
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
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
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
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
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
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
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
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
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
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
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
            <div class="report-card">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report lorem ipsum dolor sit amet, adiscpling elet</div>
                <div class="meta-info desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                    </svg>
                    <span>Jan, 2026</span>
                    <span class="size">550kb</span>
                    <span class="pdf-pill">.pdf</span>
                </div>
                <a href="#" class="download-btn desk">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-down-arrow-circle"></use>
                    </svg>
                    Download
                </a>
                <!-- MObile shows  -->
                <div class="mob-reportcard w-100 d-lg-none">
                    <div class="mob-reportcard-icon">
                        <svg class="svg-icon mob-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                        </svg>
                        <div class="report-text-mob">Report lorem ipsum dolor sit amet, adiscpling elet
                        </div>
                    </div>
                    <div class="mob-reportcard-info">
                        <div class="meta-info justify-content-center">
                            <div class="d-flex gap-2 align-items-center">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                </svg>
                                <span>Jan, 2026</span>
                            </div>
                            <span class="size">550kb</span>
                            <span class="pdf-pill">.pdf</span>
                        </div>
                        <div class="line my-3"></div>
                        <a href="#" class="download-btn mob">
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

            <!-- Bottom Pagination -->
            <div class="reports-bottom d-none d-lg-flex">
                <hr class="w-75 me-auto">
                <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg> See all Documents <svg class="svg-icon arrow-svg">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                    </svg> </a>
            </div>

            <!-- Mobile btns  -->
            <div class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none text-center">
                <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-docs"></use>
                    </svg> See all Documents <svg class="svg-icon arrow-svg">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
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
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                        </svg> See All Updates <svg class="svg-icon arrow-svg">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link">
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
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link">
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
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link">
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
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link">
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
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share">
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
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- LinkedIn -->
                                            <a class="social-icon si-linkedin"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Facebook -->
                                            <a class="social-icon si-facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                title="Facebook" data-share="Facebook">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Pinterest -->
                                            <a class="social-icon si-pinterest"
                                                href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                title="Pinterest" data-share="Pinterest">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- X (Twitter) -->
                                            <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                target="_blank" title="X / Twitter" data-share="Twitter">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="social-icon si-instagram" href="https://instagram.com"
                                                target="_blank" title="Instagram" data-share="Instagram">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Email -->
                                            <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                                title="Email" data-share="Email">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail">
                                                    </use>
                                                </svg>
                                            </a>
                                            <!-- Copy Link -->
                                            <button class="social-icon si-copy" title="Copy Link"
                                                data-share="Copy Link">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-link">
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
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check">
                                                </use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat">
                                                </use>
                                            </svg> Read More <svg class="svg-icon arrow-svg">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right">
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
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-left"></use>
                            </svg></button>
                        <div class="reg-dots"></div>
                        <button class="reg-next d-none d-lg-inline-block"><svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-angle-right"></use>
                            </svg></button>
                    </div>
                    <hr class="w-50 me-auto d-none d-lg-inline-block">
                    <a href="events-hub.php" class="btn-style-3 d-none d-lg-inline-block"> <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
                        </svg> Go To Our Blogs <svg class="svg-icon arrow-svg">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                        </svg> </a>
                </div>
                <!-- Mobile btns  -->
                <div
                    class="d-flex flex-column gap-2 justify-content-center align-items-center d-lg-none mt-4 text-center">
                    <a href="events-hub.php" class="btn-style-4"> <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
                        </svg> See All Updates <svg class="svg-icon arrow-svg">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                        </svg> </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('page-js')
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
document.addEventListener('DOMContentLoaded', function() {
    let currentYearPage = {{ $currentYearPage ?? 1 }};
    const reportsContainer = document.querySelector('.row.m-0');
    const yearPagination = document.querySelector('.year-pagination');
    
    // Handle year pagination clicks
    yearPagination.addEventListener('click', function(e) {
        e.preventDefault();
        if (e.target.closest('.circle-btn') || e.target.closest('.year-link')) {
            const link = e.target.closest('a');
            if (link && !link.classList.contains('disabled')) {
                const yearPage = link.getAttribute('href').match(/year_page=(\d+)/)?.[1];
                if (yearPage) {
                    loadReports(yearPage);
                }
            }
        }
    });
    
    function loadReports(yearPage) {
        // Show loading state
        reportsContainer.innerHTML = '<div class="text-center py-5"><div class="spinner-border" role="status"></div></div>';
        
        fetch(`?year_page=${yearPage}&ajax=1`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                reportsContainer.innerHTML = data.html;
                yearPagination.innerHTML = data.pagination_html;
                currentYearPage = parseInt(yearPage);
                
                // Reinitialize event listeners for new pagination elements
                attachPaginationListeners();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            reportsContainer.innerHTML = '<div class="alert alert-danger">Error loading reports</div>';
        });
    }
    
    function attachPaginationListeners() {
        const yearPagination = document.querySelector('.year-pagination');
        if (yearPagination) {
            yearPagination.removeEventListener('click', handlePaginationClick);
            yearPagination.addEventListener('click', handlePaginationClick);
        }
    }
    
    function handlePaginationClick(e) {
        e.preventDefault();
        if (e.target.closest('.circle-btn') || e.target.closest('.year-link')) {
            const link = e.target.closest('a');
            if (link && !link.classList.contains('disabled')) {
                const yearPage = link.getAttribute('href').match(/year_page=(\d+)/)?.[1];
                if (yearPage) {
                    loadReports(yearPage);
                }
            }
        }
    }
    
    // Initial attachment
    attachPaginationListeners();
});
</script>


<script>
(function () {

    let currentUrl = '{{ route("resource_hub") }}';

function initEventListeners() {
    // YEAR CLICK → send specific year
    document.querySelectorAll('.year-link').forEach(link => {
        link.onclick = function(e) {
            e.preventDefault();
            loadReports(this.dataset.yearPage, this.dataset.year);
        };
    });

    // NEXT/PREV → auto-select FIRST year of new page
    document.querySelectorAll('.year-nav').forEach(btn => {
        btn.onclick = function(e) {
            e.preventDefault();
            const page = this.dataset.yearPage;
            
            // For NEXT: select first year of NEXT page
            // For PREV: select first year of PREV page  
            loadReports(page, null); // null = let server decide first year
        };
    });
}
 function loadReports(page, year = null) {

    let url = `${currentUrl}?year_page=${page}`;

    // ✅ ONLY append year if exists
    if (year) {
        url += `&year=${year}`;
    }

    document.getElementById('report-items').innerHTML =
        '<div class="text-center p-4 w-100">Loading...</div>';

    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.json())
    .then(data => {

        let html = '';

        data.reports.forEach(report => {
            html += createReportCard(report);
        });

        document.getElementById('report-items').innerHTML =
            html || '<div class="text-center w-100">No Reports Found</div>';

        updateActiveYear(data.activeYear);
        updatePagination(data);
    })
    .catch(err => console.error(err));
}

// function renderReports(reports) {

//     let html = '';

//     reports.forEach(report => {

//         const fileName = report.file_name || 'No name';
//         const date = report.created_at_formatted || '';
//         const url = report.download_url || '#';

//         html += `
//             <div class="report-card">
//                 <div>${fileName}</div>
//                 <div>${date}</div>
//                 <a href="${url}" target="_blank">Download</a>
//             </div>
//         `;
//     });

//     document.getElementById('report-items').innerHTML =
//         html || '<div class="text-center">No Reports Found</div>';
// }

function createReportCard(report) {

    const assetSvg = "{{ asset('images/icons/icons-sprite.svg') }}";

    const fileName = report.file_name || '';
    const createdAtFormatted = report.created_at_formatted || '';
    const fileSize = report.file_size || 0;
    const extension = report.extension || '';
    const downloadUrl = report.download_url || '#';

    const shortName = fileName.length > 30
        ? fileName.substring(0, 30) + '...'
        : fileName;

  return `

        <div class="report-card">

            <!-- DESKTOP -->
            <div class="icon-box desk">
                <svg class="svg-icon">
                    <use href="${assetSvg}#icon-piechart"></use>
                </svg>
            </div>

            <div class="report-text desk">${fileName}</div>

            <div class="meta-info desk">
                <svg class="svg-icon">
                    <use href="${assetSvg}#icon-calender-check"></use>
                </svg>
                <span>${createdAtFormatted}</span>
                <span class="size">${fileSize}kb</span>
                <span class="pdf-pill">.${extension}</span>
            </div>

            <a href="${downloadUrl}" class="download-btn desk" target="_blank">
                <svg class="svg-icon">
                    <use href="${assetSvg}#icon-down-arrow-circle"></use>
                </svg>
                Download
            </a>

            <!-- MOBILE -->
            <div class="mob-reportcard w-100 d-lg-none">
                <div class="mob-reportcard-icon">
                    <svg class="svg-icon mob-icon">
                        <use href="${assetSvg}#icon-piechart"></use>
                    </svg>
                    <div class="report-text-mob">${shortName}</div>
                </div>

                <div class="mob-reportcard-info">
                    <div class="meta-info justify-content-center">
                        <div class="d-flex gap-2 align-items-center">
                            <svg class="svg-icon">
                                <use href="${assetSvg}#icon-calender-check"></use>
                            </svg>
                            <span>${createdAtFormatted}</span>
                        </div>

                        <span class="size">${fileSize}kb</span>
                        <span class="pdf-pill">.${extension}</span>
                    </div>

                    <div class="line my-3"></div>

                    <a href="${downloadUrl}" class="download-btn mob" target="_blank">
                        <svg class="svg-icon">
                            <use href="${assetSvg}#icon-down-arrow-circle"></use>
                        </svg>
                        Download 
                        <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                            <use href="${assetSvg}#icon-short-arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
`;
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

  function updateActiveYear(activeYear) {

    activeYear = parseInt(activeYear); // ✅ FIX

    document.querySelectorAll('.year-link').forEach(link => {
        link.classList.remove('active-year');

        if (parseInt(link.dataset.year) === activeYear) {
            link.classList.add('active-year');
        }
    });
}


function updatePagination(data) {
    let html = '';
    const assetSvg = "{{ asset('images/icons/icons-sprite.svg') }}";

    // Previous
    if (data.currentYearPage > 1) {
        html += `
            <a href="javascript:void(0)" class="circle-btn year-nav" data-year-page="${data.currentYearPage - 1}">
                <svg class="svg-icon"><use href="${assetSvg}#icon-angle-left"></use></svg>
            </a>
        `;
    }

    // EXACTLY 3 YEARS - FIRST ONE ACTIVE
    data.currentYears.slice(0, 3).forEach((year, index) => {
        const isActive = year == data.activeYear;
        html += `
            <a href="javascript:void(0)" 
               class="year-link ${isActive ? 'active-year' : ''}"
               data-year="${year}"
               data-year-page="${data.currentYearPage}">
                ${year}
            </a>
        `;
    });

    // Next
    if (data.currentYearPage < data.totalYearPages) {
        html += `
            <a href="javascript:void(0)" class="circle-btn year-nav" data-year-page="${data.currentYearPage + 1}">
                <svg class="svg-icon"><use href="${assetSvg}#icon-angle-right"></use></svg>
            </a>
        `;
    }

    document.getElementById('year-pagination').innerHTML = html;
    initEventListeners(); // Re-attach events
}
    document.addEventListener('DOMContentLoaded', initEventListeners);

})();
</script>


@endpush