@extends('super_admin.base')
@section('mommzi-content')
<div class="page-inner">
                <div id="main-wrapper" class="container">
                    <div class="row m-t-md">
                        <div class="col-md-12">
                            <div class="row mailbox-header">
                                <div class="col-md-2">
                                    <a href="{{ route('message.show')}}" class="btn btn-success btn-block">Back to Inbox</a>
                                </div>
                                <div class="col-md-6">
                                    <h2>Compose</h2>
                                </div>
                                <div class="col-md-4">
                                    <div class="compose-options">
                                        <div class="pull-right">
                                            <a href="inbox.html" class="btn btn-default"><i class="fa fa-file-text-o m-r-xs"></i>Draft</a>
                                            <a href="inbox.html" class="btn btn-danger"><i class="fa fa-trash m-r-xs"></i>Discard</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-10">
                            <div class="panel panel-white">
                                <div class="panel-body mailbox-content">
                                    <div class="compose-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('message.add')}}">

                                        {{ csrf_field() }}

                                             <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                        <label for="fullname" class="col-sm-2 control-label">Full Name</label>

                                       <div class="col-sm-10">
                                        <input id="fullname" type="text" class="form-control" name="fullname" readonly="readonly" value="{{ $fullname }}" required autofocus>

                                            @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                                            @endif
                                         </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                        <label for="role" class="col-sm-2 control-label">Role</label>

                                       <div class="col-sm-10">
                                        <input readonly="readonly" id="role" type="text" class="form-control" name="role" value="{{ $role }}" required autofocus>

                                            @if ($errors->has('role'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                            @endif
                                         </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                        <label for="subject" class="col-sm-2 control-label">Subject</label>

                                       <div class="col-sm-10">
                                        <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>

                                            @if ($errors->has('subject'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                            @endif
                                         </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('issue') ? ' has-error' : '' }}">
                                        <label for="issue" class="col-sm-2 control-label">Report Issue</label>

                                       <div class="col-sm-10">

                                        <textarea class="form-control" name="issue" value="{{ old('issue') }}" required autofocus rows="8" cols="4"></textarea>

                                            @if ($errors->has('issue'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('issue') }}</strong>
                                            </span>
                                            @endif
                                         </div>
                                            </div>

                                                  <div class="compose-options">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">
                                  <i class="fa fa-send m-r-xs"></i>Send
                                </button>
                            </div>
                        </div>

                                            <!-- <div class="compose-options">
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-success"><i class="fa fa-send m-r-xs"></i>Send</a>
                                        </div>
                                            </div> -->

                                        </form>
                                    </div>
                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2018 &copy; Integris360.</p>
                    </div>
                </div>
            </div>
@endsection