@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($plan->encrypted_id) ? route('admin.edit.ConnectPlan', $plan->encrypted_id) : route('admin.add.ConnectfeaturePlan') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Connect Feature Plans</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.connect_plans') }}">All Connected Feature Plan</a></li>
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
                          <div class="mb-4">
    <label for="plan_name" class="form-label">Plan Name <span class="text-danger">*</span></label>
    @if(isset($plan->encrypted_id))
        <input type="hidden" name="id" value="{{ $plan->encrypted_id }}">
    @endif
    <input type="text" class="form-control" id="plan_name" name="plan_name"
           value="{{ old('plan_name', $plan->name ?? '') }}" placeholder="Enter Name" />
</div>

<div class="mb-4">
    <label class="form-label">Plan Features & Values</label>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Feature</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($features as $feature)
                    @php
                        // Find if this feature is already linked to this plan
                        $pivotData = isset($plan) ? $plan->features->where('id', $feature->id)->first() : null;
                    @endphp
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" 
                                       value="{{ $feature->id }}" id="feat_{{ $feature->id }}"
                                       {{ $pivotData ? 'checked' : '' }}>
                                <label class="form-check-label" for="feat_{{ $feature->id }}">
                                    {{ $feature->name }}
                                </label>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="feature_values[{{ $feature->id }}]" 
                                   class="form-control form-control-sm" 
                                   value="{{ $pivotData ? $pivotData->pivot->value : '' }}"
                                   placeholder="e.g. 10 or Unlimited">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
