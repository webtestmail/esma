@extends('admin.layouts.main-layout')
@section('title', 'Manage Categories')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {{-- @else
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> --}}
        @endif
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Manage Categories<a href="{{ route('add.category', $type) }}" class="btn rounded-pill btn-icon btn-outline-primary float-end" style="font-size: 1.7em;">+</span></a></h5>
            <div class="table-responsive text-nowrap px-4 pb-4">
                <table id="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            {{-- <th>Reference Type</th> --}}
                            <th>Category Headline</th>
                            <th>Category Position</th>
                            <th>Category URL</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $sno = 1; ?>
                        @foreach($categoriesData as $categories)
                        <tr>
                            <td><?= $sno; ?>.</td>
                            {{-- <td>
                                @if($categories->reference_type == 'blog')
                                Blogs
                                @else
                                Others
                                @endif
                            </td> --}}
                            <td><strong>{{ $categories->category_headline }}</strong></td>
                            <td>{{ $categories->position_order }}</td>
                            <td>
                                <a href="{{ route("all.category.blogs", $categories->category_url) }}">
                                    <small><strong>{{ $categories->category_headline }}</strong></small>
                                </a>
                            </td>
                            <td>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input status_button" onclick="change_status('<?= $model; ?>', <?= $sno; ?>, '<?= $categories->encrypted_id; ?>');" type="checkbox" id="status<?= $sno; ?>" <?= $categories->status == 'active' ? 'checked' : ''; ?> />
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('edit.category', ["category" => $categories->encrypted_id, "type" => $type]) }}" >
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <button class="dropdown-item" onclick="delete_item('<?= $model; ?>', '<?= $categories->encrypted_id; ?>');" >
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $sno++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
</div>
@endsection

@section('admin-custom-js')
<script>
    $("#table").DataTable();
</script>
@endsection
