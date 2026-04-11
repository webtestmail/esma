@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection



@section('content')
<section class="inner-banner membership-inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="{{ asset($page->page_image ?? '') }}" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb wow fadeInUp">
                <li><a href="{{ route('home') }}">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-three-arrow"></use>
                </svg>
                <li>{{ $page->page_headline ?? 'Membership'}}</li>
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


    @php
     $section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(63);
    @endphp

@if($section_one)
<section class="py-100 about-section-1 membership-page" id="nextSection">
    <div class="container ">
        <div class="membership-container">
            

            <div class="membership-heading mb-5 mb-lg-3 pb-4 pb-lg-0 text-center text-lg-start">
                <div class="row align-items-end mb-5">
                    <div class="col-md-12 col-lg-5">
                        <span class="section-tag">{{ $section_one->section_title }}</span>
                        <div class="heading-48 text-white mb-4 mb-lg-0">{{ $section_one->section_headline }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 offset-lg-1">
                        {!! html_entity_decode($section_one->description) !!}
                    </div>
                </div>
            </div>


            
            @php
            $subs = $section_one->sub_sections;
            $first  = $subs->get(0);
            $second = $subs->get(1);
            $third = $subs->get(2);
            $fourth = $subs->get(3);
            $fifth = $subs->get(4);
            $sixth = $subs->get(5);
            $seventh = $subs->get(6);
            $eight = $subs->get(7);

           @endphp
           @if($section_one->sub_sections)
            <div class="benefit-row align-items-stretch">

                <div class="outer-side outer-label arrow-h d-flex d-lg-none">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                    <span class="side-label"> Keep scrolling to know the benefits</span>
                </div>

                <div class="outer-side d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                </div>


                @if($first)
                <div class="col-card">
                    <div class="membership-box">
                        <div class="membership-flex">
                            <img src="{{ asset($first->section_image) }}" alt="">
                            <p class="m-0 heading-26">{{ $first->section_title }}</p>
                        </div>
                         {!! html_entity_decode($first->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                </div>

                @if($second)
                <div class="col-card">
                    <div class="membership-box">
                        <div class="membership-flex">
                            <img src="{{ asset($second->section_image) }}" alt="">
                            <p class="m-0 heading-26">{{ $second->section_title }}</p>
                        </div>
                        {!! html_entity_decode($second->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side arrow-h d-none d-lg-flex ">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                </div>

            </div>
        

            <div class="benefit-row align-items-stretch">

                <div class="outer-side outer-label arrow-h d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                    <span class="side-label"> Keep scrolling to know the benefits</span>
                </div>

                @if($third)
                <div class="col-card">
                    <div class="membership-box">
                        <div class="membership-flex">
                            <img src="{{ $third->section_image ?? '' }}" alt="">
                            <p class="m-0 heading-26">{{ $third->section_title ?? '' }}</p>
                        </div>
                    {!! html_entity_decode($third->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side arrow-l d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-arrow-right-large"></use>
                    </svg>
                </div>

                @if($fourth)
                <div class="col-card">
                    <div class="membership-box">
                        <div class="membership-flex">
                            <img src="{{ $fourth->section_image ?? '' }}" alt="">
                            <p class="m-0 heading-26">{{ $fourth->section_title ?? '' }}</p>
                        </div>
                       {!! html_entity_decode($fourth->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side outer-label arrow-h d-flex d-lg-none py-5">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-arrow-right-large"></use>
                    </svg>
                    <span class="side-label"> Keep scrolling to know the benefits</span>
                </div>

            </div>

            <div class="benefit-row align-items-stretch">

                @if($fifth)
                <div class="col-card">
                    <div class="membership-box-2">
                        <div class="membership-flex-2">
                            <img src="{{ $fifth->section_image ?? ''}}" alt="">
                            <p class="m-0 heading-26">{{ $fifth->section_title ?? '' }}</p>
                        </div>
                       {!! html_entity_decode($fifth->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                </div>

                @if($sixth)
                <div class="col-card">
                    <div class="membership-box-2">
                        <div class="membership-flex-2">
                            <img src="{{ $sixth->section_image ?? '' }}" alt="{{ $sixth->section_title ?? '' }}">
                            <p class="m-0 heading-26">{{ $sixth->section_title ?? '' }}</p>
                        </div>
                     {!! html_entity_decode($sixth->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side arrow-h d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                </div>

            </div>

            <div class="benefit-row align-items-stretch" style="margin-bottom:0;">

                <div class="outer-side outer-label arrow-h d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                    <span class="side-label"> Keep scrolling to know the benefits</span>
                </div>


                @if($seventh)
                <div class="col-card">
                    <div class="membership-box-2">
                        <div class="membership-flex-2">
                            <img src="{{ $seventh->section_image ?? '' }}" alt="{{ $seventh->section_title ?? '' }}">
                            <p class="m-0 heading-26">{{ $seventh->section_title ?? '' }}</p>
                        </div>
                        {!! html_entity_decode($seventh->section_subtitle) !!}
                    </div>
                </div>
                @endif

                <div class="outer-side arrow-l d-none d-lg-flex">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                </div>

                @if($eight)
                <div class="col-card">
                    <div class="membership-box-2">
                        <div class="membership-flex-2">
                            <img src="{{ $eight->section_image ?? '' }}" alt="{{ $eight->section_title ?? '' }}">
                            <p class="m-0 heading-26">{{ $eight->section_title ?? '' }}</p>
                        </div>
                       {!! html_entity_decode($eight->section_subtitle) !!}
                    </div>
                </div>
               @endif 

                <div class="outer-side outer-label arrow-h d-flex d-lg-none pt-5">
                    <svg class="svg-icon">
                        <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                    </svg>
                    <span class="side-label"> Continue scrolling to see how to join. </span>
                </div>

            </div>
            @endif
        </div>
    </div>
</section>
@endif


@include('components.membership_brands')

            @php
                $section_two = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(72);
            @endphp
<section class="py-100 memebership-join-sec rounded-corners-sec"
    style="background-image: url({{ asset($section_two->section_image ?? '') }}); background-size: cover;">
    <div class="rounded-corners-sec corner-sec-2 membership-corner"></div>
    <div class="container">
        <div class="membership-join-container">
            
            @if($section_two)
            <div class="text-center mb-5 join-heading">
                <div class="section-tag">{{ $section_two->section_title ?? ''  }}</div>
                <div class="heading-48 w-75 mx-auto my-3"> {{ $section_two->section_headline ?? '' }}</div>
                {!! html_entity_decode($section_two->description) !!}
            </div>
            @endif
            <div class="row">

                @php
                $section_three = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(73);
                 @endphp
                 @if($section_three)
                <div class="step-flow">
                    <div class="steps-count">
                        <div>
                            <span>Step 01</span>
                            <p class="m-0">{{ $section_three->section_title ?? '' }}</p>
                        </div>
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                        </svg>
                    </div>
                    @if($section_three->sub_sections)
                    <div class="steps-content">
                        <div class="row mobilejoinSlider">
                            @foreach($section_three->sub_sections->take(2) as $section)
                            <div class="col-lg-6 mb-3">
                                <div class="join-card">
                                    <div class="join-icon"><img src="{{ asset($section->section_image) ?? '' }}" alt=""></div>
                                    <div class="join-title">{{ $section->section_title ?? ''}}</div>
                                   {!! html_entity_decode($section->section_subtitle ?? '') !!}
                                </div>
                            </div>
                            @endforeach
                       

                         @foreach($section_three->sub_sections->skip(2) as $section)
                            <div class="col-lg-4">
                                <div class="join-card">
                                    <div class="join-icon"><img src="{{ asset($section->section_image ?? '') }}" alt=""></div>
                                    <div class="join-title">{{ $section->section_title ?? '' }}</div>
                                    {!! html_entity_decode($section->section_subtitle ?? '') !!}
                                </div>
                            </div>
                         @endforeach
                          
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                <!-- Mobile arrow  -->
                <svg class="d-lg-none step-out-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                </svg>


                   @php
                        $section_four = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(79);
                    @endphp
                    @if($section_four)
                <div class="step-flow">
                    <div class="steps-count">
                        <div>
                            <span>Step 02</span>
                            <p class="m-0">{{ $section_four->section_title ?? ''}}</p>
                        </div>
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                        </svg>
                    </div>
                    @if($section_four->sub_sections)
                    <div class="steps-content ">
                        <div class="row mobilejoinSlider">
                            @foreach($section_four->sub_sections as $section)
                            <div class="col-lg-4">
                                <div class="join-card card-two">
                                    <div class="join-icon"><img src="{{ asset($section->section_image ?? '')}}" alt=""></div>
                                    <div class="join-title">{{ $section->section_title ?? '' }}</div>
                                    {!! $section->section_subtitle ?? '' !!}
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                <!-- Mobile arrow  -->
                <svg class="d-lg-none step-out-arrow">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                </svg>


                    @php
                        $section_five = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(83);
                    @endphp

                @if($section_five)
                <div class="step-flow">
                    <div class="steps-count">
                        <div>
                            <span>Step 03</span>
                            <p class="m-0">{{ $section_five->section_title ?? '' }}</p>
                        </div>
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-arrow-right-large"></use>
                        </svg>
                    </div>
                    @if($section_five->sub_sections)
                    <div class="steps-content">
                        <div class="row mobilejoinSlider">
                            @foreach($section_five->sub_sections as $key => $section)
                            <div class="col-lg-3">
                                <div class="join-card card-three">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="join-icon"><img src="{{ asset($section->section_image ?? '') }}" alt=""></div>
                                        <div class="line"></div>
                                        <div class="join-title">0{{ $key + 1 }}</div>
                                    </div>
                                    <p>{{ $section->section_title ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                <!-- Mobile arrow  -->
                <svg class="d-lg-none step-out-arrow">
                    <use href="images/icons/icons-sprite.svg#icon-arrow-right-large"></use>
                </svg>

                <div class="step-flow">
                    <div class="steps-count">
                        <div>
                            <span>Step 04</span>
                            <p class="m-0">Fill out the application form</p>
                        </div>
                        <svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-arrow-right-large"></use>
                        </svg>
                    </div>
                    <div class="steps-content">
                        <div class="join-form">
                            <form id="membershipForm" method="POST" action="javascript:void(0);">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Email <span>*</span></label>
                                        <input type="text" name="email" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Phone <span>*</span></label>
                                        <input type="tel" name="phone" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Company Name <span>*</span></label>
                                        <input type="text" name="company_name" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Contact Name <span>*</span></label>
                                        <input type="text" name="contact_name" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Country <span>*</span></label>
                                        <input type="text" name="country" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Address <span>*</span></label>
                                        <input type="text" name="address" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                    <div class="form-group">
                                        <label>Organization Type <span>*</span></label>
                                        <div class="select-box">
                                        <select name="organization_type" required>
                                            <option value="" selected></option>
                                            <option value="ngo">NGO</option>
                                            <option value="company">Company</option>
                                            <option value="startup">Startup</option>
                                            <option value="government">Government</option>
                                            <option value="educational">Educational Institution</option>
                                            <option value="nonprofit">Non-Profit</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                    </div>
                                </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Website <span>*</span></label>
                                        <input type="url" name="website" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Message </label>
                                        <textarea name="message" id=""></textarea>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- CHECKBOX -->
                                <div class="infos">
                                    <label class="filter-checkbox d-flex align-items-center gap-2 mb-2">
                                        <input type="checkbox" name="category[]" value="associates">
                                        <span class="label-text">I have read and understood the application
                                            rules.</span>
                                    </label>
                                    <label class="filter-checkbox d-flex align-items-center gap-2 mb-2">
                                        <input type="checkbox" name="category[]" value="associates>
                                        <span class="label-text">I have read and accept the terms of use and privacy
                                            policies of the ESMA International Network website.</span>
                                    </label>
                                    <label class="filter-checkbox d-flex align-items-center gap-2 ">
                                        <input type="checkbox" name="category[]" value="associates>
                                        <span class="label-text">Occasionally I would like to receive updates directly
                                            to my email (sign up for the newsletter).</span>
                                    </label>
                                </div>
                                <hr class="my-4">
                                <div class="button-row">
                                    <a href="#" class="btn-style-5"> <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-captcha"></use>
                                        </svg> Click to verify</a>
                                    <button type="submit" class="btn-style-4"> <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-plane"></use>
                                        </svg> Register Interest</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-100 about-section-1 rounded-0">
    <div class="container">
        <div class="row align-items-end mb-5 text-center text-lg-start">
            <div class="col-md-12 col-lg-5 mb-3 mb-lg-0">
                <span class="section-tag">Member Voices & Results</span>
                <div class="heading-48 text-white">Real Trust, Real Visibility, Real Opportunities</div>
            </div>
            <div class="col-md-12 col-lg-6 offset-lg-1">
                <p class="m-0">ESMA members consistently report stronger credibility in the market, sharper
                    visibility with the right partners, and deeper insight—especially through events and seminars.
                </p>
            </div>
        </div>
        <div class="row align-items-center">

            <div class="col-lg-12">
                <div class="testimonial-slider row">
                    <div class="col-lg-6">
                        <div class="testimonial-card text-white">
                            <div class="test-star">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                            </div>
                            <span class="test-name">A.G. Barr p.l.c.</span>
                            <p>Partnering with this team was the best decision we made. Their innovative
                                approach
                                transformed our business operations and boosted our efficiency by 40%.</p>
                            <hr>
                            <div class="test-flex">
                                <img src="images/t-1.webp" alt="">
                                <div>
                                    <span class="fw-semibold">Gavan Morris</span>
                                    <p class="m-0">International Business Unit Director</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-card text-white">
                            <div class="test-star">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                            </div>
                            <span class="test-name">Consivo Group AB</span>
                            <p>Partnering with this team was the best decision we made. Their innovative
                                approach
                                transformed our business operations and boosted our efficiency by 40%.</p>
                            <hr>
                            <div class="test-flex">
                                <img src="images/t-2.webp" alt="">
                                <div>
                                    <span class="fw-semibold">Niklas Eriksson</span>
                                    <p class="m-0">COO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-card text-white ">
                            <div class="test-star">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-star"></use>
                                </svg>
                            </div>
                            <span class="test-name">A.G. Barr p.l.c.</span>
                            <p>Partnering with this team was the best decision we made. Their innovative
                                approach
                                transformed our business operations and boosted our efficiency by 40%.</p>
                            <hr>
                            <div class="test-flex">
                                <img src="images/t-1.webp" alt="">
                                <div>
                                    <span class="fw-semibold">Gavan Morris</span>
                                    <p class="m-0">International Business Unit Director</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="help-center-sec py-100 rounded-corners-sec help-corner" id="nextSection">
    <div class="rounded-corners-sec corner-sec-2 "></div>
    <div class="container">
        <div class="col-md-12 col-lg-9 mx-auto">
            <div class="text-center mb-5 membership-faq-heading">
                <span class="section-tag" style="color: var(--primary-400);">Frequently Asked Questions</span>
                <div class="heading-48 my-2">Quick Answers About Membership</div>
                <p>If your question isn’t covered here, please contact us. We’re happy to help.</p>
            </div>
            <div class="accordion members-accordion acc-outer" id="membershipAccordion">
                <!-- Most Frequent -->
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1">
                            <h6>Is ESMA membership really by invitation only?</h6>
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Yes. To begin, request an invitation via the application form. Eligible companies are
                                screened by
                                our
                                CEO and confirmed by a Board decision.</p>
                        </div>
                    </div>
                </div>

                <!-- Membership -->
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading2">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse2">
                            <h6>Lorem Ipsum Sit?</h6>
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

                <!-- About -->
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading3">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse3">
                            <h6>Do I need a recommendation from an existing member?</h6>
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum lorem ipsum</p>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading4">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse4">
                            <h6>What membership categories are available?</h6>
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

                <!-- Events -->
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading5">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse5">
                            <h6>How long does the review process take?</h6>
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading6">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse6">
                            <h6>What benefits can I access as a member?</h6>
                        </button>
                    </h2>
                    <div id="collapse6" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading7">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse7">
                            <h6>Is there a member directory?</h6>
                        </button>
                    </h2>
                    <div id="collapse7" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-diff-item">
                    <h2 class="accordion-header" id="heading8">
                        <button class="accordion-button accordion-diff collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse8">
                            <h6>Where can I meet other members?</h6>
                        </button>
                    </h2>
                    <div id="collapse8" class="accordion-collapse accordion-diff-collapse collapse"
                        data-bs-parent="#membershipAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
    $(document).ready(function() {
        // 1. Initialize Validation
        $("#membershipForm").validate({
            errorElement: 'span',
            errorClass: 'text-danger small',
            rules: {
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                },
                company_name: {
                    required: true
                },
                contact_name: {
                    required: true
                },
                country: {
                    required: true
                },
                address: {
                    required: true
                },
                organization_type: {
                    required: true
                },
                website: {
                    required: true
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            },

            // 2. This handles the actual submission
            submitHandler: function(form, event) {
                event.preventDefault(); // Stop the page from reloading

                // Show loading state on button
                const submitBtn = $(form).find('button[type="submit"]');
                submitBtn.prop('disabled', true).text('Processing...');

                // 3. AJAX Submission
                $.ajax({
                    url: "{{ route('application.submit') }}", // Replace with your actual route
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message ||
                                'Application submitted successfully!',
                            timer: 3000
                        }).then(() => {
                            window.location.reload(); // Or redirect
                        });
                    },
                    error: function(xhr) {
                        submitBtn.prop('disabled', false).text('Submit');

                        let errorText = "Something went wrong.";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorText = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorText
                        });
                    }
                });
            }
        });
    });
    </script>
@endpush