@php 

            $user = Auth::user();
           
           
@endphp
<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('admin.my-dashboard') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset(Session::get('company_logo')) }}" alt="{{ Session::get('company_name') }}"
                    class="logo logo-lg" height="90px" width="90%" style="padding: 10px;" />
                <img src="{{ asset(Session::get('company_icon')) }}" alt="{{ Session::get('company_name') }}"
                    class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('admin.my-dashboard') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>
                @if( $user->getIsAdminAttribute())
                <!-- <li class="nxl-item nxl-hasmenu d-none">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard Quick Modules</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.quick_modules') }}">Manage Quick
                                Modules</a>
                        </li>
                    </ul>
                </li> -->
                @endif
                @if($user->getIsAdminAttribute())
                <li class="nxl-item nxl-hasmenu d-none">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Influencer Dashboard</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        {{-- <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.features', 'influencer') }}">Manage Features</a>
                        </li> --}}
                        {{-- <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.quick_modules', 'influencer') }}">Manage Quick Modules</a>
                        </li> --}}
                    </ul>
                </li>
                @endif
                @if($user->getIsAdminAttribute())
                <li class="nxl-item nxl-hasmenu d-none">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Brand Dashboard</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.features', 'brand') }}">Manage Features</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($user->getIsAdminAttribute())
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-image"></i></span>
                        <span class="nxl-mtext">Banners</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_banners') }}">Manage Banners</a>
                        </li>
                    </ul>
                </li>
                @endif
            
                 @if($user->getIsHr() || $user->getIsAdminAttribute())
                <li class="nxl-item nxl-hasmenu d-none">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                        <span class="nxl-mtext">Payments</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
               
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_payment_requests') }}">Manage Payment Requests</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($user->getIsAdminAttribute())
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-users"></i></span>
                        <span class="nxl-mtext">Users & Applications</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_users') }}">Manage Users</a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_applications') }}">Manage Applications</a>
                        </li>
                    </ul>
                </li>
               
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-file-text"></i></span>
                        <span class="nxl-mtext">Pages</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_pages') }}">Manage Pages</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                        <span class="nxl-mtext">Resources Hub</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_services') }}">Manage Services</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-file-text"></i></span>
                        <span class="nxl-mtext">Articles & Reports</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_blogs') }}">Manage Blogs</a>
                        </li>
                    </ul>
                </li>
                 <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-file-text"></i></span>
                        <span class="nxl-mtext">Event Hub<span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_events') }}">Manage Events</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layers"></i></span>
                        <span class="nxl-mtext">Membership Plans</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_plans') }}">Manage Plans</a>
                        </li>
                    </ul>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.feature_plans') }}">Feature Plans</a>
                        </li>
                    </ul>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.connect_plans') }}">Connect Plans</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu d-none">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-tag"></i></span>
                        <span class="nxl-mtext">Brands</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_brands') }}">Manage Brands</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Team</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_team') }}">Manage Team</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-help-circle"></i></span>
                        <span class="nxl-mtext">FAQs</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_faqs') }}">Manage FAQs</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-message-circle"></i></span>
                        <span class="nxl-mtext">Testimonials</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_testimonials') }}">Manage
                                Testimonials</a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-settings"></i></span>
                        <span class="nxl-mtext">Master</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_member_categories') }}">Member Category</a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_countries') }}">Country</a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_trade_sectors') }}">Trade Sectors</a>
                        </li> 
                                      <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_product_categories') }}">Product Category</a>
                        </li> 
                                      <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_temperatures') }}">Temperature</a>
                        </li> 
                                      <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_brands') }}">Brand</a>
                        </li> 
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-settings"></i></span>
                        <span class="nxl-mtext">Settings</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_company') }}">Manage Company</a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_contact') }}">Manage Contact</a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('admin.manage_socials') }}">Manage Socials</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!--! ================================================================ !-->
<!--! [End]  Navigation Manu !-->
<!--! ================================================================ !-->
