@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Management Applications</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Manage Applications</li>
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
                    <div class="d-none d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="{{ route('admin.add.user') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Application</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
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
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script>
    $(document).ready(function () {
    new DataTable('#example', {
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        "order": [[ 8, "desc" ]],
        info: true,
        lengthChange: true,
        pageLength: 10,
        ajax: '{{ route("admin.applications.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data: 'user_id', name: 'user_id'},
            { data: 'email', name: 'email'},
            { data: 'phone', name: 'phone'},
            { data: 'email', name: 'email'},
            { data: 'phone', name: 'phone'},
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at', render: function(data, type, row) {
                if (type === 'display' || type === 'filter') {
                    return new Date(data).toLocaleString();
                }
                return data;
            }},
            { data: 'action', orderable: false, searchable: false }
        ]
    });
});

    </script>
@endsection
