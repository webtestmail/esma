@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title', 'Dashboard')
@section('content')
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
           @include('user-dashboard.components.dashboard-sidebar')

            <!-- Main Content Area -->
            <div class=" col-md-12 col-sm-12 col-lg-9 mainContent-col">
                <div class="dashboard-content">

                 @include('user-dashboard.components.dashboard-header')

                    <div class="dashboard-content-inner">
                        <div class="c-spacer__horizontal my-4"></div>
                        <h2 class="dashboard-page-title mb-4">Dashboard Overview</h2>
                        <!-- Stats Cards -->
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="dashboard-stat-card">
                                    <p class="dashboard-page-subtitle">How To Edit Your Profile</p>
                                    <div class="c-spacer__horizontal my-3"></div>
                                    <div class="edit-profile-demo">
                                        <img src="{{ asset('images/p-dash-edit-profile.png') }}" alt="" class="img-fluid w-100">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12 mb-4 d-none d-lg-inline-block">
                                <div class="dashboard-stat-card">
                                    <p class="dashboard-page-subtitle">How To Edit Your Profile</p>
                                    <div class="c-spacer__horizontal my-3"></div>
                                    <div class="accordion" id="accordionHelp">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="false" aria-controls="collapseOne">
                                                    How to Lorem Ipsum?
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. A, ad!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    How to Lorem Ipsum Consectur?
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis,
                                                    mollitia?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    How to Lorem Adiscpling Amet?
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
                                                    omnis.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    How to Lorem Ipsum Consectur?
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
                                                    omnis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="dashboard-stat-card">
                                    <p class="dashboard-page-subtitle">Company Contacts Clicks</p>
                                    <div class="c-spacer__horizontal my-3"></div>
                                    <img src="../images/p-dash-chart-1.png" alt="">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="dashboard-stat-card">
                                    <p class="dashboard-page-subtitle">Points Of Contacts Clicks</p>
                                    <div class="c-spacer__horizontal my-3"></div>
                                    <img src="../images/p-dash-chart-2.png" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="dashboard-card">
                                    <p class="dashboard-page-subtitle">Points Of Contacts Clicks</p>
                                    <div class="c-spacer__horizontal my-3"></div>
                                    <img src="../images/p-dash-chart-3.png" alt="">
                                </div>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <div class="dashboard-card">
                                    <p class="dashboard-page-subtitle">Social Media Clicks</p>
                                    <div class="c-spacer__horizontal my-3"></div>
                                    <img src="../images/p-dash-chart-4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashlast-login text-end"><b>Last Login</b> Yesterday at 3:22 PM</div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
