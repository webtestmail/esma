@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Banners</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Manage Banners</li>
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
                        <a href="{{ route('admin.add.banner') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Banner</span>
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
                                            {{-- <th class="wd-30">
                                                    <div class="btn-group mb-1">
                                                        <div class="custom-control custom-checkbox ms-1">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="checkAllProposal">
                                                            <label class="custom-control-label"
                                                                for="checkAllProposal"></label>
                                                        </div>
                                                    </div>
                                                </th> --}}
                                            <th>S. No.</th>
                                            <th>Banner Headline</th>
                                            <th>Banner Position</th>
                                            <th>Banners</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sno = 1; @endphp
                                        @foreach ($bannersData as $banners)
                                            <tr class="single-item">
                                                {{-- <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox"
                                                                id="checkBox_1">
                                                            <label class="custom-control-label" for="checkBox_1"></label>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                <td>@php echo $sno; @endphp</td>
                                                <td>{!! $banners->banner_headline !!}</td>
                                                <td>{{ $banners->position_order }}</td>
                                                <td>
                                                    {{-- <a href="javascript:void(0)" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="{{ asset($banners->banner_image) }}"
                                                                alt="{{ $banners->banner_headline }}" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="text-truncate-1-line">{{ $banners->banner_headline }}</span>
                                                        </div>
                                                    </a> --}}
                                                    @if (!empty($banners->icons))
                                                        <div
                                                            class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                            @foreach ($banners->icons as $icon)
                                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                    title="{{ $icon->file_name }}">
                                                                    <img src="{{ asset($icon->file_path) }}"
                                                                        class="img-fluid" alt="{{ $icon->file_name }}" />
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input class="form-check-input c-pointer"
                                                        onclick="change_status('<?= $model ?>', <?= $sno ?>, '<?= $banners->encrypted_id ?>');"
                                                        type="checkbox" id="status<?= $sno ?>"
                                                        <?= $banners->status == 'active' ? 'checked' : '' ?>>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        {{-- <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                            data-bs-toggle="offcanvas" data-bs-target="#proposalSent">
                                                            <i class="feather feather-send"></i>
                                                        </a> --}}
                                                        {{-- <a href="proposal-view.html" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a> --}}
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                                data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.edit.banner', $banners->encrypted_id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                {{-- <li>
                                                                    <a class="dropdown-item printBTN"
                                                                        href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li> --}}
                                                                {{-- <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li> --}}
                                                                {{-- <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li> --}}
                                                                {{-- <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li> --}}
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    {{-- <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a> --}}
                                                                    <button class="dropdown-item"
                                                                        onclick="delete_item('<?= $model ?>', '<?= $banners->encrypted_id ?>');">
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
