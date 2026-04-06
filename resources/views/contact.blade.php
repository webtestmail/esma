@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
  <section class="inner-banner contact-inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video">
        <source src="{{ asset($page->page_image) }}" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content inner-contect-content text-white">
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

            <hr class="m-0"
                style=" background: linear-gradient(90deg, rgba(255, 228, 179, 0) 0%, rgba(255, 228, 179, 0.5) 50%, rgba(255, 228, 179, 0) 100%);">
            <ul
                class="list-unstyled d-flex align-items-start justify-content-center footer-contact-info gap-4 contact-pg-info">
                <li>
                    <a href="tel:+353874442121" class="d-flex gap-2 align-items-center">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-dotchat-rectangle"></use>
                        </svg> {{ $data['company']->phone ?? '' }}
                    </a>
                </li>
                <li>
                    <a href="mailto:{{ $data['contact']->email ?? '' }}" class="d-flex gap-2 align-items-center">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                        </svg> {{ $data['company']->email ?? '' }}
                    </a>
                </li>
                <li>
                    <a href="mailto:{{ $data['contact']->alternate_email ?? '' }}" class="d-flex gap-2 align-items-center">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                        </svg>{{ $data['company']->alternate_email ?? '' }}
                    </a>
                </li>
            </ul>
            <ul class="list-inline footer-social-icons">
                <li class="list-inline-item">
                    <a href="{{ $data['company']->linkedin_url ?? '' }}" target="_blank">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-linkedin"></use>
                        </svg>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ $data['company']->instagram_url ?? '' }}" target="_blank">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-instagram"></use>
                        </svg>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ $data['company']->facebook_url ?? '' }}" target="_blank">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-facebook"></use>
                        </svg>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ $data['company']->x_url ?? '' }}" target="_blank">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-xtwitter"></use>
                        </svg>
                    </a>
                </li>
            </ul>
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

<section class="pg-contact bg-white rounded-corners-sec" id="nextSection">
    <!-- this for design prupose  the rounded corners -->
    <div class="rounded-corners-sec corner-sec-2"></div>
    <div class="container contact-container">
        <div class="row contact-row">
            <div class="col-lg-6 col-sm-12 map contact-map order-2 order-lg-1">
                <div class="map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d76323.6828514371!2d-6.764030575181483!3d53.28747338912581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48677be3abb6a709%3A0xa00c7a99731ef90!2sClane%2C%20Co.%20Kildare%2C%20Ireland!5e0!3m2!1sen!2sin!4v1772447239823!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 16 16">-->
                    <!--      <path fill="#54BED1" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>-->
                    <!--      <circle cx="8" cy="6" r="2.5" fill="white"/>-->
                    <!--    </svg>-->
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 p-lg-5 pe-lg-0 order-1 order-lg-2 contact-form-outer">
                <div class="d-lg-none mt-5 pt-5 mb-4 text-center">
                    <div class="small-icon-desing-1">
                        <svg class="svg-icon">
                            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-mail"></use>
                        </svg>
                    </div>
                    <h4 class="heading-40">Contact</h4>
                    <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Curabi tur acc umsan, odio ac ornare
                        aliquet, velit est posuere nisl, vel hendrerit leo.</p>
                </div>

                   @if(session('verified'))
                        <div class="alert alert-success">Email verified! You can now submit.</div>
                    @endif
                    @if($errors->has('verify'))
                        <div class="alert alert-danger">{{ $errors->first('verify') }}</div>
                    @endif
                <form id="contactForm" class="py-lg-5" enctype="multipart/form-data">
                    @csrf
                     <div class="error-message" style="display: none;"></div>
                    <div class="">
                        <div class="form-group">
                            <label>Name <span>*</span></label>
                            <input type="text" name="name">
                               <span class="error text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>Email <span>*</span></label>
                            <input type="email" name="email">
                             <span class="error text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject">
                             {{-- <span class="error text-danger"></span> --}}
                        </div>

                        <div class="form-group full">
                            <label>Message</label>
                            <textarea name="message"></textarea>
                                       <span class="error text-danger"></span>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="">
                        <div class="infos">
                            <label class="filter-checkbox mb-3 d-flex align-items-center gap-2">
                                <input type="checkbox" name="terms" value="1" class="flex-shrink-0">
                                <span class="label-text"> I have read and accept the terms of use and privacy
                                    policies of the ESMA internaltional Network website.</span>
                            </label>
                            <label class="filter-checkbox mb-3 d-flex align-items-center gap-2">
                                <input type="checkbox" name="newsletter" value="1" class="flex-shrink-0">
                                <span class="label-text"> Ocassionally I would like to recieve update directly to my
                                    email (sign up for the newsletter).</span>
                            </label>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="button-row ">
                        <button type="button" id="verifyBtn" class="btn-style-5"> <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg#icon-captcha') }}"></use>
                            </svg> Click to verify</button>
                        <button type="submit" id="submitBtn" class="btn-style-4"> <svg class="svg-icon">
                                <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-plane"></use>
                            </svg> Submit
                        <span class="spinner-border spinner-border-sm ms-2" style="display: none;"></span>
                        </button>
                    </div>
                </form>
                 
            </div>
        </div>
    </div>
