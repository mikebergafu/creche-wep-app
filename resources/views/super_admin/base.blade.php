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
                                
                                <li class="drop-all"><a href="{{ route('message.show')}}" class="text-center">You have 4 new  messages today !</a></li>
                            </ul>
                        </li>
                        -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <span class="user-name">{{Auth::user()->fullname}}<i class="fa fa-angle-down"></i></span>
                                <img class="img-circle avatar" src="{{ asset('assets/images/avatar1.png')}}" width="40" height="40" alt="">
                            </a>

                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <!-- <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li> -->
                                <!-- <li role="presentation"><a href="inbox.html"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li> -->
                                <!-- <li role="presentation" class="divider"></li> -->
                                <li role="presentation"><a href="{{route('register.show')}}"><i class="fa fa-lock"></i>Register</a></li>
                                <li role="presentation"><a href="{{ route('logout')}}"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                            </ul>

                        </li>
                        <!-- <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li> -->
                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar horizontal-bar">
        <div class="page-sidebar-inner">
            <ul class="menu accordion-menu">
                <li class="nav-heading"><span>Navigation</span></li>
                <li class="active"><a href="{{ url('home')}}"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>

                <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Users</p> <span class="arrow"></span></a><ul class="sub-menu">
                        <li><a href="{{route('register.show')}}"> Add Users </a></li>
                        <li><a href="{{route('role.show')}}">Add Role</a></li>
                        <li><a href="{{route('users.show.all')}}">Manage Users</a></li>
                    </ul>
                </li>

                <li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>Child Management</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('child.form.show')}}">Add a Child</a></li>
                         <li><a href="{{ route('child.show.all')}}">Manage Children</a></li>
                       <!-- <li><a href="{{ route('child.show.all')}}">Assign Children</a></li> -->
                        <li><a href="{{ route('su.tasks.list')}}">View Children Daily Tasks Performed</a></li>
                        <li><a href="{{ route('su.tasks.history.list')}}">Task History</a></li>
                    </ul>
                </li>

                <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Parent Management</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('su.parent.show')}}">Add guardian</a></li>
                        <li><a href="{{route('su.parent.list')}}">Manage guardians</a></li>
                     <!--    <li><a href="compose.html"> </a></li> -->
                    </ul>
                </li>

                <li class="droplink"><a href="#"><span class="menu-icon icon-present"></span><p>Caretaker Management</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{route('show.caretakers')}}">Manage Caretakers</a></li>
                        <!-- <li><a href="#">Add a Caretaker</a></li> -->
                    </ul>
                </li>

                <li class="droplink"><a href="#"><span class="menu-icon icon-envelope"></span><p>Issues Reported </p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('message.show.daily')}}">Daily Reports</a></li>
                        <li><a href="{{ route('message.show')}}">History</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- Page Sidebar Inner -->
    </div>
    @yield('mommzi-content')

@endsection

