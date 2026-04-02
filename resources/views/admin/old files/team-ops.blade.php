@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($member->encrypted_id) ? route('admin.edit.member', $member->encrypted_id) : route('admin.add.member') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Member</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_team') }}">All Members</a></li>
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
                            {{-- <a href="javascript:void(0);" class="btn btn-light-brand" data-bs-toggle="offcanvas"
                            data-bs-target="#proposalSent">
                            <i class="feather-layers me-2"></i>
                            <span>Save & Send</span>
                        </a> --}}
                            {{-- <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-save me-2"></i>
                                <span>Save</span>
                            </a> --}}
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
                                    <label for="emp_name" class="form-label">Member Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name"
                                        value="{{ !empty($member->encrypted_id) ? $member->employee_name : old('emp_name') }}"
                                        placeholder="Enter Member Name" />
                                    @error('emp_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="emp_designation" class="form-label">Member Designation <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="emp_designation" name="emp_designation"
                                        value="{{ !empty($member->encrypted_id) ? $member->employee_designation : old('emp_designation') }}"
                                        placeholder="Enter Member Designation" />
                                    @error('emp_designation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="instagram_count" class="form-label">Instagram Counts <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="instagram_count" name="instagram_count"
                                        value="{{ !empty($member->encrypted_id) ? $member->instagram_count : old('instagram_count') }}"
                                        placeholder="Enter Instagram Counts" />
                                    @error('instagram_count')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="youtube_count" class="form-label">YouTube Counts <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="youtube_count" name="youtube_count"
                                        value="{{ !empty($member->encrypted_id) ? $member->youtube_count : old('youtube_count') }}"
                                        placeholder="Enter YouTube Counts" />
                                    @error('youtube_count')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="tiktok_count" class="form-label">TikTok Counts <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="tiktok_count" name="tiktok_count"
                                        value="{{ !empty($member->encrypted_id) ? $member->tiktok_count : old('tiktok_count') }}"
                                        placeholder="Enter TikTok Counts" />
                                    @error('tiktok_count')
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
                                    <label for="emp_image" class="form-label">Member Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($member->encrypted_id) && !empty($member->employee_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="emp_image">
                                                    <img src="{{ asset($member->employee_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="emp_image" name="emp_image"
                                        accept="image/*" />
                                    @error('emp_image')
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
