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
                        <h5 class="m-b-10">FAQs</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_faqs') }}">All FAQs</a></li>
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
                                    <label for="faq_type" class="form-label">FAQ Type <span
                                            class="text-danger">*</span></label>
                                    <select name="faq_type" id="faq_type" class="form-select">
                                        @if (!empty($plan->encrypted_id))
                                            <option value="pricing_page"
                                                {{ $plan->faq_type == 'pricing_page' ? 'selected' : '' }}>Pricing
                                                Page
                                            </option>
                                            <option value="contact_page"
                                                {{ $plan->faq_type == 'contact_page' ? 'selected' : '' }}>
                                                Contact Page
                                            </option>
                                        @else
                                            <option value="pricing_page" selected>Pricing Page</option>
                                            <option value="contact_page">Contact Page</option>
                                        @endif
                                    </select>
                                    @error('faq_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="question" class="form-label">FAQ Question <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="question" name="question"
                                        value="{{ !empty($faq->encrypted_id) ? $faq->question : old('question') }}"
                                        placeholder="Enter Question" />
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="answer" class="form-label">Answer <span
                                            class="text-danger">*</span></label>
                                    <textarea name="answer" id="answer" cols="30" rows="10" class="form-control" placeholder="Enter Answer">{{ !empty($faq->encrypted_id) ? htmlspecialchars_decode($faq->answer) : old('answer') }}</textarea>
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
