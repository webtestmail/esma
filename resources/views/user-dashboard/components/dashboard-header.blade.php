   <div class="dashboard-page-header">
                        <div class="dashboard-breadcrumb">
                            <div class="mobile-user-img d-lg-none">
                                <img src="../images/c-brands__circles.png" alt="User Avatar" class="mobile-sidebar-avatar">
                            </div>
                            <div>
                                <p>Welcome, {{$user->name}}</p>
                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                            </div>
                        </div>

                        <div class="notification-wrapper">
                            <a class="ring-bell" id="notificationBtn">
                                <svg class="svg-icon">
                                    <use href="../images/icons/icons-sprite.svg#icon-bell"></use>
                                </svg>
                                <span id="notifCount">01</span>
                            </a>
                            <!-- DROPDOWN -->
                            <div class="notification-dropdown" id="notificationDropdown">

                                <div class="notif-header d-flex align-items-center justify-content-between">
                                    <h4>Notifications</h4>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="notif-filters">
                                            <button data-filter="all" class="active">All</button>
                                            <button data-filter="unread">Unread</button>
                                            <button data-filter="read">Marked as Read</button>
                                        </div>
                                        <div class="notif-footer">
                                            <!--loadmore will work in future - when we fetch acutal data -->
                                            <button id="loadMore"> <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-re-load"></use>
                                                </svg> Load More</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="notif-list" id="notifList">
                                    <div class="notif-item">
                                        <div class="notif-icon">
                                            <div class="notif-tick">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-double-tick"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notif-info">
                                            <span>Today</span>
                                            <p class="m-0">The <b>"Lorem Ipsum sit Dolor"</b> event entry ticket is now available for download.</p>
                                        </div>
                                        <div class="notif-btn">
                                            <a href="" class="btn-style-3">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-down-arrow-circle"></use>
                                                </svg> Download
                                            </a>
                                        </div>
                                    </div>
                                    <div class="notif-item unread">
                                        <!-- if notifcation is unread the span shows "mark as read" -->
                                        <div class="notif-icon">
                                            <div class="notif-tick">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-double-tick"></use>
                                                </svg>
                                            </div>
                                            <span>mark as read</span>
                                        </div>
                                        <div class="notif-info">
                                            <span>Yesterday at 3:22 PM</span>
                                            <p class="m-0"><b>ESMA International Network</b> published new content in
                                                the library.</p>
                                        </div>
                                        <div class="notif-btn">
                                            <a href="" class="btn-style-3">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                                </svg> Read More
                                            </a>
                                        </div>
                                    </div>
                                    <div class="notif-item">
                                        <div class="notif-icon">
                                            <div class="notif-tick">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-double-tick"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="notif-info">
                                            <span>1 week ago</span>
                                            <p class="m-0">You have registered interest in the <b>"Lorem Ipsum sit Dolor"</b> event</p>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>