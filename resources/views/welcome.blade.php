@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
 




 
<section class="hero-section">
    <video autoplay muted loop playsinline class="hero-bg-video">
        <source src="./images/banner-video.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7">
                    <h1 class="hero-heading wow fadeInUp">Networking <br><span>At Its Best</span></h1>
                    <p class="hero-paragraph wow fadeInUp d-lg-none" data-wow-delay="0.3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Promoting the
                        discussion of building
                        brands between manufacturers and
                        distributors across the Globe.</p>

                    <a href="#" class="btn-style-2 my-3 d-lg-none">
                        <i class="bi bi-chat-dots"></i> Member Directory <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="hero-counter wow fadeInUp" data-wow-delay="0.2s">
                        <div class="hero-count-box">
                            <span class="counter" data-target="178">0</span> <span class="counter-plus"> + </span>
                            <p class="m-0">We boasts more than 178 experienced and trustworthy members.</p>
                        </div>
                        <div class="hero-count-box">
                            <span class="counter" data-target="60">0</span> <span class="counter-plus"> + </span>
                            <p class="m-0">We are across 62 <br> countries in Europe and Internationally.</p>
                        </div>
                    </div>
                </div>
                <div style="padding: 48px 0 0;"></div>
                <div class="col-lg-6 col-lg-6 pe-lg-5 d-lg-block d-none">
                    <p class="hero-paragraph wow fadeInUp" data-wow-delay="0.3s">Promoting the discussion of building
                        brands between manufacturers and
                        distributors across the Globe.</p>
                    <div class="hero-video-1 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="web-img flex-shrink-0">
                            <img src="images/Frame 7.webp" alt="">
                        </div>
                        <div class="text">
                            <p class="hero-video-1-text">Watch our Intro Video</p>
                            <p>Prosperity through collaboration</p>
                        </div>
                        <div class="btn-play-primary">
                            <a data-bs-toggle="modal" data-bs-target="#heroVideoModal"><i
                                    class="bi bi-play-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-lg-5 d-lg-block d-none">
                    <div class="hero-event wow fadeInUp" data-wow-delay="0.5s">
                        <svg class="hero-event-card-shape" viewBox="0 0 580 412" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 41C0 18.3563 18.3563 0 41 0H443C465.644 0 484 18.3563 484 41V55C484 77.0914 501.909 95 524 95H539C561.644 95 580 113.356 580 136V371C580 393.644 561.644 412 539 412H41C18.3563 412 0 393.644 0 371V41Z"
                                fill="currentColor" />
                            <path
                                d="M41 0.5H443C465.368 0.5 483.5 18.6325 483.5 41V55C483.5 77.3675 501.632 95.5 524 95.5H539C561.368 95.5 579.5 113.632 579.5 136V371C579.5 393.368 561.368 411.5 539 411.5H41C18.6325 411.5 0.5 393.368 0.5 371V41C0.5 18.9818 18.0705 1.06791 39.9551 0.513672L41 0.5Z"
                                stroke="#FFF" stroke-opacity="0.3" />
                        </svg>
                        <div class="hero-event-content">
                            <div class="event-tag-secondary">Next Event</div>
                            <h3>48th ESMA Convention, London, UK</h3>
                            <p>We are therefore working to bring you a lineup of high-quality speakers and presentations
                                to
                                help us navigate, and thrive, in these unpredictable and chaotic times. </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="date-1">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-calender"></use>
                                    </svg>
                                    11th to 13th June '26
                                </div>
                                <a href="#" class="btn-style-2">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                    </svg> Read More <svg class="svg-icon arrow-svg">
                                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="arrow-secondary"><svg class="svg-icon arrow-svg">
                                    <use href="images/icons/icons-sprite.svg#icon-arrow-left"></use>
                                </svg></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-div mt-5 pt-3">
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
</section>

<!--Hero video Modal -->
<!-- Modal -->
<div class="modal fade videoModal" id="heroVideoModal" tabindex="-1" aria-labelledby="heroVideoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
                    class="svg-icon arrow-svg">
                    <use href="images/icons/icons-sprite.svg#icon-cross"></use>
                </svg></button>
            <div class="modal-body">
                <iframe src="https://player.vimeo.com/video/735830063" width="100%" height="100%" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>

