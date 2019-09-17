@extends('super_admin.base')
@section('mommzi-content')

<div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                   
                        <li class="active">Add users</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Add Users</h3>
                    </div>
                </div>
                
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">

                                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                                    <form class="form-horizontal" method="POST" action="{{ route('register.add') }}">
                                        {{ csrf_field() }}
                                    <!-- <form class="form-horizontal"> -->

                                     <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                        <label for="fullname" class="col-sm-2 control-label">Full Name</label>

                                       <div class="col-sm-10">
                                        <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                            @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                        <label for="name" class="col-sm-2 control-label">Position</label>

                                         <div class="col-sm-10">
                                         <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" required autofocus>

                                        @if ($errors->has('position'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-sm-2 control-label">UserName</label>

                            <div class="col-sm-10">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Role</label>

                            <div class="col-sm-10">

                                <select id="role" class="form-control" name="role">
                                    <option value="" disabled selected>Select a Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->role_name}}">{{$role->role_name}}</option>
                                    @endforeach                                 
                                </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">E-Mail </label>

                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>

                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                                      <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2015 &copy; Integris360.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->

@endsection