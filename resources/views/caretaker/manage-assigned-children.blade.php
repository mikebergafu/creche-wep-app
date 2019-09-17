@extends('caretaker.base')
@section('mommzi-content')
    <div class="page-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb container">
                <li><a href="index.html">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <span style="color: lightskyblue;">Caretaker</span>
                <span>Manage</span>
            </div>
        </div>
        <div id="main-wrapper" class="container">
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
                                                <th>Confirm</th>
                                                <th>Manage Kids</th>

                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th> Kid's Full Name</th>
                                                <th>Parent Name</th>
                                                <th>Time of Arrival</th>
                                                <th>Confirm</th>
                                                <th>Manage Kids</th>

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
                                                        @if($result->confirm==='yes')
                                                            {!! Form::model($result, ['method' => 'put', 'route' => ['confirm.child.assigned', $result->assigned_id,$result->child_id ], 'class' =>'form-inline form-update']) !!}
                                                            {!! Form::hidden('id', $result->assigned_id) !!}
                                                            {!! Form::button('<i class="fa fa-check" style="color: green;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete','disabled'=>'disabled', 'name' => 'confirm_modal']) !!}
                                                            {!! Form::close() !!}
                                                            @else
                                                            {!! Form::model($result, ['method' => 'put', 'route' => ['confirm.child.assigned', $result->assigned_id,$result->child_id], 'class' =>'form-inline form-update']) !!}
                                                            {!! Form::hidden('id', $result->assigned_id) !!}
                                                            {!! Form::button('<i class="fa fa-check" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'confirm_modal']) !!}
                                                            {!! Form::close() !!}
                                                            @endif

                                                    </td>
                                                    <td>
                                                        <!-- <div class="fa-item col-md-3 col-sm-4">
                                                            {!! Form::model($result, ['method' => 'delete', 'route' => ['delete.caretakers', $result->assigned_id], 'class' =>'form-inline form-delete']) !!}
                                                            {!! Form::hidden('id', $result->assigned_id) !!}
                                                            {!! Form::button('<i class="fa fa-trash" style="color: red;"></i>', ['type' => 'submit','class' => 'btn btn-default btn-xs delete', 'name' => 'delete_modal']) !!}
                                                            {!! Form::close() !!}
                                                        </div>&nbsp; -->

                                                        <div class="fa-item col-md-3 col-sm-4">
                                                            <a  href="{{route('tasks.create.form', $result->child_id)}}" class="btn btn-default btn-xs" style="color: #0a6aa1;"><i class="fa fa-tasks"></i></a>
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

    <script>
        function aware(id){
            var a = document.getElementById("confirm");
             //var a =document.querySelector('.confirm');
            if(a.checked){
                confirm('yes');
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //var res_array=xhttp.responseText.split('#');
                        var res_array=xhttp.responseText;
                        obj = JSON.parse(res_array);
                        // Typical action to be performed when the document is ready:
                        if(obj['status']=='500'){
                            account_name.value = obj['message'];
                        }else{

                            account_name.value=obj.property[0].cust_name;


                        }

                    }
                };
                xhttp.open("GET", "http://localhost:3020/mommzi_simulation/public/assign/confirm/"+id, true);
                xhttp.send();
            }else {
                confirm('no');
            }


        }
    </script>
@endsection