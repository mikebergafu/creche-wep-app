@extends('caretaker.base')
@section('mommzi-content')

    <div class="page-inner">
        <div class="page-breadcrumb">
            <ol class="breadcrumb container">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Extra</a></li>
                <li class="active">Todo</li>
            </ol>
        </div>
        <div class="page-title">
            <div class="container">
                <h3>Todo</h3>
            </div>
        </div>
        <div id="main-wrapper" class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white todo">
                        <div class="panel-body">

                            <form action="{{route('tasks.create', $child_id[0])}}" method="post">
                                {{csrf_field()}}
                                <input type="text" class="form-control" id="task0" name="task0" placeholder="New Additional Task...">

                                <div class="todo-list">
                                    <div class="todo-item">
                                        <input type="checkbox" id="task1" name="task1" value="Lunch Served">
                                        <span>Lunch Served</span>
                                    </div>
                                    <div class="todo-item">
                                        <input type="checkbox" id="task2" name="task2" value="Breakfast Served">
                                        <span>Breakfast Served</span>
                                    </div>
                                    <div class="todo-item ">
                                        <input type="checkbox" id="task3" name="task3" value="Medicine Given">
                                        <span>Medicine Given</span>
                                    </div>
                                    <div class="todo-item ">
                                        <input type="checkbox" id="task4" name="task4" value="Bath Taken">
                                        <span>Bath Taken</span>
                                    </div>
                                    <div class="todo-item">
                                        <input type="checkbox" id="task5" name="task5" value="Cloth Changed">
                                        <span>Cloth Changed</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">
                                            Task Done
                                        </button>

                                    </div>

                                </div>
                            </form>



                    </div>
                </div>

            </div><!-- Row -->
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <div class="container">
                <p class="no-s">2015 &copy; Modern by Steelcoders.</p>
            </div>
        </div>
    </div>

@endsection

