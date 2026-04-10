@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
    
             <form

            action="{{ !empty($document->encrypted_id ?? null) ? route($editData, $document->encrypted_id) : route($addNewData) }}"

            method="POST" enctype="multipart/form-data">

            @csrf

            <div class="page-header sticky-top">

                <div class="page-header-left d-flex align-items-center">

                    <div class="page-header-title">

                        <h5 class="m-b-10">{{$currentPageName}} Managemnt</h5>

                    </div>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{ route($allData) }}">All {{$currentPageName}}</a></li>

                        <li class="breadcrumb-item">Create / Modify</li>

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

                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 mb-4">
                    
                            <div class="card h-100 shadow-sm">
                                <div class="card-header bg-white py-3">
                                    <h6 class="m-0 fw-bold text-primary"><i class="feather-file-plus me-2"></i>Upload New Document</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label small text-uppercase text-muted fw-bold">Document Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control" value="{{ old('title', $document->title ?? '') }}" placeholder="e.g. Annual Financial Report" required>
                                            @error('title')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small text-uppercase text-muted fw-bold">Category <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-select" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" {{ !empty($document->category_id) && $document->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small text-uppercase text-muted fw-bold">Document Year <span class="text-danger">*</span></label>
                                            <select name="document_year" class="form-select" required>
                                                @php
                                                    $currentYear = date('Y');
                                                @endphp
                                                @for($i = $currentYear; $i >= ($currentYear - 10); $i--)
                                                    <option value="{{ $i }}" {{ !empty($document->document_year) && $document->document_year == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('document_year')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label small text-uppercase text-muted fw-bold">Select File <span class="text-danger">*</span></label>
                                            <input type="file" name="document_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                            <div class="form-text">Accepted formats: PDF, Word, Excel (Max: 10MB)</div>
                                            @error('document_file')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label small text-uppercase text-muted fw-bold">Description</label>
                                            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Brief description about the document..." >{{ old('description', $document->description ?? '') }}</textarea>
                                            @error('description')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_public" id="isPublic" value="1" {{ !empty($document->is_public) && $document->is_public == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label text-muted" for="isPublic">Make this document public</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end py-3">
                    
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="feather-upload me-1"></i> Upload Document
                                    </button>
                                </div>
                            </div>
                    
                    </div>
                </div>


            </div>



            </div>
         
        </form>
    </div>
    <script>
    document.querySelectorAll('.role-check').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // Uncheck all other checkboxes with the same class
                document.querySelectorAll('.role-check').forEach(other => {
                    if (other !== this) other.checked = false;
                });
            }
        });
    });
    

    
</script>
@endsection
