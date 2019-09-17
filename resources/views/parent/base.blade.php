@extends('layouts.app')
@section('content')
    <div class="navbar">
        <div class="navbar-inner container">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="{{ route('home')}}" class="logo-text"><span>Mommzi</span></a>
            </div><!-- Logo Box -->
            <div class="search-button">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
            </div>
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>
                        <!-- <li>
                            <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                        </li> -->
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <i class="fa fa-cogs"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right">4</span></a>
                            <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                <li><p class="drop-title">You have 4 new  messages !</p></li>
                                <li class="dropdown-menu-list slimscroll messages">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#">
                                                <div class="msg-img"><div class="online on"></div><img class="img-circle" src="assets/images/avatar2.png" alt=""></div>
                                                <p class="msg-name">Sandra Smith</p>
                                                <p class="msg-text">Hey ! I'm working on your project</p>
                                                <p class="msg-time">3 minutes ago</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="msg-img"><div class="online off"></div><img class="img-circle" src="assets/images/avatar4.png" alt=""></div>
                                                <p class="msg-name">Amily Lee</p>
                                                <p class="msg-text">Hi David !</p>
                                                <p class="msg-time">8 minutes ago</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="msg-img"><div class="online off"></div><img class="img-circle" src="assets/images/avatar3.png" alt=""></div>
                                                <p class="msg-name">Christopher Palmer</p>
                                                <p class="msg-text">See you soon !</p>
                                                <p class="msg-time">56 minutes ago</p>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="drop-all"><a href="#" class="text-center">All Messages</a></li>
                            </ul>
                        </li> -->
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <span class="user-name">{{Auth::user()->fullname}}<i class="fa fa-angle-down"></i></span>
                                <img class="img-circle avatar" src="{{ asset('assets/images/avatar1.png')}}" width="40" height="40" alt="">
                            </a>

                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <!-- <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
 --> <!--                                <li role="presentation"><a href="{{ route('message.show.parent')}}"><i class="fa fa-envelope"></i>Daily Reports<span class="badge badge-success pull-right"></span></a></li>
                                <li role="presentation" class="divider"></li> -->
                                
                                <li role="presentation"><a href="{{route('logout')}}"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>
                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar horizontal-bar">
        <div class="page-sidebar-inner">
            <ul class="menu accordion-menu">
                <li class="nav-heading"><span>Navigation</span></li>
                <li class="active"><a href="{{ route('children.assigned.list')}}"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>

                <!-- <li class="droplink"><a href="profile.html"><span class="menu-icon icon-user"></span><p>Users</p> <span class="arrow"></span></a><ul class="sub-menu">
                        <li><a href="{{ url('adduser')}}">Add Users</a></li>
                        <li><a href="{{ url('manage_users')}}">Manage Users</a></li>
                    </ul>
                </li> -->

                <!-- <li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>Child Management</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="inbox.html">Inbox</a></li>
                        <li><a href="message-view.html">View Message</a></li>
                        <li><a href="compose.html">Compose</a></li>
                    </ul>
                </li> -->

                <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Children Management</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{route('my.children')}}">Assign Children</a></li>
                        <!-- <li><a href="{{route('children.assigned.list')}}">View Assigned To </a></li> -->
                        <li><a href="{{route('my.children.tasks.show')}}">View Child Daily Tasks</a></li>
                        <li><a href="{{route('my.children.tasks.history.show')}}">Child Task History</a></li>
                    </ul>
                </li>


                <li><a href="{{ route('parent.write.show')}}"><span class="menu-icon icon-present"></span><p>Report An Issue</p><span class="arrow"></span></a></li>



               

                <!-- <li class="droplink"><a href="#"><span class="menu-icon icon-envelope"></span><p>Mail</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="inbox.html">Inbox</a></li>
                        <li><a href="message-view.html">View Message</a></li>
                        <li><a href="compose.html">Compose</a></li>
                    </ul>
                </li> -->
            </ul>
        </div><!-- Page Sidebar Inner -->


    </div>
    @yield('mommzi-content')
@endsection

