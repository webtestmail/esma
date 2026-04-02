@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($brand->encrypted_id) ? route('admin.edit.brand', $brand->encrypted_id) : route('admin.add.brand') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Brands</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_brands') }}">All Brands</a></li>
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
                                    <label for="brand_name" class="form-label">Brand Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                                        value="{{ !empty($brand->encrypted_id) ? $brand->brand_name : old('brand_name') }}"
                                        placeholder="Enter Brand Name" />
                                    @error('brand_name')
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
                                    <label for="brand_image" class="form-label">Brand Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($brand->encrypted_id) && !empty($brand->brand_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Brand Image">
                                                    <img src="{{ asset($brand->brand_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="brand_image" name="brand_image"
                                        accept="image/*" />
                                    @error('brand_image')
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