<section class="pb-100 about-section-1" id="nextSection">
    <div class="container py-100 px-1">
        <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 740px;">
            <h3 class="mb-3 section-title">A Worldwide Vision</h3>
            <p class="mx-auto section-para">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed eu ex a mi pellentesque pulvinar quis ac est.
            </p>
        </div>
        <div class="about-main-content position-relative">
            <div class="about-img-box hover-img wow fadeInUp" data-wow-delay="0.2s">
                <img src="images/ab-img.png" alt="">
            </div>
            <!-- On click - Video Play  -->
            <div class="btn-play-primary position-absolute top-50 start-50 translate-middle">
                <a data-bs-toggle="modal" data-bs-target="#aboutVideoModal"><i class="bi bi-play-fill"></i></a>
            </div>
            <div class="missio-box blur-card-bg wow fadeInUp" data-wow-delay="0.3s">
                <div class="mission-felx">
                    <div class="d-flex align-items-center">
                        <img src="images/__icon.svg" alt="" class="me-3">
                        <span>Vision</span>
                    </div>
                    <i class="bi bi-arrow-up-right"></i>
                </div>

                <p>A world leading distributor manufacturer organisation, ensuring our members gain a global
                    understanding of the value chain.</p>
            </div>
            <div class="missio-box blur-card-bg vision-box wow fadeInUp" data-wow-delay="0.4s">
                <div class="mission-felx">
                    <div class="d-flex align-items-center">
                        <img src="images/mission__icon.svg" alt="" class="me-3">
                        <span>Mission</span>
                    </div>
                    <i class="bi bi-arrow-up-right"></i>
                </div>
                <p>Stimulate the exchange of ideas, offer superior information and knowledge transfer. To represent
                    the
                    interests of our members</p>
            </div>
        </div>

    </div>
    <div class="container pb-100">
        <div class="row">
            <div class="col-lg-4 sm-order">
                <div class="members-left-home wow fadeInUp">
                    <span class="section-tag">Membership</span>
                    <h3 class="mb-3 section-title">Your Partner in Progress</h3>
                    <div class="members-box">
                        <div class="members-flex">
                            <img src="images/i-1.webp" alt="">
                            <p class="m-0">Endorsement That Matters</p>
                        </div>
                        <p>Every ESMA member is screened by our CEO and then endorsed by a board decision.</p>
                    </div>
                    <div class="members-box">
                        <div class="members-flex">
                            <img src="images/i-2.webp" alt="">
                            <p class="m-0">Promotion Where It Counts</p>
                        </div>
                        <p>Digital member profiles, networking events, conferences, newsletters, driving your
                            presence
                            and brand within your sector.</p>
                    </div>
                    <div class="members-box">
                        <div class="members-flex">
                            <img src="images/i-3.webp" alt="">
                            <p class="m-0">Insights For Tomorrow</p>
                        </div>
                        <p>We constantly aim to highlight new business opportunities, update our comprehensive
                            library
                            of business resources, and host seminars to share our deep market knowledge.</p>
                    </div>
                    <a href="#" class="btn-style-1 mt-4 mb-2">
                        <i class="bi bi-gem"></i> See More Benefits <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="member-right position-relative wow fadeInUp" data-wow-delay="0.2s">
                    <div class="members-img hover-img">
                        <img src="images/img-2.webp" alt="">
                    </div>
                    <div class="member-card text-white">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="images/mem-icon.png" alt="">
                            <p class="m-0" style="font-size: 26px;">Want to join ESMA International Network?</p>
                        </div>
                        <p>Membership in ESMA is open to all professional agents, distributors and manufacturers and
                            sales & marketing organisations that specialise in manufacturing or handling of packaged
                            consumer goods.</p>
                        <div class="d-flex align-items-center gap-3 mt-4 justify-content-between">
                            <a href="#" class="btn-style-1">
                                How To Join <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="#" class="btn-style-2">
                                Learn More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                @php
                    $testimonials = resolve(App\Http\Controllers\Admin\TestimonialsController::class)->getAllTestimonials();
                @endphp
   @if(isset($testimonials) && count($testimonials) > 0)
    <div class="container">
        <div class="testimonials-home">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <span class="section-tag">Membership</span>
                    <h3 class="mb-3 section-para wow fadeInUp">We boasts more than
                        178 experienced and trustworthy members.</h3>
                    <a href="#" class="btn-style-1 mt-2"> Members Directroy <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-arrow-right"></use>
                        </svg></a>
                </div>

                 
                <div class="col-lg-9">
                        @if(isset($testimonials) && count($testimonials) > 0)
                        <div class="testimonial-slider row">
                            @foreach($testimonials as $val)
                            <div class="col-lg-6">
                                <div class="testimonial-card text-white wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="test-star">
                                    @php
                                        $rating = (float) ($val->rating_quantity ?? 0); // e.g. 3.5, 4.0
                                        $fullStars = floor($rating);      // 3
                                        $hasHalf = ($rating - $fullStars) >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($hasHalf ? 1 : 0);
                                    @endphp

                                    {{-- Full stars --}}
                                    @for($i = 0; $i < $fullStars; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor

                                    {{-- Half star --}}
                                    @if($hasHalf)
                                        <i class="bi bi-star-half"></i>
                                    @endif

                                    {{-- Empty stars --}}
                                    @for($i = 0; $i < $emptyStars; $i++)
                                        <i class="bi bi-star"></i>
                                    @endfor
                                    </div>
                                    <span class="test-name">{{ $val->company_name ?? '' }}</span>
                                    <p>{!! html_entity_decode($val->description) !!}</p>
                                    <hr>
                                    <div class="test-flex">
                                        <img src="{{ asset($val->client_image) }}" alt="{{ $val->client_name ?? '' }}">
                                        <div>
                                            <span class="fw-semibold">{{ $val->client_name ?? '' }}</span>
                                            <p class="m-0">{{ $val->client_designation ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
     </div>
     @endif
</section>
<!--ABout video Modal -->
<!-- Modal -->
<div class="modal fade videoModal" id="aboutVideoModal" tabindex="-1" aria-labelledby="aboutVideoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
                    class="svg-icon arrow-svg">
                    <use href="images/icons/icons-sprite.svg#icon-cross"></use>
                </svg></button>
            <div class="modal-body">
                <iframe src="https://player.vimeo.com/video/735830063" width="100%" height="100%" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>

<section class="home-logos">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="home-logos-header">
                <div class="home-logo"><img src="images/l-1.png" alt=""></div>
                <div class="home-logo"><img src="images/l-2.png" alt=""></div>
                <div class="home-logo"><img src="images/l-3.png" alt=""></div>
                <div class="home-logo"><img src="images/l-4.png" alt=""></div>
                <div class="home-logo"><img src="images/l-7.png" alt=""></div>
                <div class="home-logo"><img src="images/l-8.png" alt=""></div>
                <div class="home-logo"><img src="images/l-9.png" alt=""></div>
                <div class="home-logo"><img src="images/l-10.png" alt=""></div>
                <div class="home-logo"><img src="images/l-11.png" alt=""></div>
                <div class="home-logo"><img src="images/l-5.png" alt=""></div>
                <div class="home-logo"><img src="images/l-6.png" alt=""></div>
                <div class="home-logo"><img src="images/l-4.png" alt=""></div>
                <div class="home-logo"><img src="images/l-7.png" alt=""></div>
                <div class="home-logo"><img src="images/l-8.png" alt=""></div>
                <div class="home-logo"><img src="images/l-9.png" alt=""></div>
            </div>
        </div>
    </div>
</section>

<section class="py-100 events-section-home"
    style="background-image: url(images/__bg__effect.png); background-size: cover;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h3 class="section-title wow fadeInUp">Upcoming Events</h3>
            <a href="events-hub.php" class="btn-style-3"> <i class="bi bi-calendar-check"></i> Go To Events Hub<i
                    class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row align-items-end">
            <div class="col-lg-3 wow fadeInUp d-lg-block d-none" data-wow-delay="0.2s">
                <!-- Year Navigation -->
                <div class="event-year-nav">
                    <button class="event-arrow prev custom-arrow-purple">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <p class="event-year"><b></b></p>

                    <button class="event-arrow next custom-arrow-purple">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                <div class=" events-list-home-slider">
                    <div data-year="2026">
                        <div class="events-lists-home">
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/Cover.webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/image 24 (1).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/Cover (1).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/Cover (2).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/image 24 (4).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-year="2027">
                        <div class="events-lists-home">
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/Cover.webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/image 24 (1).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/Cover (1).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/Cover (2).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                            <div class="events-list-hm">
                                <a href="" class="flex-shrink-0">
                                    <img src="images/image 24 (4).webp" alt="">
                                    <div>
                                        <span class="date">11th to 13th June ’26</span>
                                        <a href="" class="event-lits-a">48th ESMA Convention,London, UK</a>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.4s">
                <div class="events-main-home">
                    <div>
                        <div class="events-main-hm">
                            <div class="events-main-hm-img">
                                <div class="hover-img events-main-img">
                                    <img src="images/image 24.webp" class="" alt="">
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="speakers text-white">
                                    <span class="text-white">Speakers</span>
                                    <div class="d-flex align-items-center gap-5">
                                        <img src="images/__list.png" alt="">
                                        <span>+6</span>
                                    </div>
                                </div>
                            </div>
                            <div class="events-main-hm-text">
                                <a href="">
                                    <h4>48th ESMA Convention, London, UK</h4>
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula massa...
                                </p>
                                <div class="d-flex align-items-center justify-content-between w-100 mb-3">
                                    <div class="date-1">
                                        <i class="bi bi-calendar-check"></i>
                                        26th to 28th <br> January '26
                                    </div>
                                    <div class="date-1">
                                        <i class="bi bi-wallet2"></i>
                                        Free For ESMA Members
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="date-1">
                                        <i class="bi bi-geo-alt"></i>
                                        London, UK - <br>Lorem Ipsum Hotel
                                    </div>
                                    <a href="" class="btn-style-4">
                                        <i class="bi bi-chat-dots"></i> Read More <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="c-share-1">
                                    <a href="#" class="events-share" data-index="1">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="social-popup events-share-popup" data-index="1">
                                    <!-- WhatsApp -->
                                    <a class="social-icon si-whatsapp" href="https://wa.me/?text=Check this out!"
                                        target="_blank" title="WhatsApp" data-share="WhatsApp">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                        </svg>
                                    </a>
                                    <!-- LinkedIn -->
                                    <a class="social-icon si-linkedin"
                                        href="https://www.linkedin.com/sharing/share-offsite/?url=" target="_blank"
                                        title="LinkedIn" data-share="LinkedIn">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                        </svg>
                                    </a>
                                    <!-- Facebook -->
                                    <a class="social-icon si-facebook"
                                        href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                        title="Facebook" data-share="Facebook">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                        </svg>
                                    </a>
                                    <!-- Pinterest -->
                                    <a class="social-icon si-pinterest"
                                        href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                        title="Pinterest" data-share="Pinterest">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                        </svg>
                                    </a>
                                    <!-- X (Twitter) -->
                                    <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                        target="_blank" title="X / Twitter" data-share="Twitter">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                        </svg>
                                    </a>
                                    <!-- Instagram -->
                                    <a class="social-icon si-instagram" href="https://instagram.com" target="_blank"
                                        title="Instagram" data-share="Instagram">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                        </svg>
                                    </a>
                                    <!-- Email -->
                                    <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                        title="Email" data-share="Email">
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
                                    <hr class="block m-0 share-divider">
                                    <span style="color: var(--primary-300);" class="share-label">Share this</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="events-main-hm">
                            <div class="events-main-hm-img">
                                <div class="hover-img events-main-img">
                                    <img src="images/image 24.webp" class="" alt="">
                                    <div class="category-style-1">Convention</div>
                                </div>
                                <div class="speakers text-white">
                                    <span class="text-white">Speakers</span>
                                    <div class="d-flex align-items-center gap-5">
                                        <img src="images/__list.png" alt="">
                                        <span>+6</span>
                                    </div>
                                </div>
                            </div>
                            <div class="events-main-hm-text">
                                <a href="">
                                    <h4>48th ESMA Convention, London, UK</h4>
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula massa...
                                </p>
                                <div class="d-flex align-items-center justify-content-between w-100 mb-3">
                                    <div class="date-1">
                                        <i class="bi bi-calendar-check"></i>
                                        26th to 28th <br> January '26
                                    </div>
                                    <div class="date-1">
                                        <i class="bi bi-wallet2"></i>
                                        Free For ESMA Members
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="date-1">
                                        <i class="bi bi-geo-alt"></i>
                                        London, UK - <br>Lorem Ipsum Hotel
                                    </div>
                                    <a href="" class="btn-style-4">
                                        <i class="bi bi-chat-dots"></i> Read More <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="c-share-1">
                                    <a href="#" class="events-share" data-index="2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="social-popup events-share-popup" data-index="2">
                                    <!-- WhatsApp -->
                                    <a class="social-icon si-whatsapp" href="https://wa.me/?text=Check this out!"
                                        target="_blank" title="WhatsApp" data-share="WhatsApp">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                        </svg>
                                    </a>
                                    <!-- LinkedIn -->
                                    <a class="social-icon si-linkedin"
                                        href="https://www.linkedin.com/sharing/share-offsite/?url=" target="_blank"
                                        title="LinkedIn" data-share="LinkedIn">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                        </svg>
                                    </a>
                                    <!-- Facebook -->
                                    <a class="social-icon si-facebook"
                                        href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                        title="Facebook" data-share="Facebook">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                        </svg>
                                    </a>
                                    <!-- Pinterest -->
                                    <a class="social-icon si-pinterest"
                                        href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                        title="Pinterest" data-share="Pinterest">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                        </svg>
                                    </a>
                                    <!-- X (Twitter) -->
                                    <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                        target="_blank" title="X / Twitter" data-share="Twitter">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                        </svg>
                                    </a>
                                    <!-- Instagram -->
                                    <a class="social-icon si-instagram" href="https://instagram.com" target="_blank"
                                        title="Instagram" data-share="Instagram">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                        </svg>
                                    </a>
                                    <!-- Email -->
                                    <a class="social-icon si-email" href="mailto:?subject=Check this out&body="
                                        title="Email" data-share="Email">
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
                                    <hr class="block m-0 share-divider">
                                    <span style="color: var(--primary-300);" class="share-label">Share this</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-100 resource-home-sec">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-3 wow fadeInUp">
                    <h3 class="section-title">Resources Hub</h3>
                    <span id="resourceTabLabel" style="color: #808080;"> <i class="bi bi-chevron-right"></i> News</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="home-resource-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                                </svg> News</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg> Reports</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                </svg> Documents</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="update-tab" data-bs-toggle="tab"
                                data-bs-target="#update-tab-pane" type="button" role="tab"
                                aria-controls="update-tab-pane" aria-selected="false"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-update"></use>
                                </svg> Regulatory Updates</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content mt-5" id="myTabContent">

                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="resource-slider-wrapper">
                        <div class="row">
                            <div class="col-lg-4">
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
                                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="social-popup events-share-popup" data-index="3">
                                                <!-- WhatsApp -->
                                                <a class="social-icon si-whatsapp"
                                                    href="https://wa.me/?text=Check this out!" target="_blank"
                                                    title="WhatsApp" data-share="WhatsApp">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                                    </svg>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a class="social-icon si-linkedin"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                    target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                                    </svg>
                                                </a>
                                                <!-- Facebook -->
                                                <a class="social-icon si-facebook"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                    title="Facebook" data-share="Facebook">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                                <!-- Pinterest -->
                                                <a class="social-icon si-pinterest"
                                                    href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                    title="Pinterest" data-share="Pinterest">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                                <!-- X (Twitter) -->
                                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                    target="_blank" title="X / Twitter" data-share="Twitter">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                                    </svg>
                                                </a>
                                                <!-- Instagram -->
                                                <a class="social-icon si-instagram" href="https://instagram.com"
                                                    target="_blank" title="Instagram" data-share="Instagram">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                                    </svg>
                                                </a>
                                                <!-- Email -->
                                                <a class="social-icon si-email"
                                                    href="mailto:?subject=Check this out&body=" title="Email"
                                                    data-share="Email">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                                    </svg>
                                                </a>
                                                <!-- Copy Link -->
                                                <button class="social-icon si-copy" title="Copy Link"
                                                    data-share="Copy Link">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
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
                                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                                </svg>
                                                November 16, 2025
                                            </div>
                                            <a href="" class="resoure-links">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More <svg class="svg-icon arrow-svg">
                                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="social-popup events-share-popup" data-index="3">
                                                <!-- WhatsApp -->
                                                <a class="social-icon si-whatsapp"
                                                    href="https://wa.me/?text=Check this out!" target="_blank"
                                                    title="WhatsApp" data-share="WhatsApp">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                                    </svg>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a class="social-icon si-linkedin"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                    target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                                    </svg>
                                                </a>
                                                <!-- Facebook -->
                                                <a class="social-icon si-facebook"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                    title="Facebook" data-share="Facebook">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                                <!-- Pinterest -->
                                                <a class="social-icon si-pinterest"
                                                    href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                    title="Pinterest" data-share="Pinterest">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                                <!-- X (Twitter) -->
                                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                    target="_blank" title="X / Twitter" data-share="Twitter">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                                    </svg>
                                                </a>
                                                <!-- Instagram -->
                                                <a class="social-icon si-instagram" href="https://instagram.com"
                                                    target="_blank" title="Instagram" data-share="Instagram">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                                    </svg>
                                                </a>
                                                <!-- Email -->
                                                <a class="social-icon si-email"
                                                    href="mailto:?subject=Check this out&body=" title="Email"
                                                    data-share="Email">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                                    </svg>
                                                </a>
                                                <!-- Copy Link -->
                                                <button class="social-icon si-copy" title="Copy Link"
                                                    data-share="Copy Link">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
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
                                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                                </svg>
                                                November 16, 2025
                                            </div>
                                            <a href="" class="resoure-links">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More <svg class="svg-icon arrow-svg">
                                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="resource-box wow fadeInUp">
                                    <div class="resource-img">
                                        <div class="re-img hover-img">
                                            <img src="images/image 24 (3).webp" alt="">
                                        </div>
                                        <div class="d-flex gap-1 resource-tag">
                                            <div class="category-style-1">Convention</div>
                                            <div class="category-style-1">Convention</div>
                                        </div>
                                        <div class="share-wrap">
                                            <div class="c-share-1">
                                                <a href="#" class="events-share" data-index="3">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="social-popup events-share-popup" data-index="3">
                                                <!-- WhatsApp -->
                                                <a class="social-icon si-whatsapp"
                                                    href="https://wa.me/?text=Check this out!" target="_blank"
                                                    title="WhatsApp" data-share="WhatsApp">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                                    </svg>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a class="social-icon si-linkedin"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                    target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                                    </svg>
                                                </a>
                                                <!-- Facebook -->
                                                <a class="social-icon si-facebook"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                    title="Facebook" data-share="Facebook">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                                <!-- Pinterest -->
                                                <a class="social-icon si-pinterest"
                                                    href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                    title="Pinterest" data-share="Pinterest">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                                <!-- X (Twitter) -->
                                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                    target="_blank" title="X / Twitter" data-share="Twitter">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                                    </svg>
                                                </a>
                                                <!-- Instagram -->
                                                <a class="social-icon si-instagram" href="https://instagram.com"
                                                    target="_blank" title="Instagram" data-share="Instagram">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                                    </svg>
                                                </a>
                                                <!-- Email -->
                                                <a class="social-icon si-email"
                                                    href="mailto:?subject=Check this out&body=" title="Email"
                                                    data-share="Email">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                                    </svg>
                                                </a>
                                                <!-- Copy Link -->
                                                <button class="social-icon si-copy" title="Copy Link"
                                                    data-share="Copy Link">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
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
                                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                                </svg>
                                                November 16, 2025
                                            </div>
                                            <a href="" class="resoure-links">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More <svg class="svg-icon arrow-svg">
                                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="social-popup events-share-popup" data-index="3">
                                                <!-- WhatsApp -->
                                                <a class="social-icon si-whatsapp"
                                                    href="https://wa.me/?text=Check this out!" target="_blank"
                                                    title="WhatsApp" data-share="WhatsApp">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                                    </svg>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a class="social-icon si-linkedin"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                    target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                                    </svg>
                                                </a>
                                                <!-- Facebook -->
                                                <a class="social-icon si-facebook"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                    title="Facebook" data-share="Facebook">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                                <!-- Pinterest -->
                                                <a class="social-icon si-pinterest"
                                                    href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                    title="Pinterest" data-share="Pinterest">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                                <!-- X (Twitter) -->
                                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                    target="_blank" title="X / Twitter" data-share="Twitter">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                                    </svg>
                                                </a>
                                                <!-- Instagram -->
                                                <a class="social-icon si-instagram" href="https://instagram.com"
                                                    target="_blank" title="Instagram" data-share="Instagram">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                                    </svg>
                                                </a>
                                                <!-- Email -->
                                                <a class="social-icon si-email"
                                                    href="mailto:?subject=Check this out&body=" title="Email"
                                                    data-share="Email">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                                    </svg>
                                                </a>
                                                <!-- Copy Link -->
                                                <button class="social-icon si-copy" title="Copy Link"
                                                    data-share="Copy Link">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
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
                                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                                </svg>
                                                November 16, 2025
                                            </div>
                                            <a href="" class="resoure-links">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More <svg class="svg-icon arrow-svg">
                                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="social-popup events-share-popup" data-index="3">
                                                <!-- WhatsApp -->
                                                <a class="social-icon si-whatsapp"
                                                    href="https://wa.me/?text=Check this out!" target="_blank"
                                                    title="WhatsApp" data-share="WhatsApp">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                                    </svg>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a class="social-icon si-linkedin"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                    target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                                    </svg>
                                                </a>
                                                <!-- Facebook -->
                                                <a class="social-icon si-facebook"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                    title="Facebook" data-share="Facebook">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                                <!-- Pinterest -->
                                                <a class="social-icon si-pinterest"
                                                    href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                    title="Pinterest" data-share="Pinterest">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                                <!-- X (Twitter) -->
                                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                    target="_blank" title="X / Twitter" data-share="Twitter">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                                    </svg>
                                                </a>
                                                <!-- Instagram -->
                                                <a class="social-icon si-instagram" href="https://instagram.com"
                                                    target="_blank" title="Instagram" data-share="Instagram">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                                    </svg>
                                                </a>
                                                <!-- Email -->
                                                <a class="social-icon si-email"
                                                    href="mailto:?subject=Check this out&body=" title="Email"
                                                    data-share="Email">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                                    </svg>
                                                </a>
                                                <!-- Copy Link -->
                                                <button class="social-icon si-copy" title="Copy Link"
                                                    data-share="Copy Link">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
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
                                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                                </svg>
                                                November 16, 2025
                                            </div>
                                            <a href="" class="resoure-links">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More <svg class="svg-icon arrow-svg">
                                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
                                                    </use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="resource-box wow fadeInUp">
                                    <div class="resource-img">
                                        <div class="re-img hover-img">
                                            <img src="images/image 24 (3).webp" alt="">
                                        </div>
                                        <div class="d-flex gap-1 resource-tag">
                                            <div class="category-style-1">Convention</div>
                                            <div class="category-style-1">Convention</div>
                                        </div>
                                        <div class="share-wrap">
                                            <div class="c-share-1">
                                                <a href="#" class="events-share" data-index="3">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-share"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="social-popup events-share-popup" data-index="3">
                                                <!-- WhatsApp -->
                                                <a class="social-icon si-whatsapp"
                                                    href="https://wa.me/?text=Check this out!" target="_blank"
                                                    title="WhatsApp" data-share="WhatsApp">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-whatsapp"></use>
                                                    </svg>
                                                </a>
                                                <!-- LinkedIn -->
                                                <a class="social-icon si-linkedin"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                    target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-linkedin"></use>
                                                    </svg>
                                                </a>
                                                <!-- Facebook -->
                                                <a class="social-icon si-facebook"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"
                                                    title="Facebook" data-share="Facebook">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-facebook"></use>
                                                    </svg>
                                                </a>
                                                <!-- Pinterest -->
                                                <a class="social-icon si-pinterest"
                                                    href="https://pinterest.com/pin/create/button/?url=" target="_blank"
                                                    title="Pinterest" data-share="Pinterest">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-pinterest"></use>
                                                    </svg>
                                                </a>
                                                <!-- X (Twitter) -->
                                                <a class="social-icon si-x" href="https://twitter.com/intent/tweet?url="
                                                    target="_blank" title="X / Twitter" data-share="Twitter">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-xtwitter"></use>
                                                    </svg>
                                                </a>
                                                <!-- Instagram -->
                                                <a class="social-icon si-instagram" href="https://instagram.com"
                                                    target="_blank" title="Instagram" data-share="Instagram">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-instagram"></use>
                                                    </svg>
                                                </a>
                                                <!-- Email -->
                                                <a class="social-icon si-email"
                                                    href="mailto:?subject=Check this out&body=" title="Email"
                                                    data-share="Email">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-mail"></use>
                                                    </svg>
                                                </a>
                                                <!-- Copy Link -->
                                                <button class="social-icon si-copy" title="Copy Link"
                                                    data-share="Copy Link">
                                                    <svg class="svg-icon">
                                                        <use href="images/icons/icons-sprite.svg#icon-link"></use>
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
                                                    <use href="images/icons/icons-sprite.svg#icon-calender-check"></use>
                                                </svg>
                                                November 16, 2025
                                            </div>
                                            <a href="" class="resoure-links">
                                                <svg class="svg-icon">
                                                    <use href="images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More <svg class="svg-icon arrow-svg">
                                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right">
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
                            <button class="reg-prev"><svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                                </svg></button>
                            <div class="reg-dots"></div>
                            <button class="reg-next"><svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                </svg></button>
                        </div>
                        <hr class="w-50 me-auto">
                        <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-megaphone"></use>
                            </svg> Go To Our Blogs <svg class="svg-icon arrow-svg">
                                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                            </svg> </a>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="row m-0">
                        <!-- Report Item -->
                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>

                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>

                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>

                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>

                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>

                        <!-- Bottom Pagination -->
                        <div class="reports-bottom">
                            <div class="year-pagination">
                                <button class="circle-btn"><svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                                    </svg></button>
                                <span>2024</span>
                                <span class="active-year">2025</span>
                                <span>2026</span>
                                <button class="circle-btn"><svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                    </svg></button>
                            </div>

                            <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg> See all Reports <svg class="svg-icon arrow-svg">
                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                </svg> </a>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <div class="row m-0">
                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>
                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>
                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>
                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>
                        <div class="report-card">
                            <div class="icon-box">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                </svg>
                            </div>
                            <div class="report-text">Report lorem ipsum dolor sit amet, adipiscing elit</div>
                            <div class="meta-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jan, 2026</span>
                                <span class="size">550kb</span>
                                <span class="pdf-pill">.pdf</span>
                            </div>
                            <a href="#" class="download-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                </svg>
                                Download
                            </a>
                        </div>

                        <!-- Bottom Pagination -->
                        <div class="reports-bottom">
                            <div class="year-pagination">
                                <button class="circle-btn"><svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                                    </svg></button>
                                <span>2024</span>
                                <span class="active-year">2025</span>
                                <span>2026</span>
                                <button class="circle-btn"><svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                    </svg></button>
                            </div>

                            <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-piechart"></use>
                                </svg> See all Reports <svg class="svg-icon arrow-svg">
                                    <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                </svg> </a>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="update-tab-pane" role="tabpanel" aria-labelledby="update-tab"
                    tabindex="0">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-share">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- LinkedIn -->
                                                        <a class="social-icon si-linkedin"
                                                            href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                            target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Facebook -->
                                                        <a class="social-icon si-facebook"
                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                            target="_blank" title="Facebook" data-share="Facebook">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Pinterest -->
                                                        <a class="social-icon si-pinterest"
                                                            href="https://pinterest.com/pin/create/button/?url="
                                                            target="_blank" title="Pinterest" data-share="Pinterest">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-pinterest">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- X (Twitter) -->
                                                        <a class="social-icon si-x"
                                                            href="https://twitter.com/intent/tweet?url=" target="_blank"
                                                            title="X / Twitter" data-share="Twitter">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Instagram -->
                                                        <a class="social-icon si-instagram" href="https://instagram.com"
                                                            target="_blank" title="Instagram" data-share="Instagram">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-instagram">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Email -->
                                                        <a class="social-icon si-email"
                                                            href="mailto:?subject=Check this out&body=" title="Email"
                                                            data-share="Email">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-mail">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Copy Link -->
                                                        <button class="social-icon si-copy" title="Copy Link"
                                                            data-share="Copy Link">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-link">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <hr class="block m-0 share-divider">
                                                        <span style="color: var(--primary-300);"
                                                            class="share-label">Share this</span>
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
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-calender-check">
                                                            </use>
                                                        </svg>
                                                        November 16, 2025
                                                    </div>
                                                    <a href="" class="resoure-links">
                                                        <svg class="svg-icon">
                                                            <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                            </use>
                                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-short-arrow-right">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-share">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- LinkedIn -->
                                                        <a class="social-icon si-linkedin"
                                                            href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                            target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Facebook -->
                                                        <a class="social-icon si-facebook"
                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                            target="_blank" title="Facebook" data-share="Facebook">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Pinterest -->
                                                        <a class="social-icon si-pinterest"
                                                            href="https://pinterest.com/pin/create/button/?url="
                                                            target="_blank" title="Pinterest" data-share="Pinterest">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-pinterest">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- X (Twitter) -->
                                                        <a class="social-icon si-x"
                                                            href="https://twitter.com/intent/tweet?url=" target="_blank"
                                                            title="X / Twitter" data-share="Twitter">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Instagram -->
                                                        <a class="social-icon si-instagram" href="https://instagram.com"
                                                            target="_blank" title="Instagram" data-share="Instagram">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-instagram">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Email -->
                                                        <a class="social-icon si-email"
                                                            href="mailto:?subject=Check this out&body=" title="Email"
                                                            data-share="Email">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-mail">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Copy Link -->
                                                        <button class="social-icon si-copy" title="Copy Link"
                                                            data-share="Copy Link">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-link">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <hr class="block m-0 share-divider">
                                                        <span style="color: var(--primary-300);"
                                                            class="share-label">Share this</span>
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
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-calender-check">
                                                            </use>
                                                        </svg>
                                                        November 16, 2025
                                                    </div>
                                                    <a href="" class="resoure-links">
                                                        <svg class="svg-icon">
                                                            <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                            </use>
                                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-short-arrow-right">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-share">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- LinkedIn -->
                                                        <a class="social-icon si-linkedin"
                                                            href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                            target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Facebook -->
                                                        <a class="social-icon si-facebook"
                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                            target="_blank" title="Facebook" data-share="Facebook">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Pinterest -->
                                                        <a class="social-icon si-pinterest"
                                                            href="https://pinterest.com/pin/create/button/?url="
                                                            target="_blank" title="Pinterest" data-share="Pinterest">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-pinterest">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- X (Twitter) -->
                                                        <a class="social-icon si-x"
                                                            href="https://twitter.com/intent/tweet?url=" target="_blank"
                                                            title="X / Twitter" data-share="Twitter">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Instagram -->
                                                        <a class="social-icon si-instagram" href="https://instagram.com"
                                                            target="_blank" title="Instagram" data-share="Instagram">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-instagram">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Email -->
                                                        <a class="social-icon si-email"
                                                            href="mailto:?subject=Check this out&body=" title="Email"
                                                            data-share="Email">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-mail">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Copy Link -->
                                                        <button class="social-icon si-copy" title="Copy Link"
                                                            data-share="Copy Link">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-link">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <hr class="block m-0 share-divider">
                                                        <span style="color: var(--primary-300);"
                                                            class="share-label">Share this</span>
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
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-calender-check">
                                                            </use>
                                                        </svg>
                                                        November 16, 2025
                                                    </div>
                                                    <a href="" class="resoure-links">
                                                        <svg class="svg-icon">
                                                            <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                            </use>
                                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-short-arrow-right">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-share">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- LinkedIn -->
                                                        <a class="social-icon si-linkedin"
                                                            href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                            target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Facebook -->
                                                        <a class="social-icon si-facebook"
                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                            target="_blank" title="Facebook" data-share="Facebook">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Pinterest -->
                                                        <a class="social-icon si-pinterest"
                                                            href="https://pinterest.com/pin/create/button/?url="
                                                            target="_blank" title="Pinterest" data-share="Pinterest">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-pinterest">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- X (Twitter) -->
                                                        <a class="social-icon si-x"
                                                            href="https://twitter.com/intent/tweet?url=" target="_blank"
                                                            title="X / Twitter" data-share="Twitter">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Instagram -->
                                                        <a class="social-icon si-instagram" href="https://instagram.com"
                                                            target="_blank" title="Instagram" data-share="Instagram">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-instagram">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Email -->
                                                        <a class="social-icon si-email"
                                                            href="mailto:?subject=Check this out&body=" title="Email"
                                                            data-share="Email">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-mail">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Copy Link -->
                                                        <button class="social-icon si-copy" title="Copy Link"
                                                            data-share="Copy Link">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-link">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <hr class="block m-0 share-divider">
                                                        <span style="color: var(--primary-300);"
                                                            class="share-label">Share this</span>
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
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-calender-check">
                                                            </use>
                                                        </svg>
                                                        November 16, 2025
                                                    </div>
                                                    <a href="" class="resoure-links">
                                                        <svg class="svg-icon">
                                                            <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                            </use>
                                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-short-arrow-right">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-share">
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
                                                                <use href="images/icons/icons-sprite.svg#icon-whatsapp">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- LinkedIn -->
                                                        <a class="social-icon si-linkedin"
                                                            href="https://www.linkedin.com/sharing/share-offsite/?url="
                                                            target="_blank" title="LinkedIn" data-share="LinkedIn">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-linkedin">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Facebook -->
                                                        <a class="social-icon si-facebook"
                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                            target="_blank" title="Facebook" data-share="Facebook">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-facebook">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Pinterest -->
                                                        <a class="social-icon si-pinterest"
                                                            href="https://pinterest.com/pin/create/button/?url="
                                                            target="_blank" title="Pinterest" data-share="Pinterest">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-pinterest">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- X (Twitter) -->
                                                        <a class="social-icon si-x"
                                                            href="https://twitter.com/intent/tweet?url=" target="_blank"
                                                            title="X / Twitter" data-share="Twitter">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-xtwitter">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Instagram -->
                                                        <a class="social-icon si-instagram" href="https://instagram.com"
                                                            target="_blank" title="Instagram" data-share="Instagram">
                                                            <svg class="svg-icon">
                                                                <use
                                                                    href="images/icons/icons-sprite.svg#icon-instagram">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Email -->
                                                        <a class="social-icon si-email"
                                                            href="mailto:?subject=Check this out&body=" title="Email"
                                                            data-share="Email">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-mail">
                                                                </use>
                                                            </svg>
                                                        </a>
                                                        <!-- Copy Link -->
                                                        <button class="social-icon si-copy" title="Copy Link"
                                                            data-share="Copy Link">
                                                            <svg class="svg-icon">
                                                                <use href="images/icons/icons-sprite.svg#icon-link">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <hr class="block m-0 share-divider">
                                                        <span style="color: var(--primary-300);"
                                                            class="share-label">Share this</span>
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
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-calender-check">
                                                            </use>
                                                        </svg>
                                                        November 16, 2025
                                                    </div>
                                                    <a href="" class="resoure-links">
                                                        <svg class="svg-icon">
                                                            <use href="images/icons/icons-sprite.svg#icon-dotchat">
                                                            </use>
                                                        </svg> Read More <svg class="svg-icon arrow-svg">
                                                            <use
                                                                href="images/icons/icons-sprite.svg#icon-short-arrow-right">
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
                                    <button class="reg-prev"><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
                                        </svg></button>
                                    <div class="reg-dots"></div>
                                    <button class="reg-next"><svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
                                        </svg></button>
                                </div>
                                <hr class="w-50 me-auto">
                                <a href="events-hub.php" class="btn-style-3"> <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-docs"></use>
                                    </svg> Go To Our Blogs <svg class="svg-icon arrow-svg">
                                        <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                                    </svg> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const counters = document.querySelectorAll(".counter");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {

                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute("data-target");

                    let count = 0;
                    const speed = 500; // smaller = faster

                    const updateCount = () => {
                        const increment = target / speed;

                        if (count < target) {
                            count += increment;
                            counter.innerText = Math.ceil(count);
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target;
                        }
                    };

                    updateCount();
                    observer.unobserve(counter);
                }

            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            observer.observe(counter);
        });

    });
</script>




@endsection

@push('page-js')
 

@endpush
