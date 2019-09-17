@extends('super_admin.base')
@section('mommzi-content')
 <div class="page-inner">
                <div class="page-breadcrumb">
                	<?php
                $count=1;
                ?>
                    <ol class="breadcrumb container">
                        <li><a href="{{ route('home')}}">Home</a></li> 
                        <li class="active">Users</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>All Users & Their Roles</h3>
                    </div>
                </div>
     @include('modals.delete_modal')
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"></h4>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                                    @endif
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;" data-toggle="dataTable" data-form="deleteForm">
                                        <thead>
                                            <tr>
                                            	<th>#</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            	<th>#</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	@foreach($users as $user)
                                            <tr>
                                            	<td>{{$count++}}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->position }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->role=== 'super admin')
                                                        {{'You Can'.'t Here'}}
                                                        @else
                                                        <div class="fa-item col-md-3 col-sm-4">
                                                            {!! Form::model($user, ['method' => 'delete', 'route' => ['user.delete', $user->id], 'class' =>'form-inline form-delete']) !!}
                                                            {!! Form::hidden('id', $user->id) !!}
                                                            {!! Form::button('<i class="fa fa-trash" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'delete_modal']) !!}
                                                            {!! Form::close() !!}
                                                        </div>&nbsp;
                                                        <div class="fa-item col-md-3 col-sm-4">
                                                            <a  href="{{route('user.update.form', $user->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-pencil"></i></a>
                                                        </div>
                                                    @endif
                                                </td>
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