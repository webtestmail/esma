@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
    
             <form

            action="{{ !empty($user->encrypted_id) ? route('admin.user.edit', $user->encrypted_id) : route('admin.add.user') }}"

            method="POST" enctype="multipart/form-data">

            @csrf

            <div class="page-header sticky-top">

                <div class="page-header-left d-flex align-items-center">

                    <div class="page-header-title">

                        <h5 class="m-b-10">User Managemnt</h5>

                    </div>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_users') }}">All Users</a></li>

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
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card h-100">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="feather-user me-2"></i>User Profile Information</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}">
                        @error('name')<span>{{ $message }}</span>@endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username',$user->username ?? '') }}">
                        @error('username')<span>{{ $message }}</span>@endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email',$user->email ?? '') }}">
                        @error('email')<span>{{ $message }}</span>@endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone',$user->phone ?? '') }}">
                        @error('phone')<span>{{ $message }}</span>@endif
                    </div>
                     <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password',$user->password ?? '') }}">
                        @error('password')<span>{{ $message }}</span>@endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation',$user->password ?? '') }}">
                        @error('password')<span>{{ $message }}</span>@endif
                    </div>
                  
                    <div class="col-md-6">
                        <label class="form-label small text-uppercase text-muted">User Status</label>
                        <select name="user_status" class="form-select">
                            @if(!empty($user))
                            <option value="1" class="btn-success" {{ ($user->is_active == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" class="btn-danger" {{ ($user->is_active == 0) ? 'selected' : '' }}>Inactive</option>
                            @else
                             <option value="1">Active</option>
                            <option value="0">Inactive</option>
                            @endif
                        </select>
                    </div>
                </div>
                <!-- <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h3 class="mb-4">Assign User Roles</h3>
                        
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-check form-switch p-2 border rounded">
                                    <input class="form-check-input ms-0 me-2 role-check" type="checkbox" name="role" value="3" id="role_hr" >
                                    <label class="form-check-label fw-bold" for="role_hr">HR</label>
                                </div>
                            </div>
                
                            <div class="col-md-4 col-sm-6">
                                <div class="form-check form-switch p-2 border rounded">
                                    <input class="form-check-input ms-0 me-2 role-check" type="checkbox" name="role" value="4" id="role_admin">
                                    <label class="form-check-label fw-bold" for="role_admin">Admin</label>
                                </div>
                            </div>
                
                            <div class="col-md-4 col-sm-6">
                                <div class="form-check form-switch p-2 border rounded">
                                    <input class="form-check-input ms-0 me-2 role-check" type="checkbox" name="role" value="5" id="role_bm">
                                    <label class="form-check-label fw-bold" for="role_bm">Brand Manager</label>
                                </div>
                            </div>
                
                            <div class="col-md-4 col-sm-6">
                                <div class="form-check form-switch p-2 border rounded">
                                    <input class="form-check-input ms-0 me-2 role-check" type="checkbox" name="role" value="6" id="role_im">
                                    <label class="form-check-label fw-bold" for="role_im">Influencer Manager</label>
                                </div>
                            </div>
                
                        </div>
                    
                    </div>
                </div> -->
            </div>
        </div>
    </div>


   @if(!empty($user->instagram))
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card h-100 border-start border-info border-3">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold text-info"><i class="feather-instagram me-2"></i>Instagram Insights</h6>
                @if($user->instagram?->connection_status == 1)
                    <span class="badge bg-light-success text-success">Connected</span>
                @else
                    <span class="badge bg-light-danger text-danger">Disconnected</span>
                @endif
            </div>
            <div class="card-body">
                <div class="row text-center mb-3">
                    <div class="col-6 border-end">
                        <h4 class="mb-0 fw-bold">{{ number_format($user->instagram?->followers ?? 0) }}</h4>
                        <small class="text-muted">Followers</small>
                    </div>
                    <div class="col-6">
                        <h4 class="mb-0 fw-bold">{{ $user->instagram?->engagement_rate ?? '0' }}%</h4>
                        <small class="text-muted">Engagement</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small text-muted">Connected Handle</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">@</span>
                        <input type="text" class="form-control bg-light" value="{{ $$user->instagram?->username ?? 'N/A' }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endif

   @if(isset($user) && $user->exists && $user->hasActiveSubscription())
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="m-0">Current Subscription</h6>
                            <i class="feather-package fs-4"></i>
                        </div>
                        <h3 class="fw-bold mb-1">{{ $user->hasActiveSubscription()?->plan->name ?? 'No Active Plan' }}</h3>
                        <p class="small opacity-75">Expires: {{ optional($user->hasActiveSubscription()?->ends_at)->format('d M, Y') ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm bg-warning text-dark">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="m-0">Wallet Balance</h6>
                            <i class="feather-credit-card fs-4"></i>
                        </div>
                        <h3 class="fw-bold mb-1">₹{{ number_format($user->wallet->balance ?? 0, 2) }}</h3>
                        <p class="small opacity-75 text-dark">Last Transaction: {{ $user->wallet?->updated_at->format('d M') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endif
   @if(!empty($user->encrypted_id))
    <div class="col-md-4 mb-4">
        <div class="card border-danger border-top border-3">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-danger"><i class="feather-shield me-2"></i>Security & Status</h6>
            </div>
            <div class="card-body">
                <hr>
            <div class="mb-2">
                    <label class="form-label small fw-bold">Reset User Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter new password to reset">
                    <small class="text-muted mt-1 d-block">Leave blank to keep current password.</small>
                </div>
            </div>
        </div>
    </div>
    @endif
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
