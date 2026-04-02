@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Blogs</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Manage Blogs</li>
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
                        <a href="{{ route('admin.add.blog') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Blog</span>
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
                                            <th>Featured Blog</th>
                                            <th>Blog Headline</th>
                                            <th>Blog Position</th>
                                            <th>Client Blog URLs</th>
                                            <th>Written By</th>
                                            <th>Writer Images</th>
                                            <th>Blog Images</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sno = 1; @endphp
                                        @foreach ($blogsData as $blogs)
                                            <tr class="single-item">
                                                {{-- <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox"
                                                                id="checkbox_1">
                                                            <label class="custom-control-label" for="checkbox_1"></label>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                <td>@php echo $sno; @endphp</td>
                                                <td>
                                                    <input class="form-check-input" type="radio"
                                                        onclick="changeFeaturedBlog({{ $sno }}, '{{ $blogs->encrypted_id }}');"
                                                        id="featuredBlog{{ $sno }}"
                                                        {{ $blogs->is_featured == 1 ? 'disabled checked' : '' }}>
                                                </td>
                                                <td>{{ $blogs->blog_headline }}</td>
                                                <td>{{ $blogs->position_order }}</td>
                                                <td>
                                                    {{-- <a
                                                        href="{{ route('single.blog', ['category_url' => $blogs->category_url, 'blog_url' => $blogs->blog_url]) }}">
                                                        <small><strong>{{ $blogs->blog_headline }}</strong></small>
                                                    </a> --}}
                                                    <a href="{{ route('single.blog', $blogs->blog_url) }}">
                                                        <small><strong>{{ $blogs->blog_headline }}</strong></small>
                                                    </a>
                                                </td>
                                                <td><strong>{{ $blogs->written_by }}</strong></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="{{ asset($blogs->writer_image) }}"
                                                                alt="{{ $blogs->written_by }}" class="img-fluid">
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="{{ asset($blogs->blog_image) }}"
                                                                alt="{{ $blogs->blog_headline }}" class="img-fluid">
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <input class="form-check-input c-pointer"
                                                        onclick="change_status('<?= $model ?>', <?= $sno ?>, '<?= $blogs->encrypted_id ?>');"
                                                        type="checkbox" id="status<?= $sno ?>"
                                                        <?= $blogs->status == 'active' ? 'checked' : '' ?>>
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
                                                                        href="{{ route('admin.edit.blog', $blogs->encrypted_id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="delete_item('<?= $model ?>', '<?= $blogs->encrypted_id ?>');">
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

@push('page-wise-js')
    <script>
        function changeFeaturedBlog(sno, encrypted_id) {
            let token = '{{ csrf_token() }}';
            $("#featuredBlog" + sno).attr('disabled', true);
            $.ajax({
                url: "{{ route('admin.change.featured.blog') }}",
                data: {
                    '_token': token,
                    'encrypted_id': encrypted_id
                },
                type: "POST",
                dataType: 'json',
                success: function(result) {
                    if (result.status == 'done') {
                        Swal.fire({
                            icon: "success",
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function() {
                            $("#featuredBlog" + sno).attr('disabled', false);
                        }, 1500);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
    </script>
@endpush
