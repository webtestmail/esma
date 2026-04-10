@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection


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
                <li>Resources Hub</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="images/icons/icons-sprite.svg#icon-three-arrow"></use>
                </svg>
                <li>Reports</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="images/icons/icons-sprite.svg#icon-three-arrow"></use>
                </svg>
                <li>Report lorem ipsum...</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp">
                Report lorem ipsum dolor <br> sit amet, adiscpling elet
            </h1>
            <p>This is the page excerpt. Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit. Vivamus ac est
                fermentum, euismod placerat.</p>
            <div class="report-card border-0 reports-detail-card mb-0">
                <div class="icon-box desk">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                    </svg>
                </div>
                <div class="report-text desk">Report Lorem Ipsum 01
                </div>
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
                        <div class="report-text-mob">Report Lorem Ipsum 01</div>
                    </div>
                    <div class="mob-reportcard-info">
                        <a href="#" class="download-btn mob">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                </use>
                            </svg>
                            Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                </use>
                            </svg>
                        </a>
                    </div>

                </div>
                <!-- MObile shows end  -->
            </div>
        </div>
    </div>
</section>

<section class="reports-detail-pg bg-grey py-100 rounded-corners-sec" id="nextSection">
    <!-- this for design prupose  the rounded corners -->
    <div class="rounded-corners-sec corner-sec-2"></div>
    <div class="container">
        <div class="row">
            <div class=" col-md-12 col-lg-9">

                <div class=" reports-detail-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor mi in nunc blandit
                        vulputate. Aenean aliquam sollicitudin posuere. Cras elit eros, luctus in iaculis vel, sagittis
                        in dui. Suspendisse mattis arcu ut libero bibendum faucibus a dapibus ante. Vivamus mattis
                        venenatis nunc, et dictum sapien. Morbi nec leo at lectus consectetur aliquam. Donec in commodo
                        nibh.</p>

                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Donec eleifend neque venenatis dapibus porttitor. Integer vel vehicula velit. Etiam consequat
                        molestie eros, vel pharetra est gravida sed.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor mi in nunc blandit
                        vulputate. Aenean aliquam sollicitudin posuere. Cras elit eros, luctus in iaculis vel, sagittis
                        in dui. Suspendisse mattis arcu ut libero bibendum faucibus a dapibus ante. Vivamus mattis
                        venenatis nunc, et dictum sapien. Morbi nec leo at lectus consectetur aliquam. Donec in commodo
                        nibh.</p>

                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Donec eleifend neque venenatis dapibus porttitor. Integer vel vehicula velit. Etiam consequat
                        molestie eros, vel pharetra est gravida sed.</p>
                </div>

                <!-- Related Reports -->

                <div class="news-detail-attachments mt-5">
                    <div class="heading-26 mb-3">Related Reports</div>
                    <div class="report-card mb-3">
                        <div class="icon-box desk">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                            </svg>
                        </div>
                        <div class="report-text desk">Report Lorem Ipsum 01
                        </div>
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
                                <div class="report-text-mob">Report Lorem Ipsum 01</div>
                            </div>
                            <div class="mob-reportcard-info">
                                <div class="meta-info justify-content-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                            </use>
                                        </svg>
                                        <span>Jan, 2026</span>
                                    </div>
                                    <span class="size">550kb</span>
                                    <span class="pdf-pill">.pdf</span>
                                </div>
                                <div class="line my-3"></div>
                                <a href="#" class="download-btn mob">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                        </use>
                                    </svg>
                                    Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                        </use>
                                    </svg>
                                </a>
                            </div>

                        </div>
                        <!-- MObile shows end  -->
                    </div>
                     <div class="report-card mb-3">
                        <div class="icon-box desk">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                            </svg>
                        </div>
                        <div class="report-text desk">Report Lorem Ipsum 01
                        </div>
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
                                <div class="report-text-mob">Report Lorem Ipsum 01</div>
                            </div>
                            <div class="mob-reportcard-info">
                                <div class="meta-info justify-content-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-calender-check">
                                            </use>
                                        </svg>
                                        <span>Jan, 2026</span>
                                    </div>
                                    <span class="size">550kb</span>
                                    <span class="pdf-pill">.pdf</span>
                                </div>
                                <div class="line my-3"></div>
                                <a href="#" class="download-btn mob">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                        </use>
                                    </svg>
                                    Download <svg class="svg-icon arrow-svg arrow-rotate ms-auto">
                                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                        </use>
                                    </svg>
                                </a>
                            </div>

                        </div>
                        <!-- MObile shows end  -->
                    </div>
                </div>

                <!-- share -->
                <div class="news-detail-share mt-5 d-none d-lg-flex flex-wrap gap-3 justify-content-between" style="background-image: url(images/detail1.webp);">
                    <div class="share-overlay"></div>
                    <a href="" class="text-white share-news">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-share"></use>
                        </svg>
                        Share This News
                    </a>
                    <ul class="share-news-icons">
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
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="bi bi-pinterest"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="bi bi-envelope"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="bi bi-link-45deg"></i>
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="mt-5 news-detail-post">
                    <h4 class="heading-26 mb-3">Post Meta</h4>
                    <div class="post-meta">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                        </svg>
                        <span><b>Publication date:</b>Jan, 2025</span>
                    </div>
                    <div class="post-meta">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                        </svg>
                        <span><b>Categories:</b>Category 01, Category 02</span>
                    </div>
                    <div class="post-meta">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                        </svg>
                        <span><b>Tags:</b>Tag 01, Tag 02, Tag 03, Tag 04, Tag 05, Tag 06, Tag 07</span>
                    </div>
                    <div class="post-meta">
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-user-plus"></use>
                        </svg>
                        <span><b>Published by</b>John Doe</span>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 d-none d-lg-block">

                <div class="news-hub-sidebar news-detail-sidebar">

                    <div class="news-search">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-search"></use>
                            </svg>
                            <p class="m-0 news-p">Search Reports</p>
                        </div>
                        <div class="filter-search mb-2">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-search"></use>
                            </svg>
                            <input type="search" placeholder="Search by name or date">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Report Categories</p>
                        </div>
                        <ul>
                            <li><a href="#">Report Category 01</a></li>
                            <li><a href="#">Report Category 02</a></li>
                            <li><a href="#">Report Category 03</a></li>
                            <li><a href="#">Report Category 04</a></li>
                            <li><a href="#">Report Category 05</a></li>
                        </ul>
                    </div>

                    <hr class="my-4">

                    <div class="news-reports-years">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                            </svg>
                            <p class="m-0 news-p">Reports Years</p>
                        </div>

                        <div class="years-grid">

                            <a href="#" class="year-btn">2026</a>
                            <a href="#" class="year-btn">2025</a>
                            <a href="#" class="year-btn">2024</a>
                            <a href="#" class="year-btn">2023</a>

                            <a href="#" class="year-btn">2022</a>
                            <a href="#" class="year-btn">2021</a>
                            <a href="#" class="year-btn">2020</a>
                            <a href="#" class="year-btn">2019</a>

                            <a href="#" class="year-btn">2018</a>
                            <a href="#" class="year-btn">2017</a>
                            <a href="#" class="year-btn">2016</a>

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
                                <img src="images/journal-blue.png" alt="" class="py-3">
                                <p class="m-0">Subscribe to receive handpicked luxury listings, exclusive previews, and
                                    market insights — all delivered straight to your inbox. Stay effortlessly connected
                                    to the finest properties, tailored to your taste.</p>
                                <form class="pt-3">
                                    <input type="email" placeholder="Enter your email">
                                    <button type="submit" class="btn-style-2 mt-2 w-100">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
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