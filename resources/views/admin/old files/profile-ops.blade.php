@extends('admin.layouts.admin-layout')

@push('page-wise-css')
    <style>
        .profile-image-button {
            opacity: 0 !important;
            transition: all .3s ease !important;
        }

        .profile-image-button:hover {
            opacity: 1 !important;
            visibility: visible !important;
            transition: all .3s ease !important;
            background-color: #ecedf4 !important;
        }
    </style>
@endpush

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form action="{{ route('admin.edit.profile', $profile->encrypted_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Profile</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Manage Profile</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>
                                <span>Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card stretch stretch-full">
                            <div class="card-body p-4">
                                <div class="mb-5">
                                    <label for="profile_image" class="form-label">Profile Image</label>
                                    <div
                                        class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                        <img src="{{ asset($profile->image) }}"
                                            class="upload-image-pic img-fluid rounded h-100 w-100" alt="">
                                        <div class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer profile-image-button"
                                            id="image-button">
                                            <i class="feather feather-camera" aria-hidden="true"></i>
                                        </div>
                                        <input id="profile_image" name="profile_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                            value="{{ $profile->first_name }}" placeholder="Enter First Name" required>
                                        @error('firstName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                            value="{{ $profile->last_name }}" placeholder="Enter Last Name">
                                        @error('lastName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="email" class="form-label">E-Mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $profile->email }}" placeholder="Enter E-Mail" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ $profile->phone }}" placeholder="123 456 7890"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                            minlength="10" maxlength="10" required />
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
@endsection

@push('page-wise-js')
    <script>
        "use strict";
        $(document).ready(function() {
            $("#profile_image").on("change", function() {
                let e, t;
                (e = this).files && e.files[0] && ((t = new FileReader).onload = function(e) {
                    $(".upload-image-pic").attr("src", e.target.result);
                }, t.readAsDataURL(e.files[0]));
            }), $("#image-button").on("click", function() {
                $("#profile_image").click();
            });
        });
    </script>
@endpush
