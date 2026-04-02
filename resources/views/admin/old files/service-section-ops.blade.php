@extends('admin.layouts.main-layout')
<?php if(!empty($section->encrypted_id)) {
    $title = "Edit ";
} else {
    $title = "Add ";
}

if(isset($enc_parent_section) && !empty($enc_parent_section)) {
    $title .= "Sub-Section ";
} else {
    $title .= "Section ";
}
?>
@section('title', $title)
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(isset($enc_parent_section) && !empty($enc_parent_section))
        <form action="{{ !empty($section->encrypted_id) ? route('edit.service.sub.section', ["service" => $enc_service, "parent" => $enc_parent_section, "section" => $section->encrypted_id]) : route('add.service.sub.section', ["service" => $enc_service, "parent" => $enc_parent_section]) }}" method="POST" enctype="multipart/form-data">
        @else
        <form action="{{ !empty($section->encrypted_id) ? route('edit.service.section', ["service" => $enc_service, "section" => $section->encrypted_id]) : route('add.service.section', $enc_service) }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf
            <!-- Hoverable Table rows -->
            <h5 class="card-header">{{ $title }}
                @if(isset($enc_parent_section) && !empty($enc_parent_section))
                <span class="float-end"><a href="{{ route('get.service.sub.sections', ["service" => $enc_service, "parent" => $enc_parent_section]) }}" class="btn btn-icon rounded-pill btn-outline-secondary float-end"><i class='bx bx-left-arrow-alt' style="font-size: 1.7rem;"></i></a></span>
                @else
                <span class="float-end"><a href="{{ route('get.service.sections', $enc_service) }}" class="btn btn-icon rounded-pill btn-outline-secondary float-end"><i class='bx bx-left-arrow-alt' style="font-size: 1.7rem;"></i></a></span>
                @endif
            </h5>
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="section_headline" class="col-form-label">Section Headline</label>
                                    <input type="text" class="form-control" id="section_headline" name="section_headline" value="{{ !empty($section->encrypted_id) ? $section->section_headline : '' }}" placeholder="Enter Headline" />
                                    @error('section_headline')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter Description" >{{ !empty($section->encrypted_id) ? htmlspecialchars_decode($section->description) : '' }}</textarea>
                                </div>
                                @if(empty($enc_parent_section))
                                <div class="col-12">
                                    <label for="table_content" class="col-form-label">Table Content</label>
                                    <textarea name="table_content" id="table_content" cols="30" rows="5" class="form-control" placeholder="Enter Content" >{{ !empty($section->encrypted_id) ? htmlspecialchars_decode($section->table_content) : '' }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="footer_description" class="col-form-label">Footer Description</label>
                                    <textarea name="footer_description" id="footer_description" cols="30" rows="5" class="form-control" placeholder="Enter Footer Description" >{{ !empty($section->encrypted_id) ? htmlspecialchars_decode($section->footer_description) : '' }}</textarea>
                                </div>
                                @endif
                                <div class="col-12">
                                    <label for="button_name" class="col-form-label">Button</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="button_name" name="button_name" value="{{ !empty($section->encrypted_id) ? $section->button_name : '' }}" placeholder="Enter Name">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="button_link" name="button_link" value="{{ !empty($section->encrypted_id) ? $section->button_link : '' }}" placeholder="Enter Link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-12">
                                <label for="section_image" class="col-form-label">Section Image</label>
                                @if(!empty($section->encrypted_id) && !empty($section->section_image))
                                <div class="my-3">
                                    <img src="{{ asset($section->section_image) }}" alt="Section_Image" class="rounded" height="50px" width="50px">
                                </div>
                                @endif
                                <input class="form-control" type="file" id="section_image" name="section_image" accept="image/*" />
                            </div>
                        </div>
                    </div>
                    <div class="demo-inline-spacing">
                        <input type="submit" value="{{ !empty($section->encrypted_id) ? 'Update Section' : 'Add Section' }}" class="btn btn-primary" />
                        @if(isset($enc_parent_section) && !empty($enc_parent_section))
                        <a href="{{ route('get.service.sub.sections', ["service" => $enc_service, "parent" => $enc_parent_section]) }}" class="btn btn-outline-secondary">Back</a>
                        @else
                        <a href="{{ route('get.service.sections', $enc_service) }}" class="btn btn-outline-secondary">Back</a>
                        @endif
                    </div>
                </div>
            </div>
            <!--/ Hoverable Table rows -->
        </form>
    </div>
</div>
@endsection
