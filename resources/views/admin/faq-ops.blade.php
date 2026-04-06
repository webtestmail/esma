@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($faq->encrypted_id) ? route('admin.edit.faq', $faq->encrypted_id) : route('admin.add.faq') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Page</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_faqs') }}">All Faq</a></li>
                        <li class="breadcrumb-item">Create/Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="{{ route('admin.manage_faqs') }}" class="page-header-right-close-toggle">
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
                                <input type="hidden" name="faq" value="{{ !empty($faq->encrypted_id) ? $faq->encrypted_id : ''}}">
                                <div class="mb-4">
                                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($category as $cat)
                                        <option value="{{ $cat->id }}"
                                        {{ (!empty($faq->encrypted_id) && $faq->category_id == $cat->id) || old('category') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                 <div class="mb-4">
                                    <label for="page_name" class="form-label"> FAQ Type <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="faq_type" name="faq_type"
                                        value="{{ !empty($faq->encrypted_id) ? $faq->faq_type : old('faq_type') }}"
                                        placeholder="Enter FAQ Type" />
                                    @error('faq_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  
                                </div>


                                {{-- @endif --}}
                                <div class="mb-4">
                                    <label for="page_name" class="form-label"> Question <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="question" name="question"
                                        value="{{ !empty($faq->encrypted_id) ? $faq->question : old('question') }}"
                                        placeholder="Enter Question" />
                                    @error('question')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  
                                </div>

                                  <div class="mb-4">
                                    <label for="page_name" class="form-label"> Answer <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" id="answer" name="answer" rows="8" placeholder="Enter Answer" />{{ !empty($faq->encrypted_id) ? htmlspecialchars_decode($faq->answer) : old('answer') }}</textarea>
                                    @error('answer')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="position_order" class="form-label"> Position </label>
                                    <input type="number" class="form-control" id="position_order" name="position_order"
                                        value="{{ !empty($faq->encrypted_id) ? $faq->position_order : old('position_order') }}"
                                        placeholder="Enter Order" />
                                  
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
