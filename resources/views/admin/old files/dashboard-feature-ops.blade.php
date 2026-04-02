@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($feature->encrypted_id) ? route('admin.edit.feature', ['role' => $role, 'feature' => $feature->encrypted_id]) : route('admin.add.feature', $role) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard Features</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.features', $role) }}">All Dashboard Features</a></li>
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
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label for="i_tag" class="form-label">i Tag <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="i_tag" name="i_tag"
                                            value="{{ !empty($feature->encrypted_id) ? $feature->i_tag : old('i_tag') }}"
                                            placeholder="Enter <i></i> Tag" />
                                        @error('i_tag')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="feature_headline" class="form-label">Feature Headline <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="feature_headline" name="feature_headline"
                                            value="{{ !empty($feature->encrypted_id) ? $feature->feature_headline : old('feature_headline') }}"
                                            placeholder="Enter Headline" />
                                        @error('feature_headline')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="description" class="form-label">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                            placeholder="Enter Description">{{ !empty($feature->encrypted_id) ? htmlspecialchars_decode($feature->description) : old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="feature_icons" class="form-label">Feature Icons <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($feature->encrypted_id))
                                        <div class="my-3">
                                            @if (!empty($feature->icons))
                                                <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                    @foreach ($feature->icons as $icon)
                                                        {{-- <div style="display: inline-block; position: relative; margin: 5px;">
                                                        <img src="{{ asset($icon->file_path) }}" alt="Feature_Icons"
                                                            class="rounded" height="60px" width="60px"
                                                            style="object-fit: cover;">
                                                        <button
                                                            style="position: absolute; top: -5px; right: -5px; width: 20px; height: 20px; background: red; color: white; border: none; border-radius: 50%; font-size: 14px; cursor: pointer;">×</button>
                                                    </div>

                                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            title="{{ $icon->file_name }}">
                                                            <img src="{{ asset($icon->file_path) }}" class="img-fluid"
                                                                alt="image" />
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="feature_icons" name="feature_icons[]"
                                        accept="image/*" multiple />
                                    @error('feature_icons')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </form>
    </div>
@endsection