@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($report->encrypted_id) ? route('admin.edit.report', $report->encrypted_id) : route('admin.add.report') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Reports</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.managereports') }}">All Reports</a></li>
                        <li class="breadcrumb-item">Create/Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="{{ route('admin.managereports') }}" class="page-header-right-close-toggle">
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
                                {{-- @if (Auth::guard('admin')->user()->role == 1) --}}
                                   {{-- NAME --}}

                            <div class="card-body">
                            {{-- NAME FIELD --}}

                                  <div class="mb-4">
                                <label class="form-label">Header Footer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="header_footer_name" name="header_footer_name" placeholder="Enter Header Footer Name" value="{{ !empty($report->encrypted_id) ? $report->header_footer_name : old('header_footer_name') }}" />
                                @error('header_footer_name')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="name" name="name"placeholder="Enter Name" />{{ !empty($report->encrypted_id) ? $report->name : old('name') }}</textarea>
                                     @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            {{-- SLUG --}}
                            <div class="mb-4">
                                <label class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ !empty($report->encrypted_id) ? $report->slug : old('slug') }}"
                                    placeholder="Enter Slug" />
                                     @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>


                             <div class="mb-4">
                                <label class="form-label">Breadcrumb Description</label>
                                <textarea class="form-control" name="breadcrumb_description">{{ $report->breadcrumb_description ?? old('breadcrumb_description') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Breadcrumb Image</label>
                                 @if (!empty($report->encrypted_id) && !empty($report->breadcrumb_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                    @php
                                                        $ext = pathinfo($report->breadcrumb_image, PATHINFO_EXTENSION);
                                                        $isVideo = in_array(strtolower($ext), ['mp4', 'webm', 'ogg']);
                                                    @endphp
                                                  @if ($isVideo)
                                                        <!-- Show video thumbnail -->
                                                        <a href="javascript:void(0)"
                                                        class="avatar-image avatar-md"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover"
                                                        title="{{ $report->breadcrumb_image }}">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset($report->breadcrumb_image) }}" type="video/{{ $ext }}">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </a>
                                                    @else
                                                        <!-- Show image -->
                                                        <a href="javascript:void(0)"
                                                        class="avatar-image avatar-md"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover"
                                                        title="{{ $report->breadcrumb_image }}">
                                                            <img src="{{ asset($report->breadcrumb_image) }}" class="img-fluid" alt="image" />
                                                        </a>
                                                    @endif
                                            </div>
                                        </div>
                                    @endif
                                <input type="file" class="form-control" name="breadcrumb_image">
                            </div>
            
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label class="form-label">Categories</label>

                                    @php
                                        $selectedCategories = !empty($report->category_ids)
                                            ? explode(',', $report->category_ids)
                                            : [];
                                    @endphp

                                    <div class="dropdown">
                                      <button id="categoryDropdownBtn"
                                            class="form-control text-start dropdown-toggle d-flex justify-content-between align-items-center"
                                            type="button"
                                            data-bs-toggle="dropdown"
                                            style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                            
                                            <span id="dropdownText" class="text-truncate">
                                                Select Categories
                                            </span>
                                        </button>

                                       <div class="dropdown-menu w-100 p-3" style="max-height: 250px; overflow-y: auto;">
                                            @foreach($categories as $cat)
                                                <div class="form-check">
                                                    <input class="form-check-input category-checkbox"
                                                        type="checkbox"
                                                        name="category_ids[]"
                                                        value="{{ $cat->id }}"
                                                        id="cat{{ $cat->id }}"
                                                        {{ in_array($cat->id, $selectedCategories) ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="cat{{ $cat->id }}">
                                                        {{ $cat->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                 <div class="col-md-4 mb-4">
                                    <label class="form-label">Author Name</label>
                                    <input type="text" class="form-control" name="published_by"
                                        value="{{ !empty($report->encrypted_id) ? $report->published_by : old('published_by') }}"
                                        placeholder="Enter Author Name" />
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter Description" />{{ !empty($report->encrypted_id) ? $report->description : old('description') }}</textarea>
                                     @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>


                            <div class="mb-4">
                                <label class="form-label">Tags </label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter File Name" value="{{ !empty($report->encrypted_id) ? $report->tags : old('tags') }}" />
                               
                            </div>
                            <div class="mb-4">
                                <label class="form-label">File Name</label>
                                <input type="text" class="form-control" id="file_name" name="file_name" placeholder="Enter File Name" value="{{ !empty($report->encrypted_id) ? $report->file_name : old('file_name') }}" />
                                @error('file_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- PDF UPLOAD FIELD --}}
                                        <div class="mb-4">
                                            <label class="form-label"> File <span class="text-danger">*</span></label>
                                            <input type="file" 
                                                class="form-control" 
                                                id="file" 
                                                name="file" 
                                            accept=".pdf,.doc,.docx" />
                                            
                                            @if(!empty($report->encrypted_id) && $report->file)
                                                <div class="mt-2">
                                                    
                                                <a href="{{ asset($report->file) }}" target="_blank" class="btn btn-sm btn-secondary" style="
                                                    padding: 0.25rem 0.75rem !important;
                                                    font-size: 0.8rem !important;
                                                    width: auto !important;
                                                    display: inline-block !important;
                                                    white-space: nowrap !important;
                                                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                                                ">
                                                    <i class="fas fa-eye me-1"></i>View
                                                </a>
                                                </div>
                                            @endif
                                            
                                            @error('file')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                               <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active"
                                            {{ (!empty($report->encrypted_id) ? $report->status : old('status', 'active')) == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive"
                                            {{ (!empty($report->encrypted_id) ? $report->status : old('status')) == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_title" class="form-label">Meta Title </label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ !empty($report->encrypted_id) ? $report->meta_title : old('meta_title') }}"
                                        placeholder="Enter Title" />
                                    
                                </div>
                                <div class="mb-4">
                                    <label for="meta_keyword" class="form-label">Meta Keyword </label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                        value="{{ !empty($report->encrypted_id) ? $report->meta_keyword : old('meta_keyword') }}"
                                        placeholder="Enter Keywords" />
                                   
                                </div>
                                <div class="mb-4">
                                    <label for="meta_description" class="form-label">Meta Description </label>
                                    <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Meta Description">{{ !empty($report->encrypted_id) ? htmlspecialchars_decode($report->meta_description) : old('meta_description') }}</textarea>
                                   
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

@push('page-wise-js')
<script>
document.getElementById('header_footer_name').addEventListener('input', function() {
    let slug = this.value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, '') 
        .replace(/\s+/g, '-')          
        .replace(/-+/g, '-');          

    document.getElementById('slug').value = slug;
});
</script>

<script>
document.getElementById('categoryDropdown').addEventListener('change', function () {
    let selectedId = this.value;

    if (!selectedId) return;

    let checkbox = document.querySelector(`input[value="${selectedId}"]`);
    if (checkbox) {
        checkbox.checked = true;
    }
});
</script>


<script>
function updateDropdownText() {
    let selected = [];

    document.querySelectorAll('.category-checkbox:checked').forEach(el => {
        selected.push(el.nextElementSibling.innerText.trim());
    });

    let textElement = document.getElementById('dropdownText');

    if (selected.length > 0) {
        let text = selected.join(', ');

        // Limit long text
        textElement.innerText = text.length > 50 
            ? text.substring(0, 50) + '...' 
            : text;
    } else {
        textElement.innerText = 'Select Categories';
    }
}

// Run on load
updateDropdownText();

// Run on change
document.querySelectorAll('.category-checkbox').forEach(el => {
    el.addEventListener('change', updateDropdownText);
});
</script>
@endpush 
