@extends('super_admin.base')
@section('mommzi-content')
  
<div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                   
                        <li class="active">Add Guardian</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Add Guardian</h3>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                
            </div>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                                    <form action="{{ route('parent.register')}}" class="form-horizontal" method="POST" >
                                        {{ csrf_field() }}
                                    <!-- <form class="form-horizontal"> -->
                                        <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Guardian's Information</h4>
                                </div>
                                     <div class="form-group{{ $errors->has('guardian_name') ? ' has-error' : '' }}">
                                        <label for="guardian_name" class="col-sm-2 control-label">Guardian's Full Name</label>

                                       <div class="col-sm-10">
                                        <input id="guardian_name" type="text" class="form-control" name="guardian_name" value="{{ old('guardianname') }}" required autofocus>

                                            @if ($errors->has('guardian_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('guardian_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                                <label for="user_id" class="col-sm-2 control-label">User ID</label>

                                                <div class="col-sm-10">
                                                    <select id="user_id" class="form-control" name="user_id">
                                                        <option value="" disabled selected>Select a Register Parent User Account Name & Email</option>
                                                        @foreach($guardians as $guardian)
                                                            <option  value="{{$guardian->id}}">{{$guardian->fullname.' : '.$guardian->email }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('user_id'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>

                                    <div class="form-group{{ $errors->has('guardian_home_phone') ? ' has-error' : '' }}">
                                        <label for="guardian_home_phone" class="col-sm-2 control-label">Home Phone</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_home_phone" type="text" class="form-control" name="guardian_home_phone" value="{{ old('guardian_home_phone') }}" required autofocus>

                                        @if ($errors->has('guardian_home_phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_home_phone') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('guardian_work_phone') ? ' has-error' : '' }}">
                                        <label for="guardian_work_phone" class="col-sm-2 control-label">Work Phone</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_work_phone" type="text" class="form-control" name="guardian_work_phone" value="{{ old('guardian_work_phone') }}" required autofocus>

                                        @if ($errors->has('guardian_work_phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_work_phone') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('guardian_cell') ? ' has-error' : '' }}">
                                        <label for="guardian_cell" class="col-sm-2 control-label">Cellular Phone</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_cell" type="text" class="form-control" name="guardian_cell" value="{{ old('guardian_cell') }}" required autofocus>

                                        @if ($errors->has('guardian_cell'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_cell') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('guardian_home_address') ? ' has-error' : '' }}">
                                        <label for="guardian_home_address" class="col-sm-2 control-label">Home Address</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_home_address" type="text" class="form-control" name="guardian_home_address" value="{{ old('guardian_home_address') }}" required autofocus>

                                        @if ($errors->has('guardian_home_address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_home_address') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('guardian_occupation') ? ' has-error' : '' }}">
                                        <label for="guardian_occupation" class="col-sm-2 control-label">Occupation</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_occupation" type="text" class="form-control" name="guardian_occupation" value="{{ old('guardian_occupation') }}" required autofocus>

                                        @if ($errors->has('guardian_occupation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_occupation') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('guardian_employer') ? ' has-error' : '' }}">
                                        <label for="guardian_employer" class="col-sm-2 control-label">Name of Employer</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_employer" type="text" class="form-control" name="guardian_employer" value="{{ old('guardian_employer') }}" required autofocus>

                                        @if ($errors->has('guardian_employer'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_employer') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('guardian_business_address') ? ' has-error' : '' }}">
                                        <label for="guardian_business_address" class="col-sm-2 control-label">Business Address</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_business_address" type="text" class="form-control" name="guardian_business_address" value="{{ old('guardian_business_address') }}" required autofocus>

                                        @if ($errors->has('guardian_business_address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_business_address') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('guardian_work_hours') ? ' has-error' : '' }}">
                                        <label for="guardian_work_hours" class="col-sm-2 control-label">Works Hours</label>

                                         <div class="col-sm-10">
                                         <input id="guardian_work_hours" type="text" class="form-control" name="guardian_work_hours" value="{{ old('guardian_work_hours') }}" required autofocus>

                                        @if ($errors->has('guardian_work_hours'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('guardian_work_hours') }}</strong>
                                            </span>
                                        @endif
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