@extends('caretaker.base')
@section('mommzi-content')
<div class="page-inner">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb container">
                            <li><a href="{{ route('home')}}">Home</a></li>
                            <li><a href="#">Child Daily Task</a></li>
                            
                        </ol>
                    </div>
                    <div class="page-title">
                        <div class="container">
                            <h3>Child Daily Task</h3>
                        </div>
                    </div>
                    <div id="main-wrapper" class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">Child Name</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        
                                                        <label class="control-label">Add Addition Request </label>
                                                        <textarea class="input-large form-control" id="message" rows="3" placeholder="Enter a message ..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group m-t-lg">
                                                    <div class="controls">
                                                        <label for="closeButton">
                                                            <input id="closeButton" type="checkbox" value="checked" class="input-mini" /> Lunch Given
                                                        </label>
                                                    </div>
                                                    <div class="controls">
                                                        <label for="addBehaviorOnToastClick">
                                                            <input id="addBehaviorOnToastClick" type="checkbox" value="checked" class="input-mini" />BreakFast Served
                                                        </label>
                                                    </div>
                                                    <div class="controls">
                                                        <label for="debugInfo">
                                                            <input id="debugInfo" type="checkbox" value="checked" class="input-mini" />Water given
                                                        </label>
                                                    </div>
                                                    <div class="controls">
                                                        <label for="progressBar">
                                                            <input id="progressBar" type="checkbox" value="checked" class="input-mini" /> Temperature Checked
                                                        </label>
                                                    </div>
                                                    <div class="controls">
                                                        <label for="preventDuplicates">
                                                            <input id="preventDuplicates" type="checkbox" value="checked" class="input-mini" /> Cloth Changed
                                                        </label>
                                                    </div>
                                                   
                                                </div>
                                            </div>


                                          
                                        </div>

                                        <div class="row m-t-lg">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-primary" id="showtoast">Update Child Daily Task </button>
                                                
                                            </div>
                                        </div>

                                        <div class="row m-t-lg">
                                            <div class="col-md-12">
                                                <pre id='toastrOptions'></pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2017 &copy; Integris360.</p>
                    </div>
                </div>
            </div>

@endsection

