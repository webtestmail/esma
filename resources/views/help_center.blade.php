@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video">
        <source src="{{ asset($page->page_image) }}" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <li><a href="{{ route('home') }}">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $page->breadcrumb_headline }}</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                {{ $page->breadcrumb_headline }}</span>
            </h1>
            <p>{!! html_entity_decode($page->breadcrumb_description) !!}</p>
            <div class="scroll-div mt-1 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
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


<section class=" bg-primary-900 rounded-corners-sec" id="nextSection">
    <div class="help-center-sec help-center-pg py-100">
        <!-- <div class="rounded-corners-sec corner-sec-2 "></div> -->
        <div class="container" id="membersFilterSection01">
            <div class="row">
                <!-- Tabs -->
                <div class="help-center-tabs home-resource-tabs d-flex align-items-center justify-content-between">

                     @if(isset($faqcategory) && count($faqcategory) > 0)
                    <ul class="nav nav-tabs" id="membersTabsUnique01">

                          <li class="nav-item">
                                <button class="nav-link filter-tab active" data-filter="all">
                                    Most Frequent
                                </button>
                            </li>
                        @foreach($faqcategory as $index => $cat)
                        <li class="nav-item">
                            <button class="nav-link filter-tab" data-filter="{{ strtolower($cat->name) }}">
                               {{ $cat->name ?? '' }}
                            </button>
                        </li>
                        @endforeach

                    </ul>
                    @endif
                    <div class="input-box quest-search d-none d-lg-inline-block">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-search"></use>
                        </svg>
                        <input type="search" id="faqSearch" placeholder="Search Questions">
                    </div>

                </div>

                <!-- Accordion -->
          @if(isset($faqcategory) && count($faqcategory) > 0)
                <div class="accordion members-accordion acc-outer py-5 help-center-accordion"
                    id="membersFilterAccordionUnique01">
             
                    <!-- The Text will Shows when we filter the Questions by clicking on the Tabs, and it will be hidden when we click on the "Most Frequent" Tab,  -->
                    <span class="d-lg-none help-filter-text mb-4 d-block" id="filterText">
                        Showing only the <b id="filterName">Most Frequent</b> questions.
                    </span>
                      @foreach($faqcategory as $catIndex => $cat)
                       @foreach($cat->faqs->take(5) as $faqIndex => $val)   
                    <!-- Most Frequent -->
                    <div class="accordion-item accordion-diff-item d-none" data-category="{{ strtolower($cat->name) }}">
                        <h2 class="accordion-header" id="catHeading{{ $catIndex }}_{{ $faqIndex }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $catIndex }}_{{ $faqIndex }}">
                                <h6>{{ $val->question }}</h6> <span
                                    class="text-end acc-tag">{{ $val->faq_type }}</span>
                            </button>
                        </h2>
                        <div id="collapse{{ $catIndex }}_{{ $faqIndex }}" class="accordion-collapse accordion-diff-collapse collapse"
                            data-bs-parent="#membersFilterAccordionUnique01">
                            <div class="accordion-body">
                               {!! html_entity_decode($val->answer) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach

                </div>
                @endif
   
                <div class="custom-pagination d-flex align-items-center justify-content-center gap-2" id="faqPagination">


                </div>

            </div>
        </div>
    </div>
</section>
@endsection


@push('page-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.filter-tab');
    const accordionItems = document.querySelectorAll('.accordion-item');
    const filterText = document.getElementById('filterText');
    const filterName = document.getElementById('filterName');
    
    function showAll() {
        accordionItems.forEach(item => {
            item.style.display = '';
            item.classList.remove('d-none');
        });
        if (filterText) filterText.classList.add('d-none');
    }
    
    function showCategory(catName) {
        accordionItems.forEach(item => {
            if (item.dataset.category === catName) {
                item.style.display = '';
                item.classList.remove('d-none');
            } else {
                item.style.display = 'none';
                item.classList.add('d-none');
            }
        });
        if (filterText) {
            filterText.classList.remove('d-none');
            filterName.textContent = catName.charAt(0).toUpperCase() + catName.slice(1);
        }
    }
    
    // DEFAULT: Show ALL
    showAll();
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Update active tab
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            const filter = tab.dataset.filter;
            
            if (filter === 'all') {
                showAll();
            } else {
                showCategory(filter);
            }
        });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.filter-tab');
    const items = document.querySelectorAll('.accordion-item');
    const searchInput = document.getElementById('faqSearch');
    const paginationContainer = document.getElementById('faqPagination');
    
    let currentFilter = 'all';  // Default to "all" (Most Frequent)
    let currentPage = 1;
    const itemsPerPage = 5;  // Match your Blade take(5)
    
    // Get visible FAQs for current filter + search
    function getVisibleFaqs() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        return Array.from(items).filter(item => {
            const categoryMatch = currentFilter === 'all' || item.dataset.category === currentFilter;
            const questionText = item.querySelector('h6')?.textContent.toLowerCase() || '';
            const answerText = item.querySelector('.accordion-body')?.textContent.toLowerCase() || '';
            const searchMatch = !searchTerm || 
                questionText.includes(searchTerm) || 
                answerText.includes(searchTerm);
            return categoryMatch && searchMatch;
        });
    }
    
    // Update pagination based on visible FAQs
    function updatePagination() {
        const visibleFaqs = getVisibleFaqs();
        const totalPages = Math.ceil(visibleFaqs.length / itemsPerPage);
        
        paginationContainer.innerHTML = '';
        
        // Previous button
        const prevBtn = document.createElement('a');
        prevBtn.href = '#';
        prevBtn.className = `page-btn circle purple ${currentPage === 1 ? 'disabled' : ''}`;
        prevBtn.innerHTML = '<svg class="svg-icon arrow-svg"><use href="{{ asset("images/icons/icons-sprite.svg") }}#icon-angle-left"></use></svg>';
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage > 1) changePage(currentPage - 1);
        });
        paginationContainer.appendChild(prevBtn);
        
        // Page numbers (1-3, dots, last)
        const showPages = Math.min(3, totalPages);
        for (let i = 1; i <= showPages; i++) {
            const pageBtn = createPageButton(i, totalPages);
            paginationContainer.appendChild(pageBtn);
        }
        if (totalPages > 3) {
            const dots = document.createElement('span');
            dots.className = 'page-dots';
            dots.textContent = '...';
            paginationContainer.appendChild(dots);
            
            const lastBtn = createPageButton(totalPages, totalPages);
            paginationContainer.appendChild(lastBtn);
        }
        
        // Next button
        const nextBtn = document.createElement('a');
        nextBtn.href = '#';
        nextBtn.className = `page-btn circle purple ${currentPage === totalPages ? 'disabled' : ''}`;
        nextBtn.innerHTML = '<svg class="svg-icon arrow-svg"><use href="{{ asset("images/icons/icons-sprite.svg") }}#icon-angle-right"></use></svg>';
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage < totalPages) changePage(currentPage + 1);
        });
        paginationContainer.appendChild(nextBtn);
    }
    
    function createPageButton(pageNum, totalPages) {
        const btn = document.createElement('a');
        btn.href = '#';
        btn.className = `page-btn circle ${currentPage === pageNum ? 'active' : ''}`;
        btn.textContent = pageNum.toString().padStart(2, '0');
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            changePage(pageNum);
        });
        return btn;
    }
    
    function changePage(page) {
        currentPage = page;
        applyPagination();
        updatePagination();
    }
    
    function applyPagination() {
        const visibleFaqs = getVisibleFaqs();
        const pageStart = (currentPage - 1) * itemsPerPage;
        const pageEnd = pageStart + itemsPerPage;
        
        items.forEach(item => {
            const isInCurrentPage = visibleFaqs.slice(pageStart, pageEnd).includes(item);
            item.classList.toggle('d-none', !isInCurrentPage);
        });
    }
    
    // Tab click handler
    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            currentFilter = tab.dataset.filter;
            currentPage = 1;
            searchInput.value = '';  // Clear search on tab change
            applyPagination();
            updatePagination();
        });
    });
    
    // Search input handler
    searchInput?.addEventListener('input', () => {
        currentPage = 1;
        applyPagination();
        updatePagination();
    });
    
    // Initial load: Show first page of all FAQs
    updatePagination();
    applyPagination();
});
</script>

@endpush