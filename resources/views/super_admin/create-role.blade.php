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
                                    <form class="form-horizontal" method="POST" action="{{ route('role.add') }}">
                                        {{ csrf_field() }}
                                    <!-- <form class="form-horizontal"> -->

                                     <div class="form-group{{ $errors->has('rolename') ? ' has-error' : '' }}">
                                        <label for="rolename" class="col-sm-2 control-label">Role Name</label>

                                       <div class="col-sm-10">
                                        <input id="rolename" type="text" class="form-control" name="rolename" value="{{ old('rolename') }}" required autofocus>

                                            @if ($errors->has('rolename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('rolename') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                      <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    Add Role
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