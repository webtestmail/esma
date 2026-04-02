@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($category->encrypted_id) ? route('admin.edit.category', ['type' => $type, 'category' => $category->encrypted_id]) : route('admin.add.category', $type) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Category</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_categories', $type) }}">All Pages</a>
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
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="category_headline" class="form-label">Category Headline <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="category_headline"
                                        name="category_headline"
                                        value="{{ !empty($category->encrypted_id) ? $category->category_headline : old('category_headline') }}"
                                        placeholder="Enter Name" />
                                    @error('category_headline')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="category_url" class="form-label">Category URL <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="category_url" name="category_url"
                                        value="{{ !empty($category->encrypted_id) ? $category->category_url : old('category_url') }}"
                                        placeholder="Enter Name for Header & Footer" />
                                    @error('category_url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="meta_title" class="form-label">Meta Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ !empty($category->encrypted_id) ? $category->meta_title : old('meta_title') }}"
                                        placeholder="Enter Title" />
                                    @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="meta_keyword" class="form-label">Meta Keyword <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                        value="{{ !empty($category->encrypted_id) ? $category->meta_keyword : old('meta_keyword') }}"
                                        placeholder="Enter Keywords" />
                                    @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="meta_description" class="form-label">Meta Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Meta Description">{{ !empty($category->encrypted_id) ? $category->meta_description : old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="page_image" class="form-label">Breadcrumb Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($category->encrypted_id) && !empty($category->page_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="{{ $category->page_image }}">
                                                    <img src="{{ asset($category->page_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="page_image" name="page_image"
                                        accept="image/*" />
                                    @error('page_image')
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
