@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($plan->encrypted_id) ? route('admin.edit.plan', $plan->encrypted_id) : route('admin.add.plan') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Plans</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_plans') }}">All Plans</a></li>
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
                                    <label for="plan_type" class="form-label">Plan Type<span
                                            class="text-danger">*</span></label>
                                    <select name="plan_type" id="plan_type" class="form-select">
                                        <option value="" selected>-- Select Plan Type --</option>
                                         @if (!empty($plan->encrypted_id))
                                            <option value="brand"
                                                {{ $plan->user_category == 'brand' ? 'selected' : '' }}>Brand
                                            </option>
                                                                                        <option value="influencer"
                                                {{ $plan->user_category == 'influencer' ? 'selected' : '' }}>Influencer
                                        @else
                                            <option value="brand">Brand</option>
                                            
                                            <option value="influencer">Influencer</option>
                                        @endif
                                        
                                    </select>
                                    @error('plan_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="plan_category" class="form-label">Plan Category <span
                                            class="text-danger">*</span></label>
                                    <select name="plan_category" id="plan_category" class="form-select">
                                        <option value="" selected>-- Select Category --</option>
                                        @if (!empty($plan->encrypted_id))
                                            <option value="starter"
                                                {{ $plan->name == 'starter' ? 'selected' : '' }}>Starter
                                            </option>
                                                                                        <option value="professional"
                                                {{ $plan->name == 'professional' ? 'selected' : '' }}>Professional
                                            </option>
                                                                                        <option value="enterprise"
                                                {{ $plan->name == 'enterprise' ? 'selected' : '' }}>Enterprise
                                            </option>
                                        @else
                                            <option value="starter">Starter</option>
                                            
                                            <option value="professional">Professional</option>
                                            <option value="enterprise">Enterprise</option>
                                        @endif
                                    </select>
                                    @error('plan_category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="plan_price" class="form-label">Plan Price <span
                                            class="text-danger">*</span></label>

                                    <input type="number" step="0.01" min="0" class="form-control" id="plan_price"
                                        name="plan_price"
                                        value="{{ !empty($plan->encrypted_id) ? $plan->price : old('plan_price') }}"
                                        placeholder="Enter Price" pattern="^\d+(\.\d{1,2})?$" />
                                    @error('plan_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <div class="mb-4">
                                    <label for="plan_price_base" class="form-label">Billing Cycle<span
                                            class="text-danger">*</span></label>
                                    <select name="plan_price_base" id="plan_price_base" class="form-select">
                                        @if (!empty($plan->encrypted_id))
                                            <option value="1"
                                                {{ $plan->billing_cycle === 1 ? 'selected' : '' }}>1
                                            </option>
                                            <option value="3"
                                                {{ $plan->billing_cycle === 3 ? 'selected' : '' }}>3 
                                            </option>
                                        @else
                                            <option value="" selected>-- Select Price Base --</option>
                                             <option value="1">1</option>
                                            <option value="3">3</option>
                                        @endif
                                    </select>
                                    @error('plan_price_base')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="plan_price_base" class="form-label">Plan per Base <span
                                            class="text-danger">*</span></label>
                                    <select name="plan_price_base" id="plan_price_base" class="form-select">
                                        @if (!empty($plan->encrypted_id))
                                            <option value="monthly"
                                                {{ $plan->plan_price_base == 'month' ? 'selected' : '' }}>Monthly
                                            </option>
                                            <option value="3 months"
                                                {{ $plan->plan_price_base == '3 months' ? 'selected' : '' }}>3 Monthly
                                            </option>
                                            <option value="yearly"
                                                {{ $plan->plan_price_base == 'yearly' ? 'selected' : '' }}>Yearly
                                            </option>
                                        @else
                                            <option value="" selected>-- Select Price Base --</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        @endif
                                    </select>
                                    @error('plan_price_base')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="currency" class="form-label">Currency<span
                                            class="text-danger">*</span></label>
                                    <select name="currency" id="currency" class="form-select">
                                        @if (!empty($plan->encrypted_id))
                                            <option value="INR"
                                                {{ $plan->currency == 'INR' ? 'selected' : '' }}>INR
                                            </option>
                                            <option value="USD"
                                                {{ $plan->currency == 'USD' ? 'selected' : '' }}>USD
                                            </option>
                                        @else
                                            <option value="" selected>-- Select Plan Currency --</option>
                                            <option value="INR">INR</option>
                                            <option value="USD">USD</option>
                                        @endif
                                    </select>
                                    @error('currency')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="button_name" class="form-label">Button Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="button_name" name="button_name"
                                        value="{{ !empty($plan->encrypted_id) ? $plan->button_name : old('button_name') }}"
                                        placeholder="Enter Name" />
                                    @error('button_name')
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
@endsection
