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
                    <img src="{{ asset($contact->company_footer_logo ?? '') }}" alt="">
                </a>
            </div>

            <div class="col-lg-6">
                <ul class="list-unstyled d-flex align-items-start  mb-0 justify-content-lg-between footer-contact-info">
                    <li>
                        <a href="tel:{{ $contact->phone ?? '' }}" class="d-flex gap-2">
                            <i class="bi bi-chat-dots"></i>{{ $contact->phone ?? '' }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $contact->email ?? '' }}" class="d-flex gap-2">
                            <i class="bi bi-envelope"></i>{{ $contact->email ?? '' }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $contact->alternate_email ?? '' }}" class="d-flex gap-2">
                            <i class="bi bi-envelope"></i> {{ $contact->alternate_email ?? '' }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 text-lg-end">
                <ul class="list-inline mb-0 footer-social-icons">
                    <li class="list-inline-item">
                        <a href="{{ $contact->linkedin_url ?? '' }}" target="_blank">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $contact->x_url ?? '' }}" target="_blank">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $contact->facebook_url ?? '' }}" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $contact->instagram_url ?? '' }}" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <hr>

        <!-- MAIN FOOTER CONTENT -->
       @include('components.newsletter')

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
                     @php

                        $news = app()->call('App\Http\Controllers\PagesController@get_footer_page', ['id' => 12]);
                        $reportData = app()->call('App\Http\Controllers\PagesController@get_footer_page', ['id' => 15]);

                    @endphp
                    <ul>
                        @if(isset($news))
                         <li><a href="{{ '/'.$news->client_page_urls }}">{{ $news->header_footer_name }}</a></li>
                        @endif
                        @if(isset($reportData))
                         <li><a href="{{ '/'.$reportData->client_page_urls }}">{{ $reportData->header_footer_name }}</a></li>
                        @endif
                        <li><a href="#">Document Library</a></li>
                        <li><a href="#">Regulatory Updates</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-lg-3">
                <ul>
                    <h4>About</h4>
                       @php
                        
                        $aboutData = app()->call('App\Http\Controllers\PagesController@get_footer_page', ['id' => 6]);

                        $memberData = app()->call('App\Http\Controllers\PagesController@get_footer_page', ['id' => 9]);

                        $contactData = app()->call('App\Http\Controllers\PagesController@get_footer_page', ['id' => 7]);

                        $help_centerData = app()->call('App\Http\Controllers\PagesController@get_footer_page', ['id' => 10]);

                    @endphp
                    <ul>
                        @if(isset($news))
                          <li><a href="{{ '/'.$aboutData->client_page_urls }}">{{ $aboutData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($contactData))
                          <li><a href="{{ '/'.$contactData->client_page_urls }}">{{ $contactData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($help_centerData))
                          <li><a href="{{ '/'.$help_centerData->client_page_urls }}">{{ $help_centerData->header_footer_name }}</a></li>
                        @endif
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

<script>
    // const shareBtn = document.getElementById('shareBtn');
    // const popup = document.getElementById('socialPopup');
    // const copyBtn = document.getElementById('copyBtn');
    // const toast = document.getElementById('copyToast');

    // // Toggle popup on share button click
    // shareBtn.addEventListener('click', (e) => {
    //     e.stopPropagation();
    //     popup.classList.toggle('open');
    // });

    // // Close popup when clicking outside
    // document.addEventListener('click', (e) => {
    //     if (!document.getElementById('shareWrapper').contains(e.target)) {
    //         popup.classList.remove('open');
    //     }
    // });

    // // Copy link functionality
    // copyBtn.addEventListener('click', () => {
    //     navigator.clipboard.writeText(window.location.href).then(() => {
    //         toast.classList.add('show');
    //         setTimeout(() => toast.classList.remove('show'), 2500);
    //     });
    // });
</script>

<script>
    document.querySelectorAll('.events-share').forEach(btn => {

        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const wrapper = btn.closest('.c-share-1')?.parentElement;
            if (!wrapper) return;

            const popup = wrapper.querySelector('.events-share-popup');
            if (!popup) return;

            const isOpen = popup.classList.contains('is-open');

            document.querySelectorAll('.events-share-popup.is-open').forEach(p => closePopup(p));

            if (!isOpen) openPopup(popup);
        });

    });

    function openPopup(popup) {
        popup.classList.add('is-open');

        popup.querySelectorAll('.social-icon').forEach((icon, i) => {
            icon.style.transitionDelay = `${i * 40}ms`;
            icon.classList.add('icon-visible');
        });
    }

    function closePopup(popup) {

        popup.querySelectorAll('.social-icon').forEach(icon => {
            icon.style.transitionDelay = '0ms';
            icon.classList.remove('icon-visible');
        });

        setTimeout(() => popup.classList.remove('is-open'), 200);
    }

    document.addEventListener('click', (e) => {

        if (!e.target.closest('.events-share') && !e.target.closest('.events-share-popup')) {
            document.querySelectorAll('.events-share-popup.is-open').forEach(p => closePopup(p));
        }

    });

    document.querySelectorAll('.si-copy').forEach(copyBtn => {

        copyBtn.addEventListener('click', () => {

            const url = window.location.href;

            navigator.clipboard.writeText(url).then(() => {

                copyBtn.title = 'Copied!';
                copyBtn.classList.add('copied');

                setTimeout(() => {
                    copyBtn.title = 'Copy Link';
                    copyBtn.classList.remove('copied');
                }, 2000);

            });

        });

    });

    document.querySelectorAll('.events-share-popup').forEach(popup => {

        const label = popup.querySelector('.share-label');
        const divider = popup.querySelector('.share-divider');

        popup.querySelectorAll('.social-icon').forEach(icon => {

            icon.addEventListener('mouseenter', () => {

                const platform = icon.dataset.share;

                if (platform === "Copy Link") {
                    label.textContent = "Copy Link";
                } else {
                    label.textContent = `Share on ${platform}`;
                }

                popup.classList.add('show-label');

            });

        });

        popup.addEventListener('mouseleave', () => {
            popup.classList.remove('show-label');
            label.textContent = "Share this"; // reset default
        });

    });

</script>
<script src="{{ asset('js/outer.js') }}"></script>
<script src="{{ asset('js/custome.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



@stack('page-js')   



  <script>
$(document).ready(function() {

    const $form = $('#newsletterForm');
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
<script>
    new WOW().init();
</script>
</body>

</html>