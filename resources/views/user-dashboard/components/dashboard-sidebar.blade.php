 <div class="col-md-12 col-sm-12 col-lg-3 sidebar-col">
                <!-- Dashboard Sidebar -->
                <aside class="dashboard-sidebar">
                
                    <div class="dashboard-sidebar-user">
                        <div class="side-user-img">
                            <img src="{{ $user->userprofile->image ?? asset('images/company-m-img.png') }}" alt="User Avatar" class="dashboard-sidebar-avatar">
                        </div>
                        <div class="side-user-content">
                            <div class="side-use-logo"><img src="{{ asset($user->userprofile->brand_logo ?? 'images/c-brands__circles.png') }}" alt=""></div>
                            <div class="dashboard-sidebar-name">{{ $user->application->company_name  }}</div>
                            <div class="dashboard-sidebar-email">{{ $user->userprofile->slogan ?? 'No slogan provided' }}</div>
                            <a href="{{ route('view-profile',[$user->userprofile->slug]) }}" class="btn-style-1"> <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-eye"></use></svg> View Profile</a>
                        </div>
                    </div>
                    
                    <hr style>

                    <nav>
                        <ul class="dashboard-nav">
                            <li class="dashboard-nav-item">
                                <a href="{{ route('my-dashboard') }}" class="dashboard-nav-link">
                                    <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-dashboard"></use></svg>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="dashboard-nav-item">
                                <a href="{{ route('edit-profile') }}" class="dashboard-nav-link">
                                    <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-user-edit"></use></svg>
                                    <span>Edit Profile</span>
                                </a>
                            </li>

                            <li class="dashboard-nav-item">
                                <a href="{{ route('events') }}" class="dashboard-nav-link">
                                    <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-event-calender"></use></svg>
                                    <span>Events</span>
                                </a>
                            </li>

                            <li class="dashboard-nav-item">
                                <a href="{{ route('library') }}" class="dashboard-nav-link">
                                    <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-library"></use></svg>
                                    <span>Library</span>
                                </a>
                            </li>

                            <li class="dashboard-nav-item">
                                <a href="{{ route('users') }}" class="dashboard-nav-link">
                                    <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-users"></use></svg>
                                    <span>Users</span>
                                </a>
                            </li>

                            <li class="dashboard-nav-item">
                                <a href="{{ route('member-help-center') }}" class="dashboard-nav-link">
                                    <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-help-support"></use></svg>
                                    <span>Help Center</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <ul class="dashboard-nav logout-nav">
                        <li class="dashboard-nav-item">
                            <a href="{{ route('logout') }}" class="dashboard-nav-link">
                                <svg class="svg-icon"><use href="../images/icons/icons-sprite.svg#icon-logout"></use></svg>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>

                </aside>           
            </div>