@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
    
             <form

            action="{{ !empty($application->encrypted_id) ? route('admin.application.edit', $application->encrypted_id) : '' }}"

            method="POST" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="status" id="status_input" value="">

            <div class="page-header sticky-top">

                <div class="page-header-left d-flex align-items-center">

                    <div class="page-header-title">

                        <h5 class="m-b-10">Management Applications</h5>

                    </div>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_applications') }}">All Applications</a></li>

                        <li class="breadcrumb-item">View / Modify</li>

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
                    <div class="col-xl-7 col-lg-7 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 fw-bold text-primary"><i class="feather-briefcase me-2"></i>Business Details</h6>
                                <span class="badge {{ $application->status == 'approved' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small text-muted">Company Name</label>
                                        <p class="fw-bold">{{ $application->company_name }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small text-muted">Organization Type</label>
                                        <p class="text-capitalize">{{ $application->organization_type }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small text-muted">Contact Name</label>
                                        <p class="fw-bold">{{ $application->contact_name }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small text-muted">Website</label>
                                        <p><a href="{{ $application->website }}" target="_blank" class="text-decoration-none">{{ $application->website }} <i class="feather-external-link small"></i></a></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small text-muted">Email Address</label>
                                        <p>{{ $application->email }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small text-muted">Phone Number</label>
                                        <p>{{ $application->phone }}</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label small text-muted">Office Address</label>
                                        <p>{{ $application->address }}, {{ $application->country }}</p>
                                    </div>
                                </div>

                                <hr>
                                
                                <div class="mb-0">
                                    <label class="form-label small text-muted">Applicant Message</label>
                                    <div class="p-3 bg-light rounded italic">
                                        "{{ $application->message ?? 'No message provided.' }}"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-5 mb-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-white py-3">
                                <h6 class="m-0 fw-bold text-primary"><i class="feather-settings me-2"></i>Actions</h6>
                            </div>
                            <div class="card-body">
                                @if($application->status == 'pending')
                                    <p class="small text-muted mb-3">Review the information on the left. Once approved, credentials will be sent to <strong>{{ $application->email }}</strong>.</p>
                                   <div class="d-grid gap-2">
                                        <button type="button" onclick="submitStatus('approved')" class="btn btn-success py-2">
                                            <i class="feather-check-circle me-1"></i> Approve & Create Member
                                        </button>
                                        <button type="button" onclick="submitStatus('rejected')" class="btn btn-outline-danger">
                                            <i class="feather-x-circle me-1"></i> Reject Application
                                        </button>
                                    </div>
                                @else
                                    <div class="text-center py-3">
                                        <i class="feather-info text-info display-4 mb-2"></i>
                                        <h5>Already Processed</h5>
                                        <p class="text-muted">This application was marked as <strong>{{ $application->status }}</strong> on {{ $application->updated_at->format('F j, Y') }}.</p>
                                        @if($application->user_id)
                                            <a href="{{ route('admin.user.edit', encrypt($application->user_id)) }}" class="btn btn-primary btn-sm">View Linked User Account</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card shadow-sm">
                            <div class="card-body p-3">
                                <ul class="list-unstyled small mb-0">
                                    <li class="mb-2"><strong>Submitted:</strong> {{ $application->created_at->diffForHumans() }}</li>
                                    <!-- <li><strong>IP Address:</strong> {{ $application->ip_address ?? 'N/A' }}</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
         
        </form>
    </div>
    <script>
   function submitStatus(value) {

    document.getElementById('status_input').value = value;
    
  
    if(confirm("Are you sure you want to " + value + " this application?")) {
      
        document.getElementById('statusForm').submit();
    }
}
</script>
   
@endsection
