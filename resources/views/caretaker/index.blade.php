@extends('caretaker.base')
@section('mommzi-content')
    <div class="page-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb container">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <span style="color: lightskyblue;">Caretaker</span>
                <span>Dashboard</span>
            </div>
        </div>
        <div id="main-wrapper" class="container">
            <!-- <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">0</p>
                                <span class="info-box-title">Assigned Children for today</span>
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
                                <p class="counter">{{ $messages_count }}</p>
                                <span class="info-box-title">Issues Reported Today</span>
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
                                <p><span class="counter">12</span></p>
                                <span class="info-box-title">Total Kids on Admission</span>
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


               
                       <!--  <div class="panel-heading">
                            <h4 class="panel-title">Assigned Kid(s) for today</h4>
                        </div> -->
                        <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Assigned Kid(s) for today</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th> Kid's Full Name</th>
                                                <th>Parent Name</th>
                                                <th>Time of Arrival</th>

                                                <th>Update Task</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th> Kid's Full Name</th>
                                                <th>Parent Name</th>
                                                <th>Time of Arrival</th>
                                                <th>Update Task</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        @foreach($results as $result)
                                            <tr>
                                                <td>#</td>
                                                <td>{{$result->child_fullname}}</td>
                                                <td>{{$result->guardian_name}}</td>
                                                <td>{{$result->created_at}}</td>
                                                <td>
                                                    <!-- <div class="fa-item col-md-3 col-sm-4">
                                                        {!! Form::model($result, ['method' => 'delete', 'route' => ['delete.caretakers', $result->id], 'class' =>'form-inline form-delete']) !!}
                                                        {!! Form::hidden('id', $result->id) !!}
                                                        {!! Form::button('<i class="fa fa-trash" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'delete_modal']) !!}
                                                        {!! Form::close() !!}
                                                    </div>&nbsp; -->

                                                    <div class="fa-item col-md-3 col-sm-4">
                                                        <a  href="{{route('tasks.create.form', $result->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-tasks"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                       </table>
                                    </div>
                                </div>
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