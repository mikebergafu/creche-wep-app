@extends('parent.base')
@section('mommzi-content')
<div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                   
                        <li class="active">Assign Caretaker to Children</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Assign Catertakers</h3>
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

                             <form class="form-horizontal" method="POST" action="{{ route('assign.child') }}">
                                        {{ csrf_field() }}
                                    <!-- <form class="form-horizontal"> -->
                        <div class="form-group{{ $errors->has('child_id') ? ' has-error' : '' }}">
                            <label for="child_id" class="col-sm-2 control-label">Child</label>

                            <div class="col-sm-10">

                                <select id="child_id" class="form-control" name="child_id">
                                    @foreach($children as $child)
                                        <option  value="{{$child->id}}">{{$child->child_fullname}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('child_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('caretaker_id') ? ' has-error' : '' }}">
                            <label for="caretaker_id" class="col-sm-2 control-label">Caretaker</label>

                            <div class="col-sm-10">

                                <select id="caretaker_id" class="form-control" name="caretaker_id">
                                    <option value="" disabled selected>Select a Care Taker</option>
                                    @foreach($caretakers as $caretaker)
                                        <option  value="{{$caretaker->id}}">{{$caretaker->fullname}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('caretaker_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caretaker_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    Assign
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