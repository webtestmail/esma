@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quick Modules</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Manage Quick Modules</li>
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
                        <a href="{{ route('admin.add.quick_module') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Module</span>
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
                                <table class="table table-hover" id="proposalList">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Show on Dashboard(s)</th>
                                            <th>Module Headline</th>
                                            <th>Module Position</th>
                                            <th>Module Images</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sno = 1; @endphp
                                        @foreach ($quickModulesData as $quickModules)
                                            <tr class="single-item">
                                                <td>@php echo $sno; @endphp</td>
                                                <td>
                                                    @if(!empty($quickModules->roles))
                                                        @foreach($quickModules->roles as $role)
                                                            @if($role == 'influencer')
                                                                <span class="badge bg-primary">Influencer</span>
                                                            @elseif($role == 'brand')
                                                                <span class="badge bg-success">Brand</span>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $quickModules->headline }}</td>
                                                <td>{{ $quickModules->position_order }}</td>
                                                <td>
                                                    @if (!empty($quickModules->image))
                                                        <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                            <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                title="{{ $quickModules->headline }}">
                                                                <img src="{{ asset($quickModules->image) }}"
                                                                    class="img-fluid" alt="{{ $quickModules->headline }}" />
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input class="form-check-input c-pointer"
                                                        onclick="change_status('<?= $model ?>', <?= $sno ?>, '<?= $quickModules->encrypted_id ?>');"
                                                        type="checkbox" id="status<?= $sno ?>"
                                                        <?= $quickModules->status == 'active' ? 'checked' : '' ?>>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                                data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.edit.quick_module', ['quick_module' => $quickModules->encrypted_id]) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="delete_item('<?= $model ?>', '<?= $quickModules->encrypted_id ?>');">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $sno++; @endphp
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
    </div>
@endsection