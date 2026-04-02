@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($testimonial->encrypted_id) ? route('admin.edit.testimonial', $testimonial->encrypted_id) : route('admin.add.testimonial') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Testimonials</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_testimonials') }}">All Testimonials</a>
                        </li>
                        <li class="breadcrumb-item">Create/Edit</li>
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
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="client_name" class="form-label">Client Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="client_name" name="client_name"
                                        value="{{ !empty($testimonial->encrypted_id) ? $testimonial->client_name : old('client_name') }}"
                                        placeholder="Enter Name" />
                                    @error('client_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="client_designation" class="form-label">Client Designation <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="client_designation"
                                        name="client_designation"
                                        value="{{ !empty($testimonial->encrypted_id) ? $testimonial->client_designation : old('client_designation') }}"
                                        placeholder="Enter Designation" />
                                    @error('client_designation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="review_date" class="form-label">Client Review Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="review_date" name="review_date"
                                        value="{{ !empty($testimonial->encrypted_id) ? date('Y-m-d', strtotime($testimonial->review_date)) : old('review_date') }}"
                                        placeholder="Select Date" />
                                    @error('review_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="rating_quantity" class="form-label">Client Rating <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="rating_quantity" name="rating_quantity"
                                        value="{{ !empty($testimonial->encrypted_id) ? $testimonial->rating_quantity : old('rating_quantity') }}"
                                        placeholder="Enter Rating" />
                                    @error('rating_quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Description">{{ !empty($testimonial->encrypted_id) ? htmlspecialchars_decode($testimonial->description) : old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="client_image" class="form-label">Client Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($testimonial->encrypted_id) && !empty($testimonial->client_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Brand Image">
                                                    <img src="{{ asset($testimonial->client_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="client_image" name="client_image"
                                        accept="image/*" />
                                    @error('client_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </form>
    </div>
@endsection
