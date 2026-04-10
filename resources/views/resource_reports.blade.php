@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection


@push('page-css')
    <style>
        .year-btn.active { 
            font-weight: bold; 
            color: ##262761; 
            text-decoration: underline; 
        }
    </style>
@endpush

@section('content')
<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="{{ asset($page->page_image ?? '')}}" type="video/mp4">
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
                <li>{{ $page->header_footer_name ?? '' }}</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp">
                {{ $page->header_footer_name ?? '' }}
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


<section class="py-100 bg-grey rounded-corners-sec" id="nextSection">
    <!-- this for design prupose  the rounded corners -->
    <div class="rounded-corners-sec corner-sec-2"></div>
    <!-- Mobile-only category tabs — reuses mobile-cat-tabs CSS -->
    <div class="mobile-cat-tabs d-lg-none mb-3" id="mobileCatTabs">
        <button class="mobile-cat-tab active" onclick="filterReportCat(this, 'all')">All</button>
        <button class="mobile-cat-tab" onclick="filterReportCat(this, 'category-01')">Category 01</button>
        <button class="mobile-cat-tab" onclick="filterReportCat(this, 'category-02')">Category 02</button>
        <button class="mobile-cat-tab" onclick="filterReportCat(this, 'category-03')">Category 03</button>
        <button class="mobile-cat-tab" onclick="filterReportCat(this, 'category-04')">Category 04</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9 pe-lg-4">
                <div class="accordion reports-accordion" id="reportsAccordionUnique">
                    <p class="reports-filter-text  d-lg-none">
                        Showing only reports from <strong class="filter-name"></strong>.
                    </p>
                      @foreach($reports as $year => $yearReports)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $year }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $year }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                <h6>{{ $year }}</h6>
                                <span class="accord-count-badge">{{ $yearReports->count() }}</span>
                            </button>
                        </h2>
                        <div id="collapse{{ $year }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            data-bs-parent="#reportsAccordionUnique">
                            <div class="accordion-body p-0">
                                <div class="row m-0">
                                     @foreach($yearReports as $report)
                                    <div class="report-card" data-category="category-01">
                                        <div class="icon-box desk">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-piechart"></use>
                                            </svg>
                                        </div>
                                        <div class="report-text desk">{{ $report->name }}
                                        </div>
                                        <div class="meta-info desk">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            <span>{{ $report->created_at->format('M, Y') }}</span>
                                            <span class="size">{{ number_format(filesize(public_path($report->file)) / 1024, 0) }}kb</span>
                                            <span class="pdf-pill">.{{ pathinfo($report->file, PATHINFO_EXTENSION) }}</span>
                                        </div>
                                        <a href="{{ asset($report->file) }}" target="_blank" class="download-btn desk">
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
                                                <div class="report-text-mob">{{ Str::limit($report->name, 30) }}</div>
                                            </div>
                                            <div class="mob-reportcard-info">
                                                <div class="meta-info justify-content-center">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="#icon-calender-check">
                                                            </use>
                                                        </svg>
                                                        <span>{{ $report->created_at->format('M, Y') }}</span>
                                                    </div>
                                                    <span class="size">{{ number_format(filesize(public_path($report->file)) / 1024, 0) }}kb</span>
                                                    <span class="pdf-pill">.{{ pathinfo($report->file, PATHINFO_EXTENSION) }}</span>
                                                </div>
                                                <div class="line my-3"></div>
                                                <a href="{{ asset($report->file) }}" target="_blank" class="download-btn mob">
                                                    <svg class="svg-icon">
                                                        <use
                                                            href="#icon-down-arrow-circle">
                                                        </use>
                                                    </svg>
                                                    Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                                        <use
                                                            href="#icon-short-arrow-right">
                                                        </use>
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>
                                        <!-- MObile shows end  -->
                                    </div>
                                     @endforeach
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                  

                </div>
            </div>

            <div class="col-lg-3 d-none d-lg-block">
                <div class="news-hub-sidebar">
                    <div class="news-search">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-search"></use>
                            </svg>
                            <p class="m-0 news-p">Search Reports</p>
                        </div>
                        <div class="filter-search mb-2">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-search"></use>
                            </svg>
                            <input type="search" id="reportSearch" placeholder="Search by name or date">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="news-reports-years">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                            </svg>
                            <p class="m-0 news-p">Reports Years</p>
                        </div>

                        @if(isset($allYears) && count($allYears) > 0)
                        <div class="years-grid">
                            @foreach($allYears as $year)
                            <a href="?year={{ $year }}" class="year-btn {{ request('year') == $year ? 'active' : '' }}">{{ $year }}</a>
                           @endforeach

                        </div>
                        @endif
                    </div>

                    <hr class="my-4">

                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Report Categories</p>
                        </div>
                        <ul>
                            <li><a href="#">Report Category 01</a></li>
                            <li><a href="#">Report Category 02</a></li>
                            <li><a href="#">Report Category 03</a></li>
                            <li><a href="#">Report Category 04</a></li>
                            <li><a href="#">Report Category 05</a></li>
                            <li><a href="#">Report Category 06</a></li>
                        </ul>
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
                                <img src="images/journal-blue.png" alt="" class="py-3">
                                <p class="m-0">Subscribe to receive handpicked luxury listings, exclusive previews, and
                                    market insights — all delivered straight to your inbox. Stay effortlessly connected
                                    to the finest properties, tailored to your taste.</p>
                                <form class="pt-3">
                                    <input type="email" placeholder="Enter your email">
                                    <button type="submit" class="btn-style-2 mt-2 w-100">
                                        <svg class="svg-icon">
                                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-megaphone"></use>
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
    function filterReportCat(el, cat) {
        document.querySelectorAll('.mobile-cat-tab').forEach(b => b.classList.remove('active'));
        el.classList.add('active');

        const helpText = document.querySelector('.reports-filter-text');
        const filterName = document.querySelector('.filter-name');

        if (cat === 'all') {
            helpText.classList.remove('active');
        } else {
            filterName.textContent = el.textContent.trim();
            helpText.classList.add('active');
        }

        document.querySelectorAll('#reportsAccordionUnique .accordion-item').forEach(item => {
            let visibleCount = 0;
            item.querySelectorAll('.report-card').forEach(card => {
                card.style.display = (cat === 'all' || card.dataset.category === cat) ? '' : 'none';
                if (cat === 'all' || card.dataset.category === cat) visibleCount++;
            });
            item.style.display = visibleCount === 0 ? 'none' : '';
            const badge = item.querySelector('.accord-count-badge');
            if (badge) badge.textContent = visibleCount < 10 ? '0' + visibleCount : visibleCount;
        });
    }
</script>
@endpush