</section>
@push('page-js')
   <script>
$(document).ready(function() {
    const $form = $('#contactForm');
    const $submitBtn = $('#submitBtn');
    const $verifyBtn = $('#verifyBtn');
    let verified = false;  // Track verification state
    let emailSent = false; // Track if verification email was sent

    // Clear errors function
    function clearErrors() {
        $('.error').text('').removeClass('text-danger');
    }

    // Show field errors
    function showFieldErrors(errors) {
        clearErrors();
        Object.keys(errors).forEach(function(field) {
            $(`[name="${field}"]`).siblings('.error').text(errors[field][0]).addClass('text-danger');
        });
    }

    // Verify button - Client validation first
    $verifyBtn.click(function() {
        clearErrors();
        
        // Client-side required check
        if (!$form[0].checkValidity()) {
            alert('Please fill all required fields (*) before verifying.');
            $form[0].reportValidity();  // Show browser native errors
            return;
        }

        $.ajax({
            url: '{{ route("contact.verify") }}',
            method: 'POST',
            data: $form.serialize(),
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                alert('✅ Verification email sent! Check your inbox and click the link.');
                emailSent = true;
                $submitBtn.prop('disabled', false);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    showFieldErrors(xhr.responseJSON.errors);
                } else {
                    alert('❌ Error sending verification. Try again.');
                }
            }
        });
    });

    // Submit button - 3-step validation: client → verify check → server
    $form.submit(function(e) {
        e.preventDefault();
        clearErrors();

        // Step 1: Client-side validation
        if (!$form[0].checkValidity()) {
            alert('Please fill all required fields (*) first.');
            $form[0].reportValidity();
            return;
        }

        // Step 2: Check if verified (email clicked)
        if (!verified) {
            if (!emailSent) {
                alert('Please click "Click to verify" first to receive verification email.');
            } else {
                alert('Please check your email and click the verification link before submitting.');
            }
            return;
        }

        // Step 3: Server submission
        $submitBtn.prop('disabled', true);
        $('.spinner-border', $submitBtn).show();

        $.ajax({
            url: '{{ route("contact.submit") }}',
            method: 'POST',
            data: $form.serialize(),
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                alert('🎉 Thank you! Your message has been sent successfully.');
                $form[0].reset();
                $submitBtn.prop('disabled', true).find('.spinner-border').hide();
                verified = false;
                emailSent = false;
            },
            error: function(xhr) {
                $submitBtn.prop('disabled', false);
                $('.spinner-border', $submitBtn).hide();
                
                if (xhr.status === 422) {
                    const data = xhr.responseJSON;
                    if (data.error) {
                        alert('❌ ' + data.error);  // "Please verify your email first."
                    } else {
                        showFieldErrors(data.errors);
                    }
                } else {
                    alert('❌ Submission failed. Please try again.');
                }
            }
        });
    });

    // Enable if page reload after verification (from email link)
    @if(session('verified'))
        verified = true;
        emailSent = true;
        $submitBtn.prop('disabled', false);
    @endif
});
</script>
@endpush