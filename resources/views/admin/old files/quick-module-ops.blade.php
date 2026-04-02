@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($quick_module->encrypted_id) ? route('admin.edit.quick_module', ['quick_module' => $quick_module->encrypted_id]) : route('admin.add.quick_module') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard Features</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.quick_modules') }}">All Quick Module</a></li>
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
                                        <label for="roles" class="form-label">
                                            Show on Dashboard(s) <span class="text-danger">*</span>
                                        </label>
                                    
                                        <select name="roles[]" id="roles" class="form-select" multiple>
                                            @php
                                                $selectedRoles = !empty($quick_module->roles)
                                                    ? (is_array($quick_module->roles) 
                                                        ? $quick_module->roles 
                                                        : json_decode($quick_module->roles, true))
                                                    : [];
                                            @endphp
                                    
                                            <option value="influencer"
                                                {{ in_array('influencer', old('roles', $selectedRoles ?? [])) ? 'selected' : '' }}>
                                                Influencer
                                            </option>
                                    
                                            <option value="brand"
                                                {{ in_array('brand', old('roles', $selectedRoles ?? [])) ? 'selected' : '' }}>
                                                Brand
                                            </option>
                                        </select>
                                    
                                        @error('roles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="quick_module_headline" class="form-label">Quick Module Headline <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="quick_module_headline" name="quick_module_headline"
                                            value="{{ !empty($quick_module->encrypted_id) ? $quick_module->headline : old('quick_module_headline') }}"
                                            placeholder="Enter Headline" />
                                        @error('quick_module_headline')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="description" class="form-label">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                            placeholder="Enter Description">{{ !empty($quick_module->encrypted_id) ? htmlspecialchars_decode($quick_module->description) : old('description') }}</textarea>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="button_name" class="form-label">Button Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="button_name" name="button_name"
                                                    value="{{ !empty($quick_module->encrypted_id) ? $quick_module->button_name : old('button_name') }}"
                                                    placeholder="Enter Botton Name" />
                                            </div>
                                            <div class="col-6">
                                                <label for="button_link" class="form-label">Button Link <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="button_link" name="button_link"
                                                    value="{{ !empty($quick_module->encrypted_id) ? $quick_module->button_link : old('button_link') }}"
                                                    placeholder="Enter Button Link" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="quick_module_image" class="form-label">Quick Module Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($quick_module->encrypted_id))
                                        <div class="my-3">
                                            @if (!empty($quick_module->image))
                                                <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                        <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            title="{{ $quick_module->headline }}">
                                                            <img src="{{ asset($quick_module->image) }}" class="img-fluid"
                                                                alt="image" />
                                                        </a>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="quick_module_image" name="quick_module_image"
                                        accept="image/*" />
                                    @error('feature_icons')
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
    
    <script>
        new MultiSelectTag('roles')  // id
    </script>
@endsection