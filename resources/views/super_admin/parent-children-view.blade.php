@extends('super_admin.base')
@section('mommzi-content')
    <div class="page-inner">
        <div class="page-breadcrumb">
            <?php
            $count=1;
            ?>
            <ol class="breadcrumb container">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li class="active">Children</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <h3>List of Children</h3>
            </div>
        </div>
        @include('modals.delete_modal')
        <div id="main-wrapper" class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">{{'Children ('.$guardian[0].')'}}</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;" data-toggle="dataTable" data-form="deleteForm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID No.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Date of Birth</th>
                                        <th>Nicky</th>
                                        <th>Pickup Name</th>
                                        <th>Pickup Phone</th>
                                        <th>Pickup Relationship</th>
                                        {{--<th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ID No.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Date of Birth</th>
                                        <th>Nicky</th>
                                        <th>Pickup Name</th>
                                        <th>Pickup Phone</th>
                                        <th>Pickup Relationship</th>
                                       {{-- <th>Action</th>--}}
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($children as $child)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$child->child_id}}</td>
                                            <td>{{$child->child_fullname}}</td>
                                            <td>{{$child->address}}</td>
                                            <td>{{$child->dob}}</td>
                                            <td>{{$child->nickname}}</td>
                                            <td>{{$child->pickup_name}}</td>
                                            <td>{{$child->pickup_phone}}</td>
                                            <td>{{$child->pickup_relationship}}</td>
                                           {{-- <td><div class="fa-item col-md-3 col-sm-4"><a href="#"><i class="fa fa-eye"></i></a></div> &nbsp;
                                                <div class="fa-item col-md-3 col-sm-4"><a href=" {{route('assign.show', $child->id)}}"><i class="fa fa-pencil"></i></div>
                                            </td>--}}
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