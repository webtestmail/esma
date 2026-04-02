@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title','Events - ESMA International Network')
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
                        <h2 class="dashboard-page-title">Events</h2>

                        <div class="dashboard-stat-card mb-4">
                            <p class="dashboard-page-subtitle">Your Upcoming Events</p>
                            <hr class="my-3" style="background: #E6E6E6;">
                            <div class="dash-events-main">
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-3.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>

                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-2.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-stat-card mb-4">
                            <div class=" d-flex align-items-center justify-content-between">
                                <p class="dashboard-page-subtitle m-0">Your Past Events</p>
                                <form action="" class="d-flex align-items-center gap-2">
                                    <div class="input-past-events">
                                        <label for="">Year:</label>
                                        <select name="" id="">
                                            <option value="" selected>2025</option>
                                            <option value="">2024</option>
                                            <option value="">2023</option>
                                            <option value="">2023</option>
                                        </select>
                                    </div>
                                    <div class="input-past-events">
                                        <label for="">Month:</label>
                                        <select name="" id="">
                                            <option value="" selected>All</option>
                                            <option value="">Jan</option>
                                            <option value="">Feb</option>
                                            <option value="">March</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <hr class="my-3" style="background: #E6E6E6;">
                            <div class="dash-events-main">
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-3.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-2.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-4.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-1.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-5.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-6.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-box">
                                    <div class="events-img"><img src="../images/event-3.jpg" alt=""></div>
                                    <div class="category-style-1">Convention</div>
                                    <div class="events-text">
                                        <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ligula
                                            massa...</p>
                                        <hr class="my-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-calender-check">
                                                    </use>
                                                </svg>
                                                26th to 28th January ’26
                                            </div>
                                            <div class="date-1">
                                                <svg class="svg-icon">
                                                    <use href="../images/icons/icons-sprite.svg#icon-location-stroke">
                                                    </use>
                                                </svg>
                                                London, UK - Lorem Ipsum Hotel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="events-manage">
                                        <button class="btn-style-3 manage-btn">
                                            <svg class="svg-icon">
                                                <use href="../images/icons/icons-sprite.svg#icon-dotchat"></use>
                                            </svg>
                                            Manage
                                        </button>
                                        <div class="manage-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-down-arrow-circle">
                                                            </use>
                                                        </svg> Download Entrance Ticket
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-sad-emoji">
                                                            </use>
                                                        </svg>Cancel Registration of Interest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg class="svg-icon">
                                                            <use href="../images/icons/icons-sprite.svg#icon-link">
                                                            </use>
                                                        </svg> Go to Event Page <svg class="svg-icon arrow-svg ms-auto">
                                                            <use
                                                                href="../images/icons/icons-sprite.svg#icon-arrow-right">
                                                            </use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="custom-pagination d-flex align-items-center justify-content-center gap-2">

                            <!-- Prev -->
                            <a href="#" class="page-btn circle purple">
                                <i class="bi bi-chevron-left"></i>
                            </a>

                            <!-- Numbers -->
                            <a href="#" class="page-btn circle active">01</a>
                            <a href="#" class="page-btn circle">02</a>
                            <span class="page-dots">...</span>
                            <a href="#" class="page-btn circle">05</a>

                            <!-- Next -->
                            <a href="#" class="page-btn circle purple">
                                <i class="bi bi-chevron-right"></i>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


