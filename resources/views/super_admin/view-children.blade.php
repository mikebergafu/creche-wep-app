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
                   
                </div>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Manage Kids</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Child Fullname</th>
                                                <th>Date of Birth</th>
                                                <th>Child Guardian</th>
                                                <th>Guardian Phone</th>
                                                <th>Pickup name</th>
                                                <th>Pickup Contact</th>
                                                <th>1st Emergency name</th>
                                                <th>1st Emergency Contact</th>
                                                <th>2nd Emergency name</th>
                                                <th>2nd Emergency Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Child Fullname</th>
                                                <th>Date of Birth</th>
                                                <th>Child Guardian</th>
                                                <th>Guardian Phone</th>
                                                <th>Pickup name</th>
                                                <th>Pickup Contact</th>
                                                <th>1st Emergency name</th>
                                                <th>1st Emergency Contact</th>
                                                <th>2nd Emergency name</th>
                                                <th>2nd Emergency Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($children as $child)
                                            <tr>
                                                <td>{{ $count++ }}</td>

                                                <td>{{$child->child_fullname}}</td>
                                                <td>{{$child->dob}}</td>
                                                <td>{{$child->guardian_name}}</td>
                                                <td>{{$child->guardian_cell}}</td>
                                                <td>{{$child->pickup_name}}</td>
                                                <td>{{$child->pickup_phone}}</td>
                                                <td>{{$child->primary_emergency_name}}</td>
                                                <td>{{$child->primary_emergency_homephone}}</td>
                                                <td>{{$child->secondary_emergency_name}}</td>
                                                <td>{{$child->secondary_emergency_homephone}}</td>
                                                <td><div class="fa-item col-md-3 col-sm-4"><a href="#"><i class="fa fa-eye"></i></a></div> &nbsp;
                                                    <!-- <div class="fa-item col-md-3 col-sm-4"><a href=" {{route('assign.show', $child->id)}}"><i class="fa fa-pencil"></i></div> -->
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
                        <p class="no-s">2018 &copy; Integris360.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
@endsection