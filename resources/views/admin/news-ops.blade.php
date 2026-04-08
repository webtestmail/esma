@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($news->encrypted_id) ? route('admin.edit.news', $news->encrypted_id) : route('admin.add.news') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">News</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.managenews') }}">All News</a></li>
                        <li class="breadcrumb-item">Create/Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="{{ route('admin.managenewsCategory') }}" class="page-header-right-close-toggle">
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

                            <div class="mb-4">
                                <label class="form-label">Header Footer Name </label>
                                <input type="text" class="form-control" id="header_footer_name" name="header_footer_name" placeholder="Enter Header Footer Name" value="{{ !empty($news->encrypted_id) ? $news->header_footer_name : old('header_footer_name') }}" />
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="name" name="name"placeholder="Enter Name" />{{ !empty($news->encrypted_id) ? $news->name : old('name') }}</textarea>
                                     @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            {{-- SLUG --}}
                            <div class="mb-4">
                                <label class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ !empty($news->encrypted_id) ? $news->slug : old('slug') }}"
                                    placeholder="Enter Slug" />
                                     @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            {{-- ORDER --}}
                          <div class="row">

                                {{-- ORDER --}}
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Position</label>
                                    <input type="number" class="form-control" name="position_order"
                                        value="{{ !empty($news->encrypted_id) ? $news->position_order : old('position_order') }}"
                                        placeholder="Enter Order" />
                                </div>

                                {{-- CATEGORY DROPDOWN --}}
                                <div class="col-md-8 mb-4">
                                    <label class="form-label">Categories</label>

                                    @php
                                        $selectedCategories = !empty($news->category_ids)
                                            ? explode(',', $news->category_ids)
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

                            </div>
                            {{-- TITLE --}}
                            <div class="mb-4">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ $news->title ?? old('title') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Breadcrumb Image</label>
                                 @if (!empty($news->encrypted_id) && !empty($news->breadcrumb_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                    @php
                                                        $ext = pathinfo($news->breadcrumb_image, PATHINFO_EXTENSION);
                                                        $isVideo = in_array(strtolower($ext), ['mp4', 'webm', 'ogg']);
                                                    @endphp
                                                  @if ($isVideo)
                                                        <!-- Show video thumbnail -->
                                                        <a href="javascript:void(0)"
                                                        class="avatar-image avatar-md"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover"
                                                        title="{{ $news->breadcrumb_image }}">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset($news->breadcrumb_image) }}" type="video/{{ $ext }}">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </a>
                                                    @else
                                                        <!-- Show image -->
                                                        <a href="javascript:void(0)"
                                                        class="avatar-image avatar-md"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover"
                                                        title="{{ $news->breadcrumb_image }}">
                                                            <img src="{{ asset($news->breadcrumb_image) }}" class="img-fluid" alt="image" />
                                                        </a>
                                                    @endif
                                            </div>
                                        </div>
                                    @endif
                                <input type="file" class="form-control" name="breadcrumb_image">
                            </div>

                             <div class="mb-4">
                                <label class="form-label">Breadcrumb Description</label>
                                <textarea class="form-control" name="breadcrumb_description">{{ $news->breadcrumb_description ?? old('breadcrumb_description') }}</textarea>
                            </div>


                             {{-- BANNER --}}
                            <div class="mb-4">
                                <label class="form-label">Banner</label>
                                 @if(!empty($news->banner))
                                    <div class="mt-2">
                                        <img src="{{ asset($news->banner) }}" 
                                            alt="Banner" 
                                            style="max-height: 50px; border-radius: 6px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" name="banner">
                            </div>

                            {{-- SUBTITLE --}}
                            <div class="mb-4">
                                <label class="form-label">Subtitle</label>
                                <textarea class="form-control" name="subtitle">{{ $news->subtitle ?? old('subtitle') }}</textarea>
                            </div>

                             {{-- IMAGE --}}
                            <div class="mb-4">
                                <label class="form-label">Image</label>
                                @if(!empty($news->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($news->image) }}" 
                                            alt="Image" 
                                            style="max-height: 50px; border-radius: 6px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" name="image">
                            </div>
                            {{-- VIDEO --}}
                            <div class="mb-4">
                                <label class="form-label">Video URL</label>
                                <input type="text" class="form-control" name="video"
                                    value="{{ $news->video ?? old('video') }}">
                            </div>

                           
                            {{-- SHORT DESCRIPTION --}}
                            <div class="mb-4">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description">{{ $news->short_description ?? old('short_description') }}</textarea>
                            </div>

                           

                            {{-- IMAGE 1 --}}
                            <div class="mb-4">
                                <label class="form-label">Other Image</label>
                                 @if(!empty($news->image1))
                                    <div class="mt-2">
                                        <img src="{{ asset($news->image1) }}" 
                                            alt="Image" 
                                            style="max-height: 50px; border-radius: 6px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" name="image1">
                            </div>


                            {{-- DESCRIPTION --}}
                            <div class="mb-4">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ $news->description ?? old('description') }}</textarea>
                            </div>


                             {{-- MORE IMAGES --}}
                              <div class="mb-4">
                                    <label for="more_images" class="form-label">More Images </label>
                                    @if (!empty($news->encrypted_id) && !empty($news->more_images))
                                        @php
                                            $more_images = json_decode($news->more_images);
                                        @endphp
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                @foreach ($more_images as $image)
                                                    <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        title="More Images">
                                                        <img src="{{ asset($image) }}" class="img-fluid"
                                                            alt="image" />
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="more_images" name="more_images[]"
                                        accept="image/*" multiple />
                        
                                </div>
                            {{-- FULL DESCRIPTION --}}
                            <div class="mb-4">
                                <label class="form-label">Full Description</label>
                                <textarea class="form-control" name="full_description">{{ $news->full_description ?? old('full_description') }}</textarea>
                            </div>

                           
                           <div class="mb-4">
                                <label class="form-label">Website Name</label>
                                <input type="text" class="form-control" name="website_name"
                                    value="{{ $news->website_name ?? old('website_name') }}">
                            </div>
                            {{-- WEBSITE URL --}}
                            <div class="mb-4">
                                <label class="form-label">Website URL</label>
                                <input type="text" class="form-control" name="website_url"
                                    value="{{ $news->website_url ?? old('website_url') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags"
                                    value="{{ $news->tags ?? old('tags') }}">
                            </div>

                               <div class="mb-4">
                                <label class="form-label">Author Name</label>
                                <input type="text" class="form-control" name="published_by"
                                    value="{{ $news->published_by ?? old('published_by') }}">
                            </div>


                             <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active"
                                            {{ (!empty($news->encrypted_id) ? $news->status : old('status', 'active')) == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive"
                                            {{ (!empty($news->encrypted_id) ? $news->status : old('status')) == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                             {{-- <div class="mb-4">
                                <label class="form-label">Post Meta</label>
                                <textarea class="form-control" name="post_meta">{{ $news->post_meta ?? old('post_meta') }}</textarea>
                            </div> --}}

                               <div class="mb-4">
                                    <label for="meta_title" class="form-label">Meta Title </label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ !empty($news->encrypted_id) ? $news->meta_title : old('meta_title') }}"
                                        placeholder="Enter Title" />
                                    
                                </div>
                                <div class="mb-4">
                                    <label for="meta_keyword" class="form-label">Meta Keyword </label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                        value="{{ !empty($news->encrypted_id) ? $news->meta_keyword : old('meta_keyword') }}"
                                        placeholder="Enter Keywords" />
                                   
                                </div>
                                <div class="mb-4">
                                    <label for="meta_description" class="form-label">Meta Description </label>
                                    <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Meta Description">{{ !empty($news->encrypted_id) ? htmlspecialchars_decode($news->meta_description) : old('meta_description') }}</textarea>
                                   
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
document.getElementById('name').addEventListener('input', function() {
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
