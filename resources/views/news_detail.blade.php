@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection



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
                <li>Resources Hub</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>News Announcements</li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>USA Food Export...</li>
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

                    {{-- <p>Back in late November 2023, <b> ESMA International Network, </b> Lifetime Member, Greg Seminara, who is
                        the
                        owner of Export Solutions along with the CEO and Co-Founder of the USA Food Export Group, Greg
                        set
                        about hosting his Inaugural USA Food Export Group Business Conference in the beautiful
                        surroundings
                        of Coral Gables, Miami, Florida.</p>
                    <p>USA Food Export Group is made up of 20 Manufacturer Members who are ranked as some of the Top
                        Manufacturers in the USA today. This Conference proved quite interesting as each member of the
                        USA
                        Food Export Group was allowed to invite “One of their Top Distributors” from across the Globe to
                        attend the Conference. What was unique about this Conference, it’s not every day you have the
                        privilege of meeting and connecting with Top Management from the Top Manufacturers across the
                        USA
                        and Top Distributors from across the globe, gathered together for 2 days of learning and
                        networking.
                    </p> --}}

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
                    {{-- <p>The ESMA, CEO was invited by Greg as his guest speakers for the event, the ESMA, CEO was
                        proud to represent the ESMA International Network Community at this amazing event where he
                        shared with his audience the Strength of our Membership supported with the significant
                        Global reach achieved by our Organisation over the past 7 years.</p>
                    <p>The ESMA, CEO was delighted to learn - Three ESMA International Network Members were chosen
                        as Top Distributors for three USA Food Export Members:</p>
                    <ul>
                        <li>- Sun Maid invited Arvid Nordquist, Sweden </li>
                        <li>- Idahoan invited Euro Food Brands, UK and</li>
                        <li>- Church & Dwight invited. Transmed Turkey</li>
                    </ul>
                    <br>

                    <p>What was also pleasing for the ESMA, CEO was to connect with all USA Food Export Members and
                        their group of Distributors from Countries like India, Argentina, Brazil, Costa Rica,
                        Colombia, Ecuador, Panama, Urugay and Dominican Republic. Countries where the ESMA
                        International Network Organisation has no representation at this moment in time.</p>

                    <p>In closing with a Montage of photographs captured over the course of the event. I would like
                        to Congratulate Greg on an Excellent Event where great memories were captured, great
                        connections and friendships were created and finally on behalf of the Members of the ESMA
                        International Network, we look forward to building Strong Relationships with the USA Food
                        Export Group into the future.</p>

                    <blockquote>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor mi in nunc blandit
                        vulputate. Aenean aliquam sollicitudin posuere. Cras elit eros, luctus in iaculis vel,
                        sagittis in dui. Suspendisse mattis arcu ut libero bibendum faucibus a dapibus ante. Vivamus
                        mattis venenatis nunc, et dictum sapien
                    </blockquote>


                    <h2>Lorem Ipsum - Title-h2</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor mi in nunc blandit
                        vulputate. Aenean aliquam sollicitudin posuere. Cras elit eros, luctus in iaculis vel, sagittis
                        in
                        dui. Suspendisse mattis arcu ut libero bibendum faucibus a dapibus ante. Vivamus mattis
                        venenatis
                        nunc, et dictum sapien. Morbi nec leo at lectus consectetur aliquam. Donec in commodo nibh.</p>

                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Donec
                        eleifend neque venenatis dapibus porttitor. Integer vel vehicula velit. Etiam consequat molestie
                        eros, vel pharetra est gravida sed.</p> --}}

                    @if(isset($news->image1))
                    <div class="wow fadeInUp detail-img mb-3 ">
                        <img src="{{ asset($news->image1 ?? '') }}" alt="" class="img-fluid rounded">
                    </div>
                    @endif

                      {!! html_entity_decode($news->description ?? '') !!}

                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor mi in nunc blandit
                        vulputate. Aenean aliquam sollicitudin posuere. Cras elit eros, luctus in iaculis vel, sagittis
                        in
                        dui. Suspendisse mattis arcu ut libero bibendum faucibus a dapibus ante. Vivamus mattis
                        venenatis
                        nunc, et dictum sapien. Morbi nec leo at lectus consectetur aliquam. Donec in commodo nibh.</p>

                    <h3>Lorem Ipsum - Title-h3</h3>

                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae, repudiandae voluptates sequi ut,
                        quo voluptas expedita et debitis iure necessitatibus, consequatur quas. Perspiciatis ea modi
                        amet quasi quam facere at?</p>
                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Donec
                        eleifend neque venenatis dapibus porttitor. Integer vel vehicula velit. Etiam consequat molestie
                        eros, vel pharetra est gravida sed.</p>


                    <h4>Lorem Ipsum - Title-h4</h4>

                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae, repudiandae voluptates sequi ut,
                        quo voluptas expedita et debitis iure necessitatibus, consequatur quas. Perspiciatis ea modi
                        amet quasi quam facere at?</p> --}}

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

                    {{-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae, repudiandae voluptates sequi ut,
                        quo voluptas expedita et debitis iure necessitatibus, consequatur quas. Perspiciatis ea modi
                        amet quasi quam facere at?</p>

                    <h5>Lorem Ipsum - Title-h5</h5>

                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae, repudiandae voluptates sequi ut,
                        quo voluptas expedita et debitis iure necessitatibus, consequatur quas. Perspiciatis ea modi
                        amet quasi quam facere at?</p>

                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae, repudiandae voluptates sequi ut,
                        quo voluptas expedita et debitis iure necessitatibus, consequatur quas. Perspiciatis ea modi
                        amet quasi quam facere at?</p>

                    <h6>Lorem Ipsum - Title-h6</h6>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor mi in nunc blandit
                        vulputate. Aenean aliquam sollicitudin posuere. Cras elit eros, luctus in iaculis vel, sagittis
                        in
                        dui. Suspendisse mattis arcu ut libero bibendum faucibus a dapibus ante. Vivamus mattis
                        venenatis
                        nunc, et dictum sapien. Morbi nec leo at lectus consectetur aliquam. Donec in commodo nibh.</p>

                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Donec
                        eleifend neque venenatis dapibus porttitor. Integer vel vehicula velit. Etiam consequat molestie
                        eros, vel pharetra est gravida sed.</p> --}}

                    <!-- Attachment -->

                    <div class="news-detail-attachments mt-5">
                        <div class="heading-26 mb-3">Attachments</div>
                        <div class="report-card mb-3">
                            <div class="icon-box desk">
                                <svg class="svg-icon">
                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-globe"></use>
                                </svg>
                            </div>
                            <div class="report-text desk">{{ $news->website_name ?? ''}}</div>

                            <a href="{{ $news->webiste_url ?? '' }}" class="download-btn desk">
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
                                    <a href="#" class="download-btn mob">
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
                            <div class="report-text desk">Download Lorem Ipsum File</div>
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
                                    <div class="report-text-mob">Download Lorem Ipsum File
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
                    </div>

                    <!-- share -->
                <div class="news-detail-share mt-5 d-none d-lg-flex flex-wrap align-items-center gap-3 justify-content-between"
                    style="background-image: url(images/detail1.webp);">
                    <div class="share-overlay"></div>
                    <a href="" class="text-white share-news">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                        </svg>
                        Share This News
                    </a>
                    <ul class="share-news-icons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-pinterest"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-whatsapp"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i><svg class="svg-icon">
                                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter"></use>
                                    </svg></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
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
                            <input type="search" placeholder="What are you looking for?">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="news-tags">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-tag-stroke"></use>
                            </svg>
                            <p class="m-0 news-p">Categories</p>
                        </div>
                        <ul>
                            <li><a href="#">Category 01</a></li>
                            <li><a href="#">Category 02</a></li>
                            <li><a href="#">Category 03</a></li>
                            <li><a href="#">Category 04</a></li>
                            <li><a href="#">Category 05</a></li>
                        </ul>
                    </div>

                    <hr class="my-4">

                    <div class="news-recent">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#megaphone"></use>
                            </svg>
                            <p class="m-0 news-p">Recent News</p>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="images/image 24 (2).webp" alt="">
                                    </div>
                                    <div class="d-flex gap-1 resource-tag">
                                        <div class="category-style-1">Convention</div>
                                        <div class="category-style-1">Convention</div>
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
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
                                    <a href="">
                                        <h5>USA Food Export Group Business Conference</h5>
                                    </a>
                                    <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                        members
                                        who were
                                        exhibiting at the Angua Trade Fair…</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
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
                        <div class="col-lg-12">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="images/image 24.webp" alt="">
                                    </div>
                                    <div class="d-flex gap-1 resource-tag">
                                        <div class="category-style-1">Convention</div>
                                        <div class="category-style-1">Convention</div>
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
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
                                    <a href="">
                                        <h5>USA Food Export Group Business Conference</h5>
                                    </a>
                                    <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                        members
                                        who were
                                        exhibiting at the Angua Trade Fair…</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
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

            <!-- Mobile Recent SLider  -->
            <div class="col-lg-12 d-lg-none">
                <hr class="my-5">
                <div class="news-recent">
                    <div class="heading-26 mb-3">Recent News</div>

                    <div class="recent-news-slider">
                        <div class="col-lg-12">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="images/image 24 (2).webp" alt="">
                                    </div>
                                    <div class="d-flex gap-1 resource-tag">
                                        <div class="category-style-1">Convention</div>
                                        <div class="category-style-1">Convention</div>
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
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
                                    <a href="">
                                        <h5>USA Food Export Group Business Conference</h5>
                                    </a>
                                    <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                        members
                                        who were
                                        exhibiting at the Angua Trade Fair…</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
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
                        <div class="col-lg-12">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="images/image 24.webp" alt="">
                                    </div>
                                    <div class="d-flex gap-1 resource-tag">
                                        <div class="category-style-1">Convention</div>
                                        <div class="category-style-1">Convention</div>
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
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
                                    <a href="">
                                        <h5>USA Food Export Group Business Conference</h5>
                                    </a>
                                    <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                        members
                                        who were
                                        exhibiting at the Angua Trade Fair…</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
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
                        <div class="col-lg-12">
                            <div class="resource-box wow fadeInUp">
                                <div class="resource-img">
                                    <div class="re-img hover-img">
                                        <img src="images/image 24.webp" alt="">
                                    </div>
                                    <div class="d-flex gap-1 resource-tag">
                                        <div class="category-style-1">Convention</div>
                                        <div class="category-style-1">Convention</div>
                                    </div>
                                    <div class="share-wrap">
                                        <div class="c-share-1">
                                            <a href="#" class="events-share" data-index="3">
                                                <svg class="svg-icon">
                                                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-share"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="social-popup events-share-popup" data-index="3">
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
                                    <a href="">
                                        <h5>USA Food Export Group Business Conference</h5>
                                    </a>
                                    <p>Our ESMA International Network CEO, David O’ Neill enjoyed visiting our
                                        members
                                        who were
                                        exhibiting at the Angua Trade Fair…</p>
                                    <hr class="my-1">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <div class="date-1 resource-date">
                                            <svg class="svg-icon">
                                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-calender-check"></use>
                                            </svg>
                                            November 16, 2025
                                        </div>
                                        <a href="" class="resoure-links">
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