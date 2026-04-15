    @extends('admin.layouts.admin-layout')

    @section('page-content')
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <form
                action="{{ !empty($category->encrypted_id) ? route('admin.edit.reportscategory', $category->encrypted_id) : route('admin.add.reportsCategory') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="page-header sticky-top">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Reports Cateory</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.managereportsCategory') }}">All Reports Cateory</a></li>
                            <li class="breadcrumb-item">Create/Edit</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="page-header-right-items">
                            <div class="d-flex d-md-none">
                                <a href="{{ route('admin.managereportsCategory') }}" class="page-header-right-close-toggle">
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
                                        <div class="mb-4">
                                            <label for="name" class="form-label">Category Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name"
                                                name="name"
                                                value="{{ !empty($category->encrypted_id) ? $category->name : old('name') }}"
                                                placeholder="Enter Category Name" />
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="name" class="form-label"> Slug <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="slug"
                                                name="slug"
                                                value="{{ !empty($category->encrypted_id) ? $category->slug : old('slug') }}"
                                                placeholder="Enter Slug" />
                                            @error('slug')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    {{-- @endif --}}
                                    <div class="mb-4">
                                        <label for="page_name" class="form-label"> Order </label>
                                        <input type="number" class="form-control" id="position_order" name="position_order"
                                            value="{{ !empty($category->encrypted_id) ? $category->position_order : old('position_order') }}"
                                            placeholder="Enter Order" />
                                    
                                    </div>

                                    <div class="mb-4">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active"
                                                {{ (!empty($category->encrypted_id) ? $category->status : old('status', 'active')) == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="inactive"
                                                {{ (!empty($category->encrypted_id) ? $category->status : old('status')) == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
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
    @endpush 
