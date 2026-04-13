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

    </style>
@endpush

@php
$contact = resolve(App\Http\Controllers\Admin\CompanyController::class)->getCompanyData();
@endphp

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
     @if(isset($category))
    <div class="mobile-cat-tabs d-lg-none mb-3" id="mobileCatTabs">
        <a href="{{ route('resource_reports') }}"  class="mobile-cat-tab {{ !request('category_name') ? 'active' : '' }}">All</a>
         @foreach($category as $cat)
        <a href="?category_name={{ urlencode($cat->name) }}" class="mobile-cat-tab {{ request('category_name') == $cat->name ? 'active' : '' }}">{{ $cat->name ?? '' }}</a>
        @endforeach

    </div>
    @endif
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
                                        <div class="report-text desk">{{ $report->file_name }}
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
                                                <div class="report-text-mob">{{ Str::limit($report->file_name, 30) }}</div>
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
                            <input type="search" id="reportSearch" placeholder="Search by name">
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
                            <a href="?{{ http_build_query(array_merge(request()->except('year'), ['year' => $year])) }}" class="year-btn {{ request('year') == $year ? 'active' : '' }}">{{ $year }}</a>
                           @endforeach

                        </div>
                        @endif
                    </div>

                    <hr class="my-4">

                    @if(isset($category) && count($category) > 0)
                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Report Categories</p>
                        </div>
                        <ul>
                            @foreach($category as $cat)
                            <li><a href="?{{ http_build_query(array_merge(request()->except('category_name'), ['category_name' => $cat->name])) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

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
                                <form id="reportsubscribeForm" class="pt-3">
                                     @csrf
                                    <div class="position-relative mb-3">
                                      <input name="email" type="email" placeholder="Enter your email">
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

<script>
$(document).ready(function() {
    let searchTimeout;

    $('#reportSearch').on('input', function() {
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
        url: '{{ route("reports.search") }}',
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
                <a href="/reports/${slug}" class="text-decoration-none search-result-item">
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

    const $form = $('#reportsubscribeForm');
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