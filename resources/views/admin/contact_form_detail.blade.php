@extends('admin.layouts.admin-layout')

@section('page-content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Contact Messages ({{ $contacts->count() ?? 0 }})</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Contact Messages</li>
            </ul>
        </div>
    </div>

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(isset($contacts) && $contacts->count() > 0)
                    @foreach($contacts as $contact)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="mb-1">{{ $contact->subject ?? 'No Subject' }}</h5>
                                    <small class="text-white-50">
                                        <i class="feather-user me-1"></i>{{ $contact->name ?? 'Anonymous' }} 
                                        <i class="feather-mail ms-2 me-1"></i>{{ $contact->email ?? 'No email' }}
                                    </small>
                                </div>
                                <small class="text-white-50">
                                    <i class="feather-clock me-1"></i>{{ $contact->created_at->format('M d, Y h:i A') }}
                                </small>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted mb-3"><i class="feather-message-square me-2"></i>Message</h6>
                                    <p class="lead fs-6">{{ $contact->message }}</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact-actions">
                                        <a href="mailto:{{ $contact->email }}" class="btn btn-outline-primary btn-sm mb-2 w-100">
                                            <i class="feather-mail me-1"></i>Reply
                                        </a>
                                        <a href="{{ route('admin.contact.delete', $contact->id) }}" 
                                           class="btn btn-outline-danger btn-sm w-100 delete-contact"
                                           onclick="return confirm('Delete this message?')">
                                            <i class="feather-trash-2 me-1"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="feather-mail display-1 text-muted mb-4"></i>
                            <h4 class="text-muted mb-3">No contact messages yet</h4>
                            <p class="text-muted">Contact form submissions will appear here.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection