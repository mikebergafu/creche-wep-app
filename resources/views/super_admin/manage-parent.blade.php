@extends('super_admin.base')
@section('mommzi-content')
    <div class="page-inner">
        <div class="page-breadcrumb">
            <?php
            $count=1;
            ?>
            <ol class="breadcrumb container">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li class="active">Guardian</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <h3>List of Guardians</h3>
            </div>
        </div>
        @include('modals.delete_modal')
        <div id="main-wrapper" class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Guardians</h4>
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
                                        <th>Email</th>
                                        <th>Mobile Phone</th>
                                        <th>Work Phone</th>
                                        <th>Occupation</th>
                                        <th>Employer</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Phone</th>
                                        <th>Work Phone</th>
                                        <th>Occupation</th>
                                        <th>Employer</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($guardians as $guardian)
                                           <tr>
                                           <td>{{$count++}}</td>
                                           <td>{{ $guardian->fullname }}</td>
                                               <td>{{ $guardian->email }}</td>
                                           <td>{{ $guardian->guardian_cell }}</td>
                                           <td>{{ $guardian->guardian_work_phone }}</td>
                                           <td>{{ $guardian->guardian_occupation }}</td>
                                               <td>{{ $guardian->guardian_employer }}</td>

                                                   <td>
                                                       <div class="fa-item col-md-3 col-sm-4">
                                                           {!! Form::model($guardian, ['method' => 'delete', 'route' => ['guardian.delete', $guardian->id], 'class' =>'form-inline form-delete']) !!}
                                                           {!! Form::hidden('id', $guardian->id) !!}
                                                           {!! Form::button('<i class="fa fa-trash" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'delete_modal']) !!}
                                                           {!! Form::close() !!}
                                                       </div>&nbsp;
                                                      {{-- <div class="fa-item col-md-3 col-sm-4">
                                                           <a  href="{{route('caretakers.status.form', $guardian->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-pencil"></i></a>
                                                       </div>--}}

                                                       <div class="fa-item col-md-3 col-sm-4">
                                                           <a  href="{{route('su.parent.children', $guardian->id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-user"></i></a>
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
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <div class="container">
                <p class="no-s">2015 &copy; Integris360.</p>
            </div>
        </div>
    </div><!-- Page Inner -->
@endsection