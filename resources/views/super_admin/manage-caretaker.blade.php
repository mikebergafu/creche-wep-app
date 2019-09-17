@extends('super_admin.base')
@section('mommzi-content')
    <div class="page-inner">
        <div class="page-breadcrumb">
            <?php
            $count=1;
            ?>
            <ol class="breadcrumb container">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li class="active">Caretakers</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <h3>List of Caretakers</h3>
            </div>
        </div>
        @include('modals.reassign_caretaker_modal')
        <div id="main-wrapper" class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Caretakers</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;" data-toggle="dataTable" data-form="deleteForm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Status Ends</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Status Ends</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($caretakers as $caretaker)
                                       @if($caretaker->status==='not available')
                                           <tr style="background-color: rgba(255,77,73,0.16);">
                                           @else
                                           <tr style="background-color: rgba(194,255,85,0.18);">
                                           @endif
                                           <td>{{$count++}}</td>
                                           <td>{{ $caretaker->fullname }}</td>
                                           <td>{{ $caretaker->position }}</td>
                                           <td>{{ $caretaker->role }}</td>
                                           <td>{{ $caretaker->email }}</td>
                                              @if($caretaker->status==='not available')
                                                   <td>{{ $caretaker->status }}</td>
                                                   <td>{{ $caretaker->end_date }}</td>
                                                   <td>
                                                       <div class="fa-item col-md-3 col-sm-4">
                                                           {!! Form::model($caretaker, ['method' => 'delete', 'route' => ['delete.caretakers.status', $caretaker->status_id], 'class' =>'form-inline form-delete']) !!}
                                                           {!! Form::hidden('id', $caretaker->status_id) !!}
                                                           {!! Form::button('<i class="fa fa-trash" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'delete_modal']) !!}
                                                           {!! Form::close() !!}
                                                       </div>&nbsp;
                                                   </td>
                                               @else
                                                   <td>available</td>
                                                   <td>Can Assign Now</td>

                                                   <td>
                                                       {{--<div class="fa-item col-md-3 col-sm-4">
                                                           {!! Form::model($caretaker, ['method' => 'delete', 'route' => ['delete.caretakers.status', $caretaker->status_id], 'class' =>'form-inline form-delete']) !!}
                                                           {!! Form::hidden('id', $caretaker->status_id) !!}
                                                           {!! Form::button('<i class="fa fa-trash" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'delete_modal']) !!}
                                                           {!! Form::close() !!}
                                                       </div>&nbsp;--}}
                                                       <div class="fa-item col-md-3 col-sm-4">
                                                           <a  href="{{route('caretakers.status.form', $caretaker->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-pencil"></i></a>
                                                       </div>
                                                   </td>
                                               @endif

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