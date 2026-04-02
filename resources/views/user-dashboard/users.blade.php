@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title','Users - ESMA International Network')
@section('content')
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('user-dashboard.components.dashboard-sidebar')

            <!-- Main Content Area  -->
            <div class="col-lg-9 mainContent-col">
                <div class="dashboard-content">


                    @include('user-dashboard.components.dashboard-header')

                    <div class="dashboard-content-inner">
                        <div class="c-spacer__horizontal my-4"></div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <h2 class="dashboard-page-title">Users</h2>
                            <a href="add-user.php" class="dashboard-page-title d-flex gap-1"> <svg class="svg-icon">
                                    <use href="../images/icons/icons-sprite.svg#icon-user-plus"></use>
                                </svg> <span class="user-title">Add User</span>
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="dashboard-stat-card">

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="user-row">
                                                <td>
                                                    <div class="user-cell username">laures</div>
                                                </td>
                                                <td>
                                                    <div class="user-cell name">Laures Ronak</div>
                                                </td>
                                                <td>
                                                    <div class="user-cell email">lronak@loacker.com</div>
                                                </td>
                                                <td class="text-end">
                                                    <button class="user-del-btn icon-only">
                                                        <svg class="svg-icon" style="width:16px;height:16px;">
                                                            <use href="../images/icons/icons-sprite.svg#icon-bin-small">
                                                            </use>
                                                        </svg> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="user-row">
                                                <td>
                                                    <div class="user-cell username">laures</div>
                                                </td>
                                                <td>
                                                    <div class="user-cell name">Laures Ronak</div>
                                                </td>
                                                <td>
                                                    <div class="user-cell email">lronak@loacker.com</div>
                                                </td>
                                                <td class="text-end">
                                                    <button class="user-del-btn icon-only">
                                                        <svg class="svg-icon" style="width:16px;height:16px;">
                                                            <use href="../images/icons/icons-sprite.svg#icon-bin-small">
                                                            </use>
                                                        </svg> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="dashboard-card text-center">
                                    <div class="dashboard-card-body">
                                        <img src="../images/logo-colord.png" alt="Profile Picture"
                                            style="width: 150px; height: 150px; border-radius: 50%; margin-bottom: 20px; border: 4px solid var(--primary-300);">
                                        <h3 style="color: var(--primary-600); margin-bottom: 10px;">John Doe</h3>
                                        <p style="color: var(--gray-900); margin-bottom: 20px;">Member since 2024</p>
                                        <a href="edit-profile.php" class="dashboard-btn dashboard-btn-primary">
                                            <i class="bi bi-pencil"></i> Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 mb-4">
                                <div class="dashboard-card">
                                    <div class="dashboard-card-header">
                                        <h3 class="dashboard-card-title">Personal Information</h3>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Full Name:</strong>
                                                <p>John Doe</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Email:</strong>
                                                <p>john.doe@esma.org</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Phone:</strong>
                                                <p>+353 (87) 444 2121</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Company:</strong>
                                                <p>ESMA International</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Position:</strong>
                                                <p>Senior Member</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Location:</strong>
                                                <p>Dublin, Ireland</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dashboard-card mt-4">
                                    <div class="dashboard-card-header">
                                        <h3 class="dashboard-card-title">Membership Details</h3>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Member ID:</strong>
                                                <p>ESMA-2024-001234</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Membership Type:</strong>
                                                <p><span class="dashboard-badge dashboard-badge-primary">Premium</span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Join Date:</strong>
                                                <p>January 15, 2024</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong style="color: var(--primary-500);">Status:</strong>
                                                <p><span class="dashboard-badge dashboard-badge-success">Active</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->


                </div>
            </div>
        </div>
    </div>
</div>

@endsection