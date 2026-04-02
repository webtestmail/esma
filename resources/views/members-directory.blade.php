@extends('layouts.MainLayouts')
@section('title', 'Members Directory')
@section('content')

 
<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="./images/banner-video.mp4" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb wow fadeInUp">
                <li><a href="index.php">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="images/icons/icons-sprite.svg#icon-three-arrow"></use>
                </svg>
                <li>Members Directory</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp">
                Member <span>Directory</span>
            </h1>
            <p>This is the page excerpt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac est
                fermentum, euismod placerat.</p>
            <div class="scroll-div">
                <div class="line-1"></div>
                <div class="scroll-box flex-shrink-0 d-flex align-items-center gap-2" id="scrollDownBtn">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-scrolldown"></use>
                    </svg>
                    <span>Scroll Down</span>
                </div>
                <div class="line-2"></div>
            </div>
        </div>
    </div>
</section>

<section class="py-100 memeber-directory-pg" id="nextSection">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                <!-- Members Filter -->
                <div class="members-filter">

                    <div class="accordion members-accordion" id="membersFilterAccordion">
                        <!-- Company Name -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#companyName">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-company"></use>
                                    </svg>
                                    <span>Company Name</span>
                                </button>
                            </h2>

                            <div id="companyName" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Type company name or tagline">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member Category -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#memberCategory">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                                    </svg>
                                    <span>Member Category</span>
                                </button>
                            </h2>

                            <div id="memberCategory" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="filter-list">
                                        @foreach($member_categories as $category)
                                         <label class="filter-check">
                                            <input type="checkbox">
                                            <span></span>
                                            {{ $category->name }}
        
                                       
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Category -->
                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#productCategory">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                                    </svg>

                                    <span>Product Category</span>

                                </button>
                            </h2>

                            <div id="productCategory" class="accordion-collapse collapse show">

                                <div class="accordion-body">

                                    <div class="product-filter">

                                        @foreach($product_categories as $product)
                                        <div class="product-item active">

                                            <div class="product-head">
                                                <label class="filter-check">
                                                    <input type="checkbox">
                                                    <span></span>
                                                    {{ $product->name }}
                                                </label>
                                            </div>
                                        
                                        </div>
                                        @endforeach
                           
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#countryFilter">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-location-stroke"></use>
                                    </svg>

                                    <span>Country</span>

                                </button>
                            </h2>

                            <div id="countryFilter" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Find Country">
                                    </div>
                                    <div class="filter-list scroll">
                                        @foreach($countries as $country)
                                        <label class="filter-check"><input type="checkbox"><span></span>{{ $country->name }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#tradeSector">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-setting"></use>
                                    </svg>

                                    <span>Trade Sector</span>

                                </button>
                            </h2>

                            <div id="tradeSector" class="accordion-collapse collapse">

                                <div class="accordion-body">

                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Find sectors">
                                    </div>

                                    <div class="filter-list scroll">
                                        @foreach($trade_sectors as $sector)
                                        <label class="filter-check"><input type="checkbox"><span></span>{{ $sector->name }}</label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                                    
                        </div>


                        <!-- Brand -->
                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#brandFilter">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-brand"></use>
                                    </svg>

                                    <span>Brand</span>

                                </button>
                            </h2>

                            <div id="brandFilter" class="accordion-collapse collapse">

                                <div class="accordion-body">

                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Find brands">
                                    </div>

                                    <div class="filter-list scroll">
                                        @foreach($brands as $brand)
                                        <label class="filter-check"><input type="checkbox"><span></span>{{ $brand->name }}</label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                                      

            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/A. Loacker SpaAG/Untitled-1.jpg"
                                    alt="A. Loacker Spa/AG"></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/c-brands__circles.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/c-glyph-flags.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/A.G. Barr p.l.c/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/A.G. Barr p.l.c/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/A.G. Barr p.l.c/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Company Name/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Company Name/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Company Name/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Consivo Group AB/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Consivo Group AB/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Consivo Group AB/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Emco/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Emco/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/Emco/Untitled-3.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/GRUPO HERDEZ/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/GRUPO HERDEZ/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/GRUPO HERDEZ/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Gü/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Gü/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/Gü/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Konings-Zuivel/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Konings-Zuivel/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Konings-Zuivel/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Nordic Well Group/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Nordic Well Group/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Nordic Well Group/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/UAB EKKO LT/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/UAB EKKO LT/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/UAB EKKO LT/Untitled-3.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img
                                    src="images/WS Global Export Services Limited/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/WS Global Export Services Limited/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/WS Global Export Services Limited/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Consivo Group AB/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Consivo Group AB/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Consivo Group AB/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Emco/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Emco/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/Emco/Untitled-3.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/GRUPO HERDEZ/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/GRUPO HERDEZ/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/GRUPO HERDEZ/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Gü/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Gü/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img src="images/Gü/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/Konings-Zuivel/Untitled-1.jpg" alt=""></div>
                            <div class="c-tag">Manufacturers</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="images/Konings-Zuivel/Untitled-2.png" alt="">
                                        <div class="company-m-country-logo"><img
                                                src="images/Konings-Zuivel/Untitled-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p>A. Loacker Spa/AG</p>
                                <span>Pure goodness / Che bontà</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-pagination d-flex align-items-center justify-content-center gap-2">

                    <!-- Prev -->
                    <a href="#" class="page-btn circle purple">
                        <i class="bi bi-chevron-left"></i>
                    </a>

                    <!-- Numbers -->
                    <a href="#" class="page-btn circle active">01</a>
                    <a href="#" class="page-btn circle">02</a>
                    <span class="page-dots">...</span>
                    <a href="#" class="page-btn circle">05</a>

                    <!-- Next -->
                    <a href="#" class="page-btn circle purple">
                        <i class="bi bi-chevron-right"></i>
                    </a>

                </div>

            </div>

        </div>
    </div>
</section>

<script>
    document.querySelectorAll(".toggle-btn").forEach(btn => {

        btn.addEventListener("click", function () {

            const item = this.closest(".product-item");
            const sub = item.querySelector(".sub-products");

            if (!sub) return;

            if (sub.classList.contains("open")) {

                sub.style.maxHeight = sub.scrollHeight + "px";

                requestAnimationFrame(() => {
                    sub.style.maxHeight = "0px";
                });

                sub.classList.remove("open");
                this.textContent = "+";

            } else {

                sub.classList.add("open");
                sub.style.maxHeight = sub.scrollHeight + "px";

                this.textContent = "−";

            }

        });

    });
</script>


<footer class="footer">
    <!-- Background Video -->
    <video autoplay muted loop playsinline class="footer-bg-video">
        <source src="./images/banner-video.mp4" type="video/mp4">
    </video>

    <div class="footer-overlay"></div>
    <div class="container">

        <!-- TOP ROW -->
        <div class="row align-items-start mb-5 pt-100 align-items-center">
            <div class="col-lg-3">
                <a href="#" class="logo-footer">
                    <img src="images/logo-white.png" alt="">
                </a>
            </div>

            <div class="col-lg-6">
                <ul class="list-unstyled d-flex align-items-start  mb-0 justify-content-lg-between footer-contact-info">
                    <li>
                        <a href="tel:" class="d-flex gap-2">
                            <i class="bi bi-chat-dots"></i> + 353 (87) 444 2121
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-flex gap-2">
                            <i class="bi bi-envelope"></i> david.oneill@esma.org
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-flex gap-2">
                            <i class="bi bi-envelope"></i> olga.mulcahy@esma.org
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 text-lg-end">
                <ul class="list-inline mb-0 footer-social-icons">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <hr>

        <!-- MAIN FOOTER CONTENT -->
        <div class="row  mt-5 mb-5">

            <div class="col-lg-5">
                <h4 class="mb-3 section-title text-white">
                    Curated Insights.<br>
                    Direct to You.
                </h4>
            </div>

            <div class="col-lg-7">
                <div class="footer-news-letter">
                    <div class="footer-news-flex d-flex align-items-start gap-3 mb-3">
                        <!-- <i class="bi bi-newspaper"></i> -->
                        <img src="images/journal 1.webp" alt="">
                        <p class="m-0">Subscribe to receive handpicked luxury listings, exclusive previews, and market
                            insights —
                            all delivered straight to your inbox. Stay effortlessly connected to the finest properties,
                            tailored to
                            your taste.</p>
                    </div>
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                        <button type="submit" class="btn">
                            <i class="bi bi-megaphone"></i> Sign Up
                        </button>
                    </form>
                </div>
            </div>


        </div>

        <hr>

        <div class="row mt-5 mb-5 footer-links-row">

            <div class="col-lg-3">
                <ul>
                    <h4>Members</h4>
                    <ul>
                        <li><a href="#">Member Directory</a></li>
                        <li><a href="#">Why Join ESMA?</a></li>
                        <li><a href="#">Benefits</a></li>
                        <li><a href="#">Member Testimonials</a></li>
                        <li><a href="#">How to Join</a></li>
                        <li><a href="#">Apply for Membership</a></li>
                    </ul>
                </ul>
            </div>

            <div class="col-lg-3">
                <ul>
                    <h4>Events Hub</h4>
                    <ul>
                        <li><a href="#">Upcoming Events</a></li>
                        <li><a href="#">Past Events</a></li>
                        <li><a href="#">Event Calendar</a></li>
                        <li><a href="#">Trade Fairs</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-lg-3">
                <ul>
                    <h4>Knowledge Hub</h4>
                    <ul>
                        <li><a href="#">News & Announcements</a></li>
                        <li><a href="#">Articles & Reports</a></li>
                        <li><a href="#">Document Library</a></li>
                        <li><a href="#">Regulatory Updates</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-lg-3">
                <ul>
                    <h4>ESMA International Network</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </ul>
            </div>
        </div>

        <hr>

        <!-- BOTTOM BAR -->
        <div class="row mt-5">
            <div class="col text-center footer-copyright">
                <small>
                    © 2025 ESMA International Network. All rights reserved. | Web Design by Loco Digital
                </small>
            </div>
        </div>

        <div class="event-wrapper">

            <div class="event-toggle">
                <span class="arrow-icon"><i class="bi bi-chevron-down"></i></span>
                <span class="toggle-text">Upcoming Events</span>
            </div>

            <div class="event-fixed">
                <div class="event-img">
                    <img src="images/Gü/Untitled-1.jpg" alt="">
                </div>

                <div class="event-content">
                    <span class="event-badge">Upcoming Event</span>
                    <h4>48th ESMA Convention, London, UK</h4>
                    <p><i class="bi bi-calendar-check"></i> &emsp13; 26th to 28th January ’26</p>
                </div>
                <div class="event-arrow"><a href=""><i class="bi bi-arrow-up-right"></i></a></div>
            </div>

        </div>


    </div>

</footer>

<div class="share-wrapper fixed-share-wrap " id="shareWrapper">
    <!-- Social Popup -->
    <div class="social-popup events-share-popup" data-index="1">
        
        <span style="color: var(--primary-300);" class="share-label">Share this</span>
        <hr class="block m-0 share-divider">
        <!-- WhatsApp -->
        <a class="social-icon si-whatsapp" href="https://wa.me/?text=Check this out!" target="_blank" title="WhatsApp"
            data-share="WhatsApp">
            <svg class="svg-icon">
                <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
            </svg>
        </a>
        <!-- LinkedIn -->
        <a class="social-icon si-linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=" target="_blank"
            title="LinkedIn" data-share="LinkedIn">
            <svg class="svg-icon">
                <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
            </svg>
        </a>
        <!-- Facebook -->
        <a class="social-icon si-facebook" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
            title="Facebook" data-share="Facebook">
            <svg class="svg-icon">
                <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
            </svg>
        </a>
        <!-- Pinterest -->
        <a class="social-icon si-pinterest" href="https://pinterest.com/pin/create/button/?url=" target="_blank"
            title="Pinterest" data-share="Pinterest">
            <svg class="svg-icon">
                <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
            </svg>
        </a>
        <!-- X (Twitter) -->
        <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url=" target="_blank" title="X / Twitter"
            data-share="Twitter">
            <svg class="svg-icon">
                <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
            </svg>
        </a>
        <!-- Instagram -->
        <a class="social-icon si-instagram" href="https://instagram.com" target="_blank" title="Instagram"
            data-share="Instagram">
            <svg class="svg-icon">
                <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
            </svg>
        </a>
        <!-- Email -->
        <a class="social-icon si-email" href="mailto:?subject=Check this out&body=" title="Email" data-share="Email">
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
        
    </div>

    <!-- Share Button -->
    <button class="share-btn events-share c-share-1" id="shareBtn">
        <svg class="svg-icon">
            <use href="images/icons/icons-sprite.svg#icon-share"></use>
        </svg>
        Share <br> this page
    </button>

    <!-- Accessibility -->
    <div class="icon-circle">
        <svg class="svg-icon">
            <use href="images/icons/icons-sprite.svg#icon-man"></use>
        </svg>
    </div>
    <!-- Dark Mode -->
    <div class="icon-circle">
        <svg class="svg-icon">
            <use href="images/icons/icons-sprite.svg#icon-moon"></use>
        </svg>
    </div>
    <!-- Scroll Top -->
    <div class="icon-circle scroll-top">
        <svg class="svg-icon">
            <use href="images/icons/icons-sprite.svg#icon-arrow-top-fix"></use>
        </svg>
    </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="membershipModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Close Button -->
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4">

                <div class="container">

                    <h1>Join ESMA International Network</h1>

                    <p class="description">
                        Membership in ESMA is open to all professional agents, distributors and manufacturers
                        and sales & marketing organisations that specialise in manufacturing or handling of
                        packaged consumer goods.
                    </p>

                    <p class="description">
                        The applicant company must have been established for at least one year and show
                        to the satisfaction of the ESMA Executive Committee that it provides top-quality
                        services to the FMCG Industry.
                    </p>

                    <hr>

                    <div class="info-row">
                        <span>Need more information?</span>
                        <span class="arrow">→</span>
                        <button class="outline-btn">Learn more about membership.</button>
                        <button class="outline-btn">Contact Us</button>
                    </div>

                    <hr>

                    <div class="steps-title">Step-by-step instructions on how to apply:</div>

                    <div class="steps">
                        <div class="step">
                            <div class="icon">✉</div>
                            <div class="step-title">01. Request an invitation</div>
                            <div class="step-text">by submitting the application form below.</div>
                        </div>

                        <div class="step">
                            <div class="icon">🔍</div>
                            <div class="step-title">02. Review and CEO screening.</div>
                        </div>

                        <div class="step">
                            <div class="icon">✔</div>
                            <div class="step-title">03. Board decision.</div>
                        </div>

                        <div class="step">
                            <div class="icon">👤</div>
                            <div class="step-title">04. Onboarding, member profile setup, and access to benefits.</div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-title">Application form:</div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="email">
                        </div>

                        <div class="form-group">
                            <label>Phone <span class="required">*</span></label>
                            <input type="text">
                        </div>

                        <div class="form-group">
                            <label>Company Name <span class="required">*</span></label>
                            <input type="text">
                        </div>

                        <div class="form-group">
                            <label>Contact Name <span class="required">*</span></label>
                            <input type="text">
                        </div>

                        <div class="form-group">
                            <label>Country <span class="required">*</span></label>
                            <input type="text">
                        </div>

                        <div class="form-group">
                            <label>Address <span class="required">*</span></label>
                            <input type="text">
                        </div>

                        <div class="form-group">
                            <label>Organization Type <span class="required">*</span></label>
                            <select>
                                <option></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Website <span class="required">*</span></label>
                            <input type="text">
                        </div>

                        <div class="form-group full">
                            <label>Message</label>
                            <textarea></textarea>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection