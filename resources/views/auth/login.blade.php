@extends('layouts.MainLayouts')
@section('title', 'Login')
@section('content')
<div class="split-container">
    <!-- LEFT VIDEO SIDE -->
    <div class="left-side">
        <video autoplay muted loop>
            <source src="./images/banner-video.mp4" type="video/mp4">
        </video>
        <div class="left-overlay"></div>
    </div>
    <!-- RIGHT IMAGE SIDE -->
    <div class="right-side"></div>
</div>

<!-- LOGIN CARD -->
<div class="mid-card">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="left-content">
                    <h1>Login</h1>
                    <p class="login-para">
                        Members of ESMA enjoy access to a library of information and business opportunities, as well a
                        network of manufacturers and exclusive member news.
                    </p>
                    <p>
                        Use the login form to view your account or visit our How to Join page to learn how you can
                        become an ESMA member.
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="login-card">
                    <form id="loginForm">
                        
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" name="email" placeholder="yourlogin@domain.com">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-wrapper">
                                <input type="password" id="passwordField" name="password" placeholder="Your password">

                                <svg class="svg-icon toggle-password" id="togglePassword">
                                    <use href="images/icons/icons-sprite.svg#icon-eye"></use>
                                </svg>
                            </div>
                        </div>
                        <hr
                            style="background: linear-gradient(90deg, rgba(138, 140, 228, 0) 0%, rgba(138, 140, 228, 0.5) 50%, rgba(138, 140, 228, 0) 100%); margin:1.5rem 0">
                        <div class="button-row mt-4">
                            <a href="#" class="btn-style-5 btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-captcha"></use>
                                </svg> Click to verify</a>
                            <button type="submit" class="btn-style-4 btn submit-btn">
                                <svg class="svg-icon">
                                    <use href="images/icons/icons-sprite.svg#icon-arrow-right-box"></use>
                                </svg> Login</button>
                        </div>
                    </form>
                    <div class="bottom-bar">
                        <div class="d-flex align-items-center gap-2">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-lock"></use>
                            </svg>Forgot your password?
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <svg class="svg-icon">
                                <use href="images/icons/icons-sprite.svg#icon-user-plus"></use>
                            </svg> Not a member? <a href="#">Learn How To Join</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('page-js')

<script>
$(document).ready(function() {
    // DEBUG: Check if jQuery is working
    console.log("jQuery is loaded and ready.");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // --- Form Validation ---
    $('#loginForm').validate({
        // alert() was here - it MUST be removed
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Email is required.",
                email: "Please enter a valid email address."
            },
            password: {
                required: "Password is required.",
                minlength: "Password must be at least 6 characters long."
            }
        },
        errorElement: 'span',
        errorClass: 'text-danger small',
        errorPlacement: function(error, element) {
            if (element.closest('.input-wrapper').length) {
                error.insertAfter(element.closest('.input-wrapper'));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            console.log("Form is valid! Proceeding with AJAX...");
            const $submitBtn = $('.submit-btn');
            $submitBtn.prop('disabled', true).text('Logging in...');

         $.ajax({
            url: '/login/auth',
            method: 'POST',
            data: $(form).serialize(),
            dataType: 'json', 
            success: function(response) {
                if (response.success) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('Login successful!');
                    
                    // Wait a moment so they can see the message before redirecting
                    setTimeout(function() {
                        window.location.href = response.redirect || '/my-dashboard';
                    }, 1000);
                } else {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error(response.message || 'Login failed.');
                }
            },
            error: function(xhr) {
                $submitBtn.prop('disabled', false).html('Login');
                alertify.set('notifier', 'position', 'top-right');

                let errorMsg = 'Login failed.';
                
                if (xhr.status === 422) {
                    // Grab the first validation error message from Laravel
                    const errors = xhr.responseJSON.errors;
                    errorMsg = Object.values(errors)[0][0]; 
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }

                alertify.error(errorMsg);
            }
        });
            return false; 
        }
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const toggleBtn = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("passwordField");
        const iconUse = toggleBtn.querySelector("use");

        toggleBtn.addEventListener("click", function () {

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                iconUse.setAttribute("href", "images/icons/icons-sprite.svg#icon-eye-slash");
            } else {
                passwordInput.type = "password";
                iconUse.setAttribute("href", "images/icons/icons-sprite.svg#icon-eye");
            }

        });

    });
</script>
@endpush
@endsection 