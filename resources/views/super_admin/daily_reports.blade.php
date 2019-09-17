@extends('super_admin.base')
@section('mommzi-content')
    <div class="page-inner">
                <div class="page-breadcrumb">
                    <?php
                $count=1;
                ?>
                    <ol class="breadcrumb container">
                        <li><a href="{{ route('home')}}">Home</a></li> 
                        <li class="active">Daily reports</li>
                    </ol>
                </div>
                <div class="page-title">
                   
                </div>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Daily Reports</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fullname</th>
                                                <th>Role</th>
                                                <th>Report</th>
                                                <th>Date/Time Reported</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Fullname</th>
                                                <th>Role</th>
                                                <th>Report</th>
                                                <th>Date/Time Reported</th
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($daily_messages as $messages)
                                            <tr>
                                                <td>{{$count++}}</td>

                                                <td>{{$messages->fullname}}</td>
                                                <td>{{$messages->role}}</td>
                                                <td>{{$messages->issue}}</td>
                                                <td>{{$messages->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                       </table>  
                                    </div>
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