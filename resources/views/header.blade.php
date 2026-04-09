@php

$user = Auth::user();
$company = \App\Models\Admin\Company::select('company_logo', 'company_name','company_icon')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset($company->company_icon) }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/outer.css') }}">
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
       {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/>
   <style>
    /* Styling the validation messages */
span.text-danger.small {
    display: block;
    color: #ff4d4d; /* Bright red */
    font-size: 12px;
    margin-top: 5px;
    font-weight: 500;
}

input.is-invalid, select.is-invalid {
    border: 1px solid #ff4d4d !important;
}
.submit-btn{
   display: inline-flex;
    align-items: center;
    padding: 14px 28px 14px 32px;
    gap: 14px;
    background: var(--gradient-primary);
    border: 2px solid rgba(107, 109, 196, 0.3);
    backdrop-filter: blur(13px);
    border-radius: var(--radius-58);
    font-size: 18px;
    color: white;
}


/* newsletter */
#newsletterForm {
    position: relative;
}
#newsletterForm .error {
    position: absolute !important;
    bottom: -25px;
    left: 0;
    width: 100%;
    z-index: 10;
}
#newsletterForm .loading {
    position: absolute !important;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
}



</style>
 @stack('page-css')

</head>

<body class="preload">
    <header class="header">
        <div class="container">
            <div class="logo"><a href="{{ route('home') }}"><img src="{{ !empty($headerData['company']->company_logo) ? asset($headerData['company']->company_logo) : asset('imgs/logo.png') }}" alt=""></a></div>
            <ul class="menus">
                <li><a href="{{ route('member.directory') }}">Member Directory</a></li>
                <li>
                    <a href="{{ route('events.hub') }}">Events Hub</a>
                    <ul class="dropdown-menu">
                        <li><a href="events-hub.php">Upcoming Events</a></li>
                        <li><a href="">Past Events</a></li>
                        <li><a href="">Event Calendar</a></li>
                        <li><a href="">Trade Fairs</a></li>
                    </ul>
                </li>
                @php 
              $resources_hub = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 11]);
                $news = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 12]);
                @endphp
                 @if(isset($resources_hub))
                <li class="has-dropdown">
                    <a href="{{ $resources_hub->client_page_urls }}">{{ $resources_hub->header_footer_name }}</a>
                    @if(isset($news))
                    <ul class="dropdown-menu">
                        @if(isset($news))
                        <li><a href="{{ $news->client_page_urls }}">{{ $news->header_footer_name }}</a></li>
                        @endif
                        <li><a href="">Articles & Reports</a></li>
                        <li><a href="">Document Library</a></li>
                        <li><a href="">Regulatory Updates</a></li>
                    </ul>
                    @endif
                    
                </li>
                @endif
                <li>
                    <a href="javascript:void(0)">About</a>
                    @php
                        
                        $aboutData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 6]);

                        $memberData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 9]);

                         $contactData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 7]);

                          $help_centerData = app()->call('App\Http\Controllers\PagesController@get_pagesection', ['id' => 10]);
                    @endphp
                    <ul class="dropdown-menu">
                        @if(isset($aboutData))
                        <li><a href="{{ $aboutData->client_page_urls }}">{{ $aboutData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($memberData))
                        <li><a href="{{ $memberData->client_page_urls }}">{{ $memberData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($contactData))
                        <li><a href="{{ $contactData->client_page_urls }}">{{ $contactData->header_footer_name }}</a></li>
                        @endif
                        @if(isset($help_centerData))
                        <li><a href="{{ $help_centerData->client_page_urls }}">{{ $help_centerData->header_footer_name }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>

            <div class="nav-right d-flex align-items-center gap-2">
                <div class="login-btns">
                    <!-- ================= SEARCH DROPDOWN ================= -->
                    <div class="dropdown-item-wrapper">
                        <a href="#" class="dropdown-toggle-btn">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-search"></use>
                            </svg>
                        </a>
                        <div class="custom-dropdown search-dropdown">
                            <!-- Keyword -->
                            <div class="form-group">
                                <label>Keyword</label>
                                <div class="input-box">
                                    <svg class="svg-icon input-icon"><use href="images/icons/icons-sprite.svg#icon-search"></use></svg>
                                    <input type="search" placeholder="Type what you want to find">
                                </div>
                            </div>
                            <!-- Search In -->
                            <div class="form-group select-box">
                                <label>Search In</label>
                                <div class="select-box content-filter" multiple>
                                    <select class="w-100">
                                        <option>All Website Content</option>
                                        <option>Member Directory</option>
                                        <option>Events Hub</option>
                                        <option>Resources Hub</option>
                                    </select>
                                    <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="search-actions">
                                <a href="#" class="p-4" style="color: var(--primary-400); font-weight: 600;">Clear</a>
                                <button class="search-btn btn-style-2 text-end">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-arrow-box-right"></use>
                                    </svg> Search <svg class="svg-icon arrow-svg">
                                        <use href="images/icons/icons-sprite.svg#icon-arrow-right"></use>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>


                    <!-- ================= LANGUAGE DROPDOWN ================= -->
                    <div class="dropdown-item-wrapper">
                        <a href="#" class="dropdown-toggle-btn">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-language"></use>
                            </svg>
                            <span class="toggle-btn-active-language">EN</span>
                        </a>
                        <ul class="custom-dropdown language-dropdown">

                            <li>
                                <img src="https://flagcdn.com/w20/gb.png">
                                English
                                <span class="lang-code">EN</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/es.png">
                                Español
                                <span class="lang-code">ES</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/de.png">
                                Deutsch
                                <span class="lang-code">DE</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/it.png">
                                Italiano
                                <span class="lang-code">IT</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/pt.png">
                                Português
                                <span class="lang-code">PT</span>
                            </li>

                            <li>
                                <img src="https://flagcdn.com/w20/fr.png">
                                Français
                                <span class="lang-code">FR</span>
                            </li>

                        </ul>
                    </div>

                    <!--Profile will show when the user loged in / sinup -->
                    <!-- ================= PROFILE DROPDOWN ================= -->
                    <!--only d-block when account logged in -->
                    <div class="dropdown-item-wrapper d-none">

                        <a href="#" class="dropdown-toggle-btn">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-user-outline"></use>
                            </svg>
                        </a>

                        <div class="custom-dropdown profile-dropdown">

                            <div class="profile-header">
                                <img src="./images/A. Loacker SpaAG/Untitled-2.png" class="profile-img w-25 me-3">
                                <div>
                                    <h6 class="m-0">A. Loacker Spa/AG</h6>
                                    <small>Pure goodness / Che bontà</small>
                                </div>
                            </div>

                            <ul class="mt-2">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">See Profile</a></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Library</a></li>
                                <li><a href="#">Users</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>

                        </div>
                    </div>

                </div>

                <div class="nav-btns d-flex align-items-center gap-2">
                    <a class="btn-style-4" id="signupBtn" data-bs-toggle="modal" data-bs-target="#joinModal"><svg
                            class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-user-plus"></use>
                        </svg> Sign Up </a>
                    <a href="{{ route('login') }}" class="btn-style-1"><svg class="svg-icon">
                            <use href="images/icons/icons-sprite.svg#icon-arrow-right-box"></use>
                        </svg> Login </a>
                </div>
            </div>
        </div>
    </header>

       <!--Sign Up Form -->
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="joinModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog side-panel modal-fullscreen-sm-down">
            <div class="modal-content border-0">
                <div class="modal-header side-header">
                    <h2>Join ESMA International Network</h2>
                    <button type="button" class="btn-close close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body side-body">
                    <p>
                        Membership in ESMA is open to all professional agents, distributors and manufacturers
                        and sales & marketing organisations that specialise in manufacturing or handling of packaged
                        consumer goods.
                    </p>
                    <p>
                        The applicant company must have been established for at least one year and show to the
                        satisfaction
                        of the ESMA Executive Committee that it provides top-quality services to the FMCG Industry.
                    </p>
                    <div
                        class="info-row py-4 d-flex align-items-center justify-content-between border-top border-bottom my-4 border-light">
                        <b>Need more information?</b>
                        <hr class="w-25" style="transform: rotate(-180deg);"> <svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-arrow-right"></use>
                        </svg>
                        <div class="gap-2 d-flex">
                            <button class="btn-style-3">Learn more about membership.</button>
                            <button class="btn-style-3">Contact Us</button>
                        </div>
                    </div>


                    <p><b>Step-by-step instructions on how to apply:</b></p>

                    <div class="steps signup-steps border-bottom border-light pb-4">
                        <div class="step">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-step-one"></use>
                            </svg>
                            <div>
                                <strong>01.</strong> Request an invitation by submitting the application form below.
                            </div>
                        </div>

                        <div class="step">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-step-two"></use>
                            </svg>
                            <div><strong>02.</strong> Review and CEO screening.</div>
                        </div>

                        <div class="step">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-step-three"></use>
                            </svg>
                            <div><strong>03.</strong> Board decision.</div>
                        </div>

                        <div class="step">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-step-four"></use>
                            </svg>
                            <div><strong>04.</strong> Onboarding, member profile setup, and access to benefits.</div>
                        </div>
                    </div>


                    <p><b>Application form:</b></p>
                    <form id="registerForm" method="POST" action="javascript:void(0);">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone <span>*</span></label>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name <span>*</span></label>
                                    <input type="text" name="company_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Name <span>*</span></label>
                                    <input type="text" name="contact_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country <span>*</span></label>
                                    <input type="text" name="country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address <span>*</span></label>
                                    <input type="text" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website <span>*</span></label>
                                    <input type="text" name="website">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group full">
                                    <label>Message</label>
                                    <textarea name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="infos">
                            <label class="filter-checkbox mb-3">
                                <input type="checkbox" name="category[]" value="associates">
                                <span class="checkmark"></span>
                                <span class="label-text"> I have read and Understood the application rules</span>
                            </label> 
                            <label class="filter-checkbox mb-3">
                                <input type="checkbox" name="category[]" value="associates">
                                <span class="checkmark"></span>
                                <span class="label-text"> I have read and accept the terms of use and privacy  policies of the ESMA  International Network Website </span>
                            </label>
                            <label class="filter-checkbox mb-3">
                                <input type="checkbox" name="category[]" value="associates">
                                <span class="checkmark"></span>
                                <span class="label-text"> Occasionally I would like to receive update directly to my email (sign up for the newsletter). </span>
                            </label>
                        </div>
                        <div class="button-row mt-4">
                            <a href="#" class="btn-style-5"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-captcha"></use>
                                </svg> Click to verify</a>
                            <button type="submit"  class="btn-style-4 btn"> <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-plane"></use>
                                </svg> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
@push('page-js')
    <script>
$(document).ready(function() {
    // 1. Initialize Validation
    $("#registerForm").validate({
        errorElement: 'span',
        errorClass: 'text-danger small',
        rules: {
            email: { required: true, email: true },
            phone: { required: true },
            company_name: { required: true },
            contact_name: { required: true },
            country: { required: true },
            address: { required: true },
            organization_type: { required: true },
            website: { required: true }
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
                        text: response.message || 'Application submitted successfully!',
                        timer: 3000
                    }).then(() => {
                        window.location.reload(); // Or redirect
                    });
                },
                error: function(xhr) {
                    submitBtn.prop('disabled', false).text('Submit');
                    
                    let errorText = "Something went wrong.";
                    if(xhr.responseJSON && xhr.responseJSON.message) {
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

   
   


