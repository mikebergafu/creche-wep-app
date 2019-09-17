<div class="box">
    <div class="modal" id="updateDialog">
        <div class="modal-dialog">
           <div class="panel panel-primary">
               <div class="panel-heading">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   {{--<img src="{{asset('images/gf-logo.png')}}" width="30px" height="30px">--}}
                   <span class="modal-title">User Record Update Dialog</span>
               </div>
               <div class="panel-body">
                   <form class="form-horizontal" method="POST" action="{{ route('register.add') }}">
                   {{ csrf_field() }}
                   <!-- <form class="form-horizontal"> -->

                       <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                           <label for="fullname" class="col-sm-2 control-label">Full Name</label>

                           <div class="col-sm-10">
                               <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                               @if ($errors->has('fullname'))
                                   <span class="help-block">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                           <label for="name" class="col-sm-2 control-label">Position</label>

                           <div class="col-sm-10">
                               <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" required autofocus>

                               @if ($errors->has('position'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                           <label for="username" class="col-sm-2 control-label">UserName</label>

                           <div class="col-sm-10">
                               <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                               @if ($errors->has('username'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                           <label for="name" class="col-sm-2 control-label">Role</label>

                           <div class="col-sm-10">

                               <select id="role" class="form-control" name="role">
                                   <option value="" disabled selected>Select a Role</option>
                                   @foreach($roles as $role)
                                       <option value="{{$role->role_name}}">{{$role->role_name}}</option>
                                   @endforeach
                               </select>
                               @if ($errors->has('role'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email" class="col-sm-2 control-label">E-Mail </label>

                           <div class="col-sm-10">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                               @if ($errors->has('email'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <label for="password" class="col-sm-2 control-label">Password</label>

                           <div class="col-sm-10">
                               <input id="password" type="password" class="form-control" name="password" required>

                               @if ($errors->has('password'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>

                           <div class="col-sm-10">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                           </div>
                       </div>


                       <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit" class="btn btn-success">
                                   Update
                               </button>
                           </div>
                       </div>
                   </form>
               </div>

               <div id="parent" class="panel-footer">
                   <button type="button" class="btn btn-sm btn-default block center" data-dismiss="modal">Cancel</button>
               </div>

           </div>
        </div>
    </div>
    <script>
        function showBank() {
            alert('nnvks');
            if (document.getElementById('pay_method').value === 'Cheque') {
                document.getElementById('ifCheque').style.display = 'block';
            }
            else
                document.getElementById('ifCheque').style.display = 'none';
        }

        $(document).on("click", ".open-UpdateCollectedDialog", function () {
            var myBookId = $(this).data('id');
            var myBookName = $(this).data('name');
            $("#account_no").val( myBookId);
            $(".modal-dialog #account_name").val( myBookName);
        });


    </script>
</div>