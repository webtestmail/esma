@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form action="{{ route('admin.edit.socials', $socials->encrypted_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Website Socials Information</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Manage Socials Information</li>
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
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <label for="facebook_url" class="form-label">Facebook URL</label>
                                        <input type="text" class="form-control" id="facebook_url" name="facebook_url"
                                            value="{{ $socials->facebook_url }}" placeholder="Enter Facebook URL">
                                        @error('facebook_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="x_url" class="form-label">X URL</label>
                                        <input type="text" class="form-control" id="x_url" name="x_url"
                                            value="{{ $socials->x_url }}" placeholder="Enter X URL">
                                        @error('x_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                        <input type="text" class="form-control" id="linkedin_url" name="linkedin_url"
                                            value="{{ $socials->linkedin_url }}" placeholder="Enter LinkedIn URL">
                                        @error('linkedin_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="youtube_url" class="form-label">YouTube URL</label>
                                        <input type="text" class="form-control" id="youtube_url" name="youtube_url"
                                            value="{{ $socials->youtube_url }}" placeholder="Enter YouTube URL">
                                        @error('youtube_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="instagram_url" class="form-label">Instagram URL</label>
                                        <input type="text" class="form-control" id="instagram_url" name="instagram_url"
                                            value="{{ $socials->instagram_url }}" placeholder="Enter Instagram URL">
                                        @error('instagram_url')
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
