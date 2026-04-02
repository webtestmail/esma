@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title','Users - ESMA International Network')
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
                                    <li data-filter="cat1">Category 01</li>
                                    <li data-filter="cat2">Category 02</li>
                                    <li data-filter="cat3">Category 03</li>
                                    <li data-filter="cat4">Category 04</li>
                                    <li data-filter="cat5">Category 05</li>
                                    <li data-filter="cat6">Category 06</li>
                                </ul>

                                <button class="nextvarrow">
                                    <svg class="svg-icon arrow-svg"><use href="../images/icons/icons-sprite.svg#icon-angle-right"></use></svg>
                                </button>
                            </div>


                            <!-- FILTERED CONTENT -->
                            <ul class="questions-filtered-content">
                                <div class="accordion" id="accordionHelp">
                                    
                                    <!-- FAQ 1 -->
                                    <div class="accordion-item" data-category="cat1">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq1">
                                                How can I edit my profile?
                                                <div class="faq-tag">Category 01</div>
                                            </button>
                                        </h2>
                                        <div id="faq1" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                You can edit your profile by logging into your account dashboard and
                                                updating your personal and company information.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 2 -->
                                    <div class="accordion-item" data-category="cat2">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq2">
                                                Lorem Ipsum Sit?
                                                <div class="faq-tag">Category 01</div>
                                            </button>
                                        </h2>
                                        <div id="faq2" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 3 -->
                                    <div class="accordion-item" data-category="cat3">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq3">
                                                Do I need a recommendation from an existing member?
                                                <div class="faq-tag">Category 02</div>
                                            </button>
                                        </h2>
                                        <div id="faq3" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Some membership levels may require recommendations. Please review the
                                                membership requirements before applying.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 4 -->
                                    <div class="accordion-item" data-category="cat4">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq4">
                                                What membership categories are available?
                                                <div class="faq-tag">Category 03</div>
                                            </button>
                                        </h2>
                                        <div id="faq4" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                We offer multiple membership categories based on company size,
                                                experience, and industry involvement.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 5 -->
                                    <div class="accordion-item" data-category="cat2">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq5">
                                                How long does the review process take?
                                                <div class="faq-tag">Category 04</div>
                                            </button>
                                        </h2>
                                        <div id="faq5" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                The review process typically takes a few business days depending on
                                                document verification and approval workflow.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 6 -->
                                    <div class="accordion-item" data-category="cat5">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq6">
                                                What benefits can I access as a member?
                                                <div class="faq-tag">Category 05</div>
                                            </button>
                                        </h2>
                                        <div id="faq6" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Members get access to networking events, industry updates, exclusive
                                                resources, and member-only opportunities.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 7 -->
                                    <div class="accordion-item" data-category="cat6">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq7">
                                                Is there a member directory?
                                                <div class="faq-tag">Category 06</div>
                                            </button>
                                        </h2>
                                        <div id="faq7" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Yes, members can access the directory to connect and collaborate with
                                                other professionals.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 8 -->
                                    <div class="accordion-item" data-category="cat1">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq8">
                                                Where can I meet other members?
                                                <div class="faq-tag">Category 04</div>
                                            </button>
                                        </h2>
                                        <div id="faq8" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                You can meet members through events, webinars, community forums, and
                                                local meetups.
                                            </div>
                                        </div>  
                                    </div>

                                    <!-- FAQ 9 -->
                                    <div class="accordion-item" data-category="cat4">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq9">
                                                How are standards maintained?
                                                <div class="faq-tag">Category 02</div>
                                            </button>
                                        </h2>
                                        <div id="faq9" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Standards are maintained through periodic reviews, member compliance
                                                checks, and quality assurance policies.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 10 -->
                                    <div class="accordion-item" data-category="cat3">
                                        <h2 class="accordion-header faq-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq10">
                                                What if my company is under one year old?
                                                <div class="faq-tag">Category 01</div>
                                            </button>
                                        </h2>
                                        <div id="faq10" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                New companies may still apply but may need to provide additional
                                                documentation or references.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </ul>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const filterButtons = document.querySelectorAll(".questions-filter-category li");
    const items = document.querySelectorAll(".questions-filtered-content li");

    filterButtons.forEach(btn => {
        btn.addEventListener("click", function() {

            // remove active
            filterButtons.forEach(b => b.classList.remove("active"));
            this.classList.add("active");

            const filterValue = this.getAttribute("data-filter");

            items.forEach(item => {
                if (filterValue === "all" || item.getAttribute("data-category") ===
                    filterValue) {
                    item.style.display = "flex";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });

});
</script>


@endsection