@extends('parent.base')
@section('mommzi-content')
<?php $count=0;?>
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
                                    <h4 class="panel-title">Child Task History</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Child</th>
                                                
                                                <th>Task</th>
                                                <th>Caretaker</th>
                                                

                                                <th>Time Created</th>

                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th> Child</th>
                                                
                                                <th>Task</th>
                                                <th>Caretaker</th>
                                                

                                                <th>Time Created</th>

                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($tasks as $task)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{$task->child_fullname}}</td>
                                                    
                                                    <td>{{$task->task}}</td>
                                                    <td>{{$task->fullname}}</td>
                                                    
                                                    <td>{{$task->created_at}}</td>

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
           
        <!-- Main Wrapper -->
        <div class="page-footer">
            <div class="container">
                <p class="no-s">2018 © Integris360.</p>
            </div>
        </div>
    </div>
@endsection