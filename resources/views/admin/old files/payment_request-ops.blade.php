@extends('admin.layouts.admin-layout')

@section('page-content')
<style>
    .error{
        color:orange;
    }
</style>
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($paymentRequest->encrypted_id) ? route('admin.edit.payment_requests', $paymentRequest->encrypted_id) : route('admin.add.brand') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Payment Requests</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_payment_requests') }}">All Requests</a></li>
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
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="text-primary">Processing Payment for: {{ $paymentRequest->user->username }}</h5>
                    <p><strong>Amount:</strong> ₹{{ number_format($paymentRequest->amount/100, 2) }}</p>
                    <p><strong>Bank:</strong> {{ $paymentRequest->bank->bank_name }} ({{ $paymentRequest->bank->account_number }})</p>
                    <p><strong>Account Holder Name:</strong> {{ $paymentRequest->bank->account_holder_name }}</p>
                    <p><strong>IFSC Code:</strong> {{ $paymentRequest->bank->ifsc_code }}</p>
                    <p><strong>Type:</strong> {{ $paymentRequest->bank->account_type }}</p>
                    
                    <h5 class="text-primary">Wallet Balance: ₹{{ number_format($paymentRequest->user->wallet->balance,2) }}</h5>
                    </br>
                    <h5 class="text-primary">User Note:</h5>
                     <p> {{ $paymentRequest->user_note }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Update Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                             <option value="Approved" {{ $paymentRequest->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pending" {{ $paymentRequest->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ $paymentRequest->status == 'Paid' ? 'selected' : '' }}>Mark as Paid</option>
                            <option value="Rejected" {{ $paymentRequest->status == 'Rejected' ? 'selected' : '' }}>Reject Request</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Note / Transaction ID</label>
                        <textarea name="admin_note" class="form-control" rows="3" 
                                  placeholder="Enter UTR number or reason for rejection">{{ $paymentRequest->admin_note }}</textarea>
                        @error('admin_note')<span class="error">{{$message}}</span>@enderror
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
