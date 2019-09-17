@extends('super_admin.base')
@section('mommzi-content')
<?php $count=1; ?>
    <div class="page-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb container">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <h3>
                    <span style="color: lightskyblue;"></span>
                    <span>Dashboard</span>
                </h3>
            </div>
        </div>
        <div id="main-wrapper" class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">{{$children_count}}</p>
                                <span class="info-box-title">Admission this month</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-users"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$children_count}}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">{{$children_count}}</p>
                                <span class="info-box-title">Admissions Today</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-eye"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: {{$children_count}}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter">{{$caretakers_count}}</span></p>
                                <span class="info-box-title">Caretakers on duty</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-users"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$caretakers_count}}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">{{ $messages_count }}</p>
                                <span class="info-box-title">Issue Reported Today</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow=" {{$messages_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $messages_count }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
            <!-- <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">107</p>
                                <span class="info-box-title">Admission this month</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-users"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">{{$children_count}}</p>
                                <span class="info-box-title">Admissions Today</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-eye"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter">{{$caretakers_count}}</span></p>
                                <span class="info-box-title">Caretakers on duty</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-basket"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">47</p>
                                <span class="info-box-title">New Alerts recieved</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --><!-- Row -->
            <div class="row">

                <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"> Child-Caretaker Daily Record</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                       <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                           <thead>
                                           <tr >
                                               <th>#</th>
                                               <th> Kid's Full Name</th>
                                               <th>Parent Name</th>
                                               <th>Caretaker</th>
                                              
                                               <th>Time Assigned</th>
                                               <!-- <th>Action</th> -->
                                           </tr>
                                           </thead>
                                           <tfoot>
                                           <tr>
                                               <th>#</th>
                                               <th> Kid's Full Name</th>
                                               <th>Parent Name</th>
                                               <th>Caretaker</th>
                                              
                                               <th>Time Assigned</th>
                                              <!--  <th>Action</th> -->
                                           </tr>
                                           </tfoot>
                                           <tbody>

                                           @foreach($results as $result)
                                               <tr>
                                                   <td>{{ $count++ }}</td>
                                                   <td>{{$result->child_fullname}}</td>
                                                   <td>{{$result->guardian_name}}</td>
                                                   <td>{{$result->fullname}}</td>
                                                  
                                                   <td>{{$result->created_at}}</td>
                                                   <!-- <td>

                                                       <div class="fa-item col-md-3 col-sm-4">
                                                           <a disabled="disabled" href="{{route('tasks.create.form', $result->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-tasks"></i></a>
                                                       </div>
                                                   </td> -->
                                               </tr>
                                           @endforeach

                                           </tbody>
                                       </table>
                                   </div>
                                </div>
                            </div>
                         
                        </div>
            </div>
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <div class="container">
                <p class="no-s">2017 © Integris360.</p>
            </div>
        </div>
    </div>
@endsection