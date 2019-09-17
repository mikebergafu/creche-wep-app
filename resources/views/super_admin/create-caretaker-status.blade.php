@extends('super_admin.base')
@section('mommzi-content')
<div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                   
                        <li class="active">Add Caretaker Status</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Add Status</h3>
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

                                    <form method="POST" class="form-horizontal"  action="{{route('caretakers.status.create') }}">
                                    {{ csrf_field() }}
                                    <!-- <form class="form-horizontal"> -->

                                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                            <label for="user_id" class="col-sm-2 control-label">Caretaker Name</label>

                                            <div class="col-sm-10">

                                                <select id="user_id" class="form-control" name="user_id">
                                                    <option selected="selected" value="{{$caretakers[0]->id}}">{{$caretakers[0]->fullname}}</option>
                                                </select>
                                                @if ($errors->has('user_id'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label for="status" class="col-sm-2 control-label">Status</label>

                                         <div class="col-sm-10">
                                             <select id="status" class="form-control" name="status">
                                                 <option value="" disabled selected>Select a Status</option>
                                                 <option value="not available">Not Available</option>
                                                 <option value="available">Available</option>
                                             </select>
                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    <label for="start_date" class="col-sm-2 control-label">Start Date</label>

                                    <div class="col-sm-10">
                                        <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date')}}" required >

                                        @if ($errors->has('start_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('start_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                            <label for="end_date" class="col-sm-2 control-label">End Date</label>

                                            <div class="col-sm-10">
                                                <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date')}}" required >

                                                @if ($errors->has('end_date'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('end_date') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                                            <label for="remarks" class="col-sm-2 control-label">Remarks</label>

                                            <div class="col-sm-10">
                                                <input id="remarks" type="text" class="form-control" name="remarks" value="{{ old('remarks')}}">

                                                @if ($errors->has('remarks'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('remarks') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    Add
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