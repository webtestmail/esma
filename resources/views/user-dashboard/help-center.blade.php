@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title','Help Center - ESMA International Network')
@section('content')
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row">
         @include('user-dashboard.components.dashboard-sidebar')

            <div class="col-lg-9 mainContent-col">
                <div class="dashboard-content">

                    @include('user-dashboard.components.dashboard-header')

                    <div class="dashboard-content-inner">
                        <div class="c-spacer__horizontal my-4"></div>
                        <div class="d-flex align-items-center justify-content-between w-100 mb-4">
                            <h2 class="dashboard-page-title">Help Center</h2>
                             <form action="" class="serach-library">
                                <i><svg class="svg-icon">
                                        <use href="../images/icons/icons-sprite.svg#icon-search"></use>
                                    </svg></i>
                                <input type="text" placeholder="Search Files">
                            </form>
                        </div>

                        <div class="dashboard-stat-card library-filter questions-filter">

                            <!-- CATEGORY FILTER -->
                            <div class="questions-filter-wrapper">
                                <button class="prevarrow">
                                    <svg class="svg-icon arrow-svg"><use href="../images/icons/icons-sprite.svg#icon-angle-left"></use></svg>
                                </button>
                                <ul class="questions-filter-category list-unstyled mb-0">
                                    <li class="active" data-filter="all">All</li>
                                    @foreach ($faqsCategory as $category)
                                        <li data-filter="cat{{ $category->id }}">{{ $category->name }}</li>
                                    @endforeach
                            
                               
                                </ul>

                                <button class="nextvarrow">
                                    <svg class="svg-icon arrow-svg"><use href="../images/icons/icons-sprite.svg#icon-angle-right"></use></svg>
                                </button>
                            </div>


                            <!-- FILTERED CONTENT -->
                            <ul class="questions-filtered-content">
                                <div class="accordion" id="accordionHelp">
                                    
                                    <!-- FAQ 1 -->
                                     @foreach ($faqs as $faq)
                                    <div class="accordion-item faq-item" data-category="cat{{ $faq->category_id }}">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq1">
                                                {{ $faq->question }}
                                                <div class="faq-tag">{{ $faq->faq_type }}</div>
                                            </button>
                                        </h2>
                                        <div id="faq1" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                        

                                </div>

                            </ul>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@push('user-custom-js')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll(".questions-filter-category li");
    const faqItems = document.querySelectorAll(".faq-item");
    const searchInput = document.getElementById("faqSearch");

    function filterFAQs() {
        const activeBtn = document.querySelector(".questions-filter-category li.active");
        const activeCategory = activeBtn ? activeBtn.getAttribute("data-filter") : "all";
        const searchText = searchInput ? searchInput.value.toLowerCase() : "";

        faqItems.forEach(item => {
            const itemCategory = item.getAttribute("data-category");
            const categoryMatch = (activeCategory === "all" || itemCategory === activeCategory);
            
            const questionText = item.querySelector(".faq-question-text")?.textContent.toLowerCase() || "";
            const searchMatch = questionText.includes(searchText);

            item.style.setProperty('display', (categoryMatch && searchMatch) ? 'block' : 'none', 'important');
        });
    }

    filterButtons.forEach(btn => {
        btn.addEventListener("click", function() {
            filterButtons.forEach(b => b.classList.remove("active"));
            this.classList.add("active");
            filterFAQs();
        });
    });

    if (searchInput) {
        searchInput.addEventListener("keyup", filterFAQs);
    }
    
    // Run once on load to ensure "All" is respected
    filterFAQs();
});
</script>
@endpush

@endsection