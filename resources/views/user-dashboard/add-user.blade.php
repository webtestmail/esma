@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title','Users - ESMA International Network')
@section('content')
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('user-dashboard.components.dashboard-sidebar')

            <!-- Main Content Area  -->
            <div class="col-lg-9 mainContent-col">
                <div class="dashboard-content">


                    @include('user-dashboard.components.dashboard-header')

                    <div class="dashboard-content-inner">
                        <div class="c-spacer__horizontal my-4"></div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <h2 class="dashboard-page-title">Add User</h2>
                            <a href="{{ route('users') }}" class="dashboard-page-title d-flex gap-1"> <i class="bi bi-arrow-left-short"></i> Back
                                to Users
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="dashboard-stat-card dash-form">
                                <form id="add-user-form">
                                    <div class="row g-3">
                                        <div class="col-lg-6 form-box">
                                            <label for="">Email <span>*</span></label>
                                            <input type="email" name="email" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-6 form-box">
                                            <label for="">Display Name <span>*</span></label>
                                            <input type="text" name="display_name" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-6 form-box">
                                            <label for="">Username <span>*</span></label>
                                            <input type="text" name="username" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-6 form-box">
                                            <label for="">Password <span>*</span></label>
                                            <input type="password" name="password" placeholder="" class="form-control">
                                        </div>
                                        <div class="col-lg-6 form-box">
                                            <label for="">Confirm Password <span>*</span></label>
                                            <input type="password" name="password_confirmation" placeholder=""
                                                class="form-control">
                                        </div>
                                        <div class="c-spacer__horizontal mt-4"></div>
                                        <div class="col-lg-12 text-end">
                                            <button type="submit" class="form-submit-btn"> <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-user-plus"></use>
                                                </svg> Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- 
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="dashboard-card text-center">
                                    <div class="dashboard-card-body">
                                        <img src="../images/logo-colord.png" alt="Profile Picture"
                                            style="width: 150px; height: 150px; border-radius: 50%; margin-bottom: 20px; border: 4px solid var(--primary-300);">
                                        <h3 style="color: var(--primary-600); margin-bottom: 10px;">John Doe</h3>
                                        <p style="color: var(--gray-900); margin-bottom: 20px;">Member since 2024</p>
                                        <a href="edit-profile.php" class="dashboard-btn dashboard-btn-primary">
                                            <i class="bi bi-pencil"></i> Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 mb-4">
                                <div class="dashboard-card">
                                    <div class="dashboard-card-header">
                                        <h3 class="dashboard-card-title">Personal Information</h3>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Full Name:</strong>
                                                <p>John Doe</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Email:</strong>
                                                <p>john.doe@esma.org</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Phone:</strong>
                                                <p>+353 (87) 444 2121</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Company:</strong>
                                                <p>ESMA International</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Position:</strong>
                                                <p>Senior Member</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Location:</strong>
                                                <p>Dublin, Ireland</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dashboard-card mt-4">
                                    <div class="dashboard-card-header">
                                        <h3 class="dashboard-card-title">Membership Details</h3>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Member ID:</strong>
                                                <p>ESMA-2024-001234</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Membership Type:</strong>
                                                <p><span class="dashboard-badge dashboard-badge-primary">Premium</span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Join Date:</strong>
                                                <p>January 15, 2024</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Status:</strong>
                                                <p><span class="dashboard-badge dashboard-badge-success">Active</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->


                </div>
            </div>
        </div>
    </div>
</div>
@push('user-custom-js')
<script>
$(document).ready(function() {
    $('#add-user-form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            display_name: {
                required: true,
                minlength: 3
            },
            username: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: { // Changed from confirm_password
                        required: true,
                        equalTo: '[name="password"]'
         }
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            display_name: {
                required: "Please enter a display name",
                minlength: "Display name must be at least 3 characters long"
            },
            username: {
                required: "Please enter a username",
                minlength: "Username must be at least 3 characters long"
            },
            password: {
                required: "Please provide a password",
                minlength: "Password must be at least 6 characters long"
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function(form, e) {
            e.preventDefault();
            
            $.ajax({
                url: "{{ route('add-user') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: $(form).serialize(),
                success: function(response) {
                    alertify.success('User added successfully!');
                    e.target.reset();
                },
                error: function(xhr) {
                    alertify.error('An error occurred while adding the user.');
                }
            });
        }
    });
});
</script>

@endpush

@endsection