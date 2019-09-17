@extends('super_admin.base')
@section('mommzi-content')
<?php $nowdate=date("d/m/Y"); $day=date("l"); ?>
    <div class="page-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb container">
                <li><a href="index.html">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <span style="color: lightskyblue;">Tasks/</span>
                <span>Manage</span>
            </div>
        </div>
                <!--  <div class="panel-heading">
                     <h4 class="panel-title">Assigned Kid(s) for today</h4>
                 </div> -->
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Tasks Performed on &nbsp; <font style="color:green; font-style: italic; ">{{ $day }} {{ $nowdate }}</font> &nbsp; by Caretakers</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Kid's Full Name</th>
                                                <th>Parent Name</th>
                                                <th>Caretaker</th>
                                                <th>Pick Phone</th>
                                                <th>Task</th>
                                                <th>Time Created</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th> Kid's Full Name</th>
                                                <th>Parent Name</th>
                                                <th>Caretaker</th>
                                                <th>Pick Phone</th>
                                                <th>Task</th>
                                                <th>Time Created</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($tasks as $task)
                                                <tr>
                                                    <td>#</td>
                                                    <td>{{$task->child_fullname}}</td>
                                                    <td>{{$task->guardian_name}}</td>
                                                    <td>{{$task->fullname}}</td>
                                                    <td>{{$task->pickup_phone}}</td>
                                                    <td>{{$task->task}}</td>
                                                    <td>{{$task->created_at}}</td>
                                                    <td>
                                                        <div class="fa-item col-md-3 col-sm-4">
                                                            <a disabled="disabled"  href="{{route('caretakers.status.form', $task->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-pencil"></i></a>
                                                        </div>

                                                        <div class="fa-item col-md-3 col-sm-4">
                                                            <a disabled="disabled"  href="{{route('tasks.create.form', $task->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-user"></i></a>
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
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <div class="container">
                <p class="no-s">2017 © Integris360.</p>
            </div>
        </div>
    </div>
@endsection