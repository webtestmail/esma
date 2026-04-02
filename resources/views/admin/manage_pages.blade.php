@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Pages</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Manage Pages</li>
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
                        @if (Auth::guard('admin')->user()->role == 1)
                            <a href="{{ route('admin.add.page') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>New Page</span>
                            </a>
                        @endif
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
                                            <th>Page Name</th>
                                            <th>Page Position</th>
                                            <th>Client Page URLs</th>
                                            <th>Visibility</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sno = 1; @endphp
                                        @foreach ($pagesData as $pages)
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
                                                <td>{{ $pages->page_name }}</td>
                                                <td>{{ $pages->position_order }}</td>
                                                <td>
                                                    @php
                                                        if (
                                                            empty($pages->client_page_urls) ||
                                                            $pages->client_page_urls == 'index' ||
                                                            $pages->client_page_urls == 'home'
                                                        ) {
                                                            $client_url = '/';
                                                        } else {
                                                            $client_url = '/' . $pages->client_page_urls;
                                                        }
                                                    @endphp
                                                    <a href="{{ $client_url }}">
                                                        <small><strong>{{ $pages->header_footer_name }}</strong></small>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($pages->id != 1 || Auth::guard('admin')->user()->role == 1)
                                                        <select
                                                            onchange="change_visibility('<?= $model ?>', <?= $sno ?>, '<?= $pages->encrypted_id ?>');"
                                                            id="visibility<?= $sno ?>" class="form-select form-select-sm">
                                                            <option value="header"
                                                                <?= $pages->visibility == 'header' ? 'selected' : '' ?>>
                                                                HEADER
                                                            </option>
                                                            <option value="footer"
                                                                <?= $pages->visibility == 'footer' ? 'selected' : '' ?>>
                                                                FOOTER
                                                            </option>
                                                            <option value="both"
                                                                <?= $pages->visibility == 'both' ? 'selected' : '' ?>>BOTH
                                                            </option>
                                                            <option value="none"
                                                                <?= $pages->visibility == 'none' ? 'selected' : '' ?>>NONE
                                                            </option>
                                                        </select>
                                                        <div class="text-danger" id="visibility_error<?= $sno ?>"></div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($pages->id != 1 || Auth::guard('admin')->user()->role == 1)
                                                        <input class="form-check-input c-pointer"
                                                            onclick="change_status('<?= $model ?>', <?= $sno ?>, '<?= $pages->encrypted_id ?>');"
                                                            type="checkbox" id="status<?= $sno ?>"
                                                            <?= $pages->status == 'active' ? 'checked' : '' ?>>
                                                    @endif
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
                                                                        href="{{ route('admin.edit.page', $pages->encrypted_id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="delete_item('<?= $model ?>', '<?= $pages->encrypted_id ?>');">
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
