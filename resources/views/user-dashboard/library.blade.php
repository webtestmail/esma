@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title','Library - ESMA International Network')
@section('content')
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row">
           @include('user-dashboard.components.dashboard-sidebar')

            <div class="col-lg-9 mainContent-col">
                <div class="dashboard-content">

                    @include('user-dashboard.components.dashboard-header')

                    <div class="dashboard-content-inner">
                        <div class="c-spacer__horizontal my-4"></div>
                        <div class="d-flex align-items-center justify-content-between w-100 mb-4">
                            <h2 class="dashboard-page-title">Library</h2>
                            <form action="" class="serach-library">
                                <i><svg class="svg-icon">
                                        <use href="../images/icons/icons-sprite.svg#icon-search"></use>
                                    </svg></i>
                                <input type="text" placeholder="Search Files">
                            </form>
                        </div>

                        <div class="dashboard-stat-card library-filter">

                            <!-- CATEGORY FILTER -->
                            <div class="library-filter-wrapper">
                                <button class="prevarrow">
                                    <svg class="svg-icon arrow-svg"><use href="../images/icons/icons-sprite.svg#icon-angle-left"></use></svg>
                                </button>
                                <ul class="library-filter-category list-unstyled mb-0">
                                    <li class="active" data-filter="all">All</li>
                                    @foreach($documentCategories as $category)
                                        <li data-filter="cat{{ $category->id }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                                <button class="nextvarrow">
                                    <svg class="svg-icon arrow-svg"><use href="../images/icons/icons-sprite.svg#icon-angle-right"></use></svg>
                                </button>
                            </div>


                            <!-- FILTERED CONTENT -->
                            <ul class="library-filtered-content list-unstyled mt-4">
                            @foreach($documents as $document)
                                <li data-category="cat{{ $document->documentcategory->id }}">
                                    <div class="icon"><svg class="svg-icon">
                                            <use href="../images/icons/icons-sprite.svg#icon-megaphone"></use>
                                        </svg></div>
                                    <div class="text">{{ $document->title }}</div>
                                    <div class="text-info">
                                        <div class="date-info">
                                            <i class="bi bi-calendar-check"></i>{{ $document->created_at->format('M d, Y') }}
                                        </div>
                                        <div class="file-size">{{ $document->file_size }}</div>
                                        <div class="file-format">.{{ $document->file_type }}</div>
                                    </div>
                                    <div class="file-btn">
                                        <a href="{{ $document->file_path }}" target="_blank"> <svg class="svg-icon me-2">
                                                <use href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                </use>
                                            </svg> Download</a>
                                    </div>
                                </li>
                            @endforeach
                      
                            </ul>
                        </div>


                    </div>




                    <!-- Library Content -->
                    <!-- 
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="dashboard-card">
                                <div class="dashboard-card-header">
                                    <h3 class="dashboard-card-title">My Documents</h3>
                                    <a href="#" class="dashboard-btn dashboard-btn-primary">
                                        <i class="bi bi-upload"></i> Upload Document
                                    </a>
                                </div>
                                <div class="dashboard-card-body">
                                    <table class="dashboard-table">
                                        <thead>
                                            <tr>
                                                <th>Document Name</th>
                                                <th>Category</th>
                                                <th>Upload Date</th>
                                                <th>Size</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-pdf"
                                                        style="color: var(--error); margin-right: 8px;"></i>
                                                    <strong>Annual Report 2025.pdf</strong>
                                                </td>
                                                <td><span class="dashboard-badge dashboard-badge-primary">Reports</span>
                                                </td>
                                                <td>Feb 10, 2026</td>
                                                <td>2.5 MB</td>
                                                <td>
                                                    <a href="#" class="dashboard-icon-btn" title="Download">
                                                        <i class="bi bi-download"></i>
                                                    </a>
                                                    <a href="#" class="dashboard-icon-btn" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-word"
                                                        style="color: var(--info); margin-right: 8px;"></i>
                                                    <strong>Meeting Minutes.docx</strong>
                                                </td>
                                                <td><span class="dashboard-badge dashboard-badge-info">Minutes</span>
                                                </td>
                                                <td>Feb 8, 2026</td>
                                                <td>1.2 MB</td>
                                                <td>
                                                    <a href="#" class="dashboard-icon-btn" title="Download">
                                                        <i class="bi bi-download"></i>
                                                    </a>
                                                    <a href="#" class="dashboard-icon-btn" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-excel"
                                                        style="color: var(--success); margin-right: 8px;"></i>
                                                    <strong>Budget 2026.xlsx</strong>
                                                </td>
                                                <td><span class="dashboard-badge dashboard-badge-success">Finance</span>
                                                </td>
                                                <td>Feb 5, 2026</td>
                                                <td>850 KB</td>
                                                <td>
                                                    <a href="#" class="dashboard-icon-btn" title="Download">
                                                        <i class="bi bi-download"></i>
                                                    </a>
                                                    <a href="#" class="dashboard-icon-btn" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="bi bi-file-image"
                                                        style="color: var(--warning); margin-right: 8px;"></i>
                                                    <strong>Event Photos.zip</strong>
                                                </td>
                                                <td><span class="dashboard-badge dashboard-badge-warning">Media</span>
                                                </td>
                                                <td>Feb 3, 2026</td>
                                                <td>15.3 MB</td>
                                                <td>
                                                    <a href="#" class="dashboard-icon-btn" title="Download">
                                                        <i class="bi bi-download"></i>
                                                    </a>
                                                    <a href="#" class="dashboard-icon-btn" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Storage Info -->
                    <!-- 
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="dashboard-stat-card">
                                <div class="dashboard-stat-icon primary">
                                    <i class="bi bi-hdd"></i>
                                </div>
                                <div class="dashboard-stat-value">19.9 GB</div>
                                <div class="dashboard-stat-label">Used of 50 GB</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dashboard-stat-card">
                                <div class="dashboard-stat-icon secondary">
                                    <i class="bi bi-files"></i>
                                </div>
                                <div class="dashboard-stat-value">567</div>
                                <div class="dashboard-stat-label">Total Documents</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dashboard-stat-card">
                                <div class="dashboard-stat-icon success">
                                    <i class="bi bi-folder"></i>
                                </div>
                                <div class="dashboard-stat-value">24</div>
                                <div class="dashboard-stat-label">Categories</div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const filterButtons = document.querySelectorAll(".library-filter-category li");
        const items = document.querySelectorAll(".library-filtered-content li");

        filterButtons.forEach(btn => {
            btn.addEventListener("click", function () {

                // remove active
                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");

                const filterValue = this.getAttribute("data-filter");

                items.forEach(item => {
                    if (filterValue === "all" || item.getAttribute("data-category") ===
                        filterValue) {
                        item.style.display = "flex";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });

    });
</script>

@endsection