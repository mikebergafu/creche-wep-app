@extends('super_admin.base')
@section('mommzi-content')
  
<div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                   
                        <li class="active">Add Child</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Add Child</h3>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
               
            </div>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                                    <form class="form-horizontal" method="POST" action="{{ route('child.register') }}">
                                        {{ csrf_field() }}
                                    <!-- <form class="form-horizontal"> -->
                                        <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Child's Information</h4>
                                </div>
                                     <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                        <label for="fullname" class="col-sm-2 control-label">Child's Full Name</label>

                                       <div class="col-sm-10">
                                        <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"  autofocus>

                                            @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                        <label for="dob" class="col-sm-2 control-label">Birth Date</label>

                                         <div class="col-sm-10">
                                         <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}"  autofocus>

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-2 control-label">Child's Address </label>

                            <div class="col-sm-10">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"  autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                            <label for="nickname" class="col-sm-2 control-label">Child's Nickname </label>

                            <div class="col-sm-10">
                                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}"  autofocus>

                                @if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                        <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Parent Guardian Information</h4>
                                </div>


                        <div class="form-group{{ $errors->has('guardian1_contact') ? ' has-error' : '' }}">
                            <label for="guardian1_contact" class="col-sm-2 control-label">Guardian 1's Details</label>

                            <div class="col-sm-10">

                                <select id="guardian1_contact"  class="form-control" name="guardian1_contact">
                                    <option value="" disabled selected>Select Guardian 1 Details</option>
                                    @foreach($guardians as $guardian)
                                    <option  value="{{$guardian->id}}">{{$guardian->guardian_cell.' : '.$guardian->guardian_name}}</option>
                                    @endforeach                                 
                                </select>
                                @if ($errors->has('guardian1_contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian1_contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('guardian2_contact') ? ' has-error' : '' }}">
                            <label for="guardian2_contact" class="col-sm-2 control-label">Guardian 2's Details</label>

                            <div class="col-sm-10">

                                <select id="guardian2_contact" class="form-control" name="guardian2_contact">
                                    <option value="" disabled selected>Select Guardian 2 Details</option>
                                    @foreach($guardians as $guardian)
                                    <option value="{{$guardian->id}}">{{$guardian->guardian_cell.' : '.$guardian->guardian_name}}</option>
                                    @endforeach                                 
                                </select>
                                @if ($errors->has('guardian2_contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian2_contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                         <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Child Pick-up Information</h4>
                                </div>

                         <div class="form-group{{ $errors->has('pickup_name') ? ' has-error' : '' }}">
                            <label for="pickup_name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input id="pickup_name" type="text" class="form-control" name="pickup_name" value="{{ old('pickup_name') }}" >

                                @if ($errors->has('pickup_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pickup_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('pickup_phone') ? ' has-error' : '' }}">
                            <label for="pickup_phone" class="col-sm-2 control-label">Phone</label>

                            <div class="col-sm-10">
                                <input id="pickup_phone" type="text" class="form-control" name="pickup_phone" value="{{ old('pickup_phone') }}" >

                                @if ($errors->has('pickup_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pickup_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pickup_relationship') ? ' has-error' : '' }}">
                            <label for="pickup_relationship" class="col-sm-2 control-label">Relationship</label>

                            <div class="col-sm-10">
                                <input id="pickup_relationship" type="text" class="form-control" name="pickup_relationship" value="{{ old('pickup_relationship') }}" >

                                @if ($errors->has('pickup_relationship'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pickup_relationship') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                        <!-- Emergency Contact -->

                        <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Emergency Contacts</h4>
                                </div> 
                        <div class="panel-heading clearfix">
                                    <h6 class="panel-title" style="color:green; font-size: 10px;">Primary Emergency contact (other than parents or guardian)</h6>
                                </div>

                        <div class="form-group{{ $errors->has('primary_emergency_name') ? ' has-error' : '' }}">
                            <label for="primary_emergency_name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input id="primary_emergency_name" type="text" class="form-control" name="primary_emergency_name" >

                                @if ($errors->has('primary_emergency_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_emergency_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primary_emergency_homephone') ? ' has-error' : '' }}">
                            <label for="primary_emergency_homephone" class="col-sm-2 control-label">Home Phone</label>

                            <div class="col-sm-10">
                                <input id="primary_emergency_homephone" type="text" class="form-control" name="primary_emergency_homephone" >

                                @if ($errors->has('primary_emergency_homephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_emergency_homephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('primary_emergency_workphone') ? ' has-error' : '' }}">
                            <label for="primary_emergency_workphone" class="col-sm-2 control-label">Work Phone</label>

                            <div class="col-sm-10">
                                <input id="primary_emergency_workphone" type="text" class="form-control" name="primary_emergency_workphone" >

                                @if ($errors->has('primary_emergency_workphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_emergency_workphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primary_emergency_relationship') ? ' has-error' : '' }}">
                            <label for="primary_emergency_relationship" class="col-sm-2 control-label">Relationshp to Child</label>

                            <div class="col-sm-10">
                                <input id="primary_emergency_relationship" type="text" class="form-control" name="primary_emergency_relationship" >

                                @if ($errors->has('primary_emergency_relationship'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_emergency_relationship') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primary_emergency_address') ? ' has-error' : '' }}">
                            <label for="primary_emergency_address" class="col-sm-2 control-label">Address</label>

                            <div class="col-sm-10">
                                <input id="primary_emergency_address" type="text" class="form-control" name="primary_emergency_address" >

                                @if ($errors->has('primary_emergency_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_emergency_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="panel-heading clearfix">
                                    <h6 class="panel-title" style="color:green; font-size: 10px;">Secondary Emergency contact (other than parents or guardian)</h6>
                                </div>

                        <div class="form-group{{ $errors->has('secondary_emergency_name') ? ' has-error' : '' }}">
                            <label for="secondary_emergency_name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input id="secondary_emergency_name" type="text" class="form-control" name="secondary_emergency_name" >

                                @if ($errors->has('secondary_emergency_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_emergency_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('secondary_emergency_homephone') ? ' has-error' : '' }}">
                            <label for="secondary_emergency_homephone" class="col-sm-2 control-label">Home Phone</label>

                            <div class="col-sm-10">
                                <input id="secondary_emergency_homephone" type="text" class="form-control" name="secondary_emergency_homephone" >

                                @if ($errors->has('secondary_emergency_homephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_emergency_homephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('secondary_emergency_workphone') ? ' has-error' : '' }}">
                            <label for="secondary_emergency_workphone" class="col-sm-2 control-label">Work Phone</label>

                            <div class="col-sm-10">
                                <input id="secondary_emergency_workphone" type="text" class="form-control" name="secondary_emergency_workphone" >

                                @if ($errors->has('secondary_emergency_workphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_emergency_workphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('secondary_emergency_relationship') ? ' has-error' : '' }}">
                            <label for="secondary_emergency_relationship" class="col-sm-2 control-label">Relationshp to Child</label>

                            <div class="col-sm-10">
                                <input id="secondary_emergency_relationship" type="text" class="form-control" name="secondary_emergency_relationship" >

                                @if ($errors->has('secondary_emergency_relationship'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_emergency_relationship') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('secondary_emergency_address') ? ' has-error' : '' }}">
                            <label for="secondary_emergency_address" class="col-sm-2 control-label">Address</label>

                            <div class="col-sm-10">
                                <input id="secondary_emergency_address" type="text" class="form-control" name="secondary_emergency_address" >

                                @if ($errors->has('secondary_emergency_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_emergency_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="panel-heading clearfix">
                                    <h6 class="panel-title" style="color:green; font-size: 11px;">Any Special Instructions on how to reach parents</h6>
                                </div>
                        <div class="form-group{{ $errors->has('special_instruction') ? ' has-error' : '' }}">
                            
                            <label for="special_instruction" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <textarea name="special_instruction" class="form-control" rows="4" cols="50">
                                    
                                </textarea>
                                @if ($errors->has('special_instruction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('special_instruction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Emergency Information</h4>
                                </div> 
                        
                        <div class="form-group{{ $errors->has('child_physician') ? ' has-error' : '' }}">
                            <label for="child_physician" class="col-sm-2 control-label">Child Physician's Name</label>

                            <div class="col-sm-10">
                                <input id="primary_emergency_namechild_physicianl" name="child_physician" >

                                @if ($errors->has('child_physician'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child_physician') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('child_physician_phone') ? ' has-error' : '' }}">
                            <label for="child_physician_phone" class="col-sm-2 control-label">Physican's Phone</label>

                            <div class="col-sm-10">
                                <input id="child_physician_phone" type="text" class="form-control" name="child_physician_phone" >

                                @if ($errors->has('child_physician_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child_physician_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('preffered_hospital') ? ' has-error' : '' }}">
                            <label for="preffered_hospital" class="col-sm-2 control-label">Preffered Hospital</label>

                            <div class="col-sm-10">
                                <input id="preffered_hospital" type="text" class="form-control" name="preffered_hospital" >

                                @if ($errors->has('preffered_hospital'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('preffered_hospital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('preffered_hospital_phone') ? ' has-error' : '' }}">
                            <label for="preffered_hospital_phone" class="col-sm-2 control-label">Hospital Phone</label>

                            <div class="col-sm-10">
                                <input id="preffered_hospital_phone" type="text" class="form-control" name="preffered_hospital_phone" >

                                @if ($errors->has('preffered_hospital_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('preffered_hospital_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('insurance_company') ? ' has-error' : '' }}">
                            <label for="insurance_company" class="col-sm-2 control-label"> Child's Insurance Company</label>

                            <div class="col-sm-10">
                                <input id="insurance_company" type="text" class="form-control" name="insurance_company" >

                                @if ($errors->has('insurance_company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insurance_company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('policy_number') ? ' has-error' : '' }}">
                            <label for="policy_number" class="col-sm-2 control-label">Policy Number</label>

                            <div class="col-sm-10">
                                <input id="policy_number" type="text" class="form-control" name="policy_number" >

                                @if ($errors->has('policy_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('policy_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('regular_medications') ? ' has-error' : '' }}">
                            <label for="regular_medications" class="col-sm-2 control-label">Regular Medications</label>

                            <div class="col-sm-10">
                                <input id="regular_medications" type="text" class="form-control" name="regular_medications" >

                                @if ($errors->has('regular_medications'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regular_medications') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('blood_type') ? ' has-error' : '' }}">
                            <label for="blood_type" class="col-sm-2 control-label">Blood Type</label>

                            <div class="col-sm-10">
                                <input id="blood_type" type="text" class="form-control" name="blood_type" >

                                @if ($errors->has('blood_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blood_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('medicine_allergic') ? ' has-error' : '' }}">
                            <label for="medicine_allergic" class="col-sm-2 control-label">Medicine Allergic to</label>

                            <div class="col-sm-10">
                                <input id="medicine_allergic" type="text" class="form-control" name="medicine_allergic" >

                                @if ($errors->has('medicine_allergic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medicine_allergic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('food_allergies') ? ' has-error' : '' }}">
                            <label for="food_allergies" class="col-sm-2 control-label">Food Allergies</label>

                            <div class="col-sm-10">
                                <input id="food_allergies" type="text" class="form-control" name="food_allergies" >

                                @if ($errors->has('food_allergies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('food_allergies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('other_allergies') ? ' has-error' : '' }}">
                            <label for="other_allergies" class="col-sm-2 control-label">Other Allergies</label>

                            <div class="col-sm-10">
                                <input id="other_allergies" type="text" class="form-control" name="other_allergies" >

                                @if ($errors->has('other_allergies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_allergies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_immunization') ? ' has-error' : '' }}">
                            <label for="last_immunization" class="col-sm-2 control-label">Date of last immunization</label>

                            <div class="col-sm-10">
                                <input id="last_immunization" type="date" class="form-control" name="last_immunization" >

                                @if ($errors->has('last_immunization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_immunization') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('special_health') ? ' has-error' : '' }}">
                            
                            <label for="special_health" class="col-sm-2 control-label">Any special Health Conditions</label>
                            <div class="col-sm-10">
                                <textarea name="special_health" class="form-control" rows="4" cols="50">
                                    
                                </textarea>
                                @if ($errors->has('special_health'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('special_health') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                          <div class="form-group">
                                            <label style="color:green; font-size: 14px;" class="col-sm-2 control-label">Child has had</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                    <label>
                                                        <input name="has_had" value="measels" type="checkbox">Measels
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="has_had" value="german_measels" type="checkbox">German Measels
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="has_had" value="chickenpox" type="checkbox">Chicken Pox
                                                    </label>
                                                </div>
                                                <div  class="checkbox">
                                                    <label>
                                                        <input name="has_had" value="mumps" type="checkbox">Mumps
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="has_had" value="whooping_cough" type="checkbox">Whooping Cough
                                                    </label>
                                                </div><br>
                                                
                                                        <input name="has_had_other" type="text" class="form-control" placeholder="Other">
                                                    </div>

                                                    <!-- Child Suffers from -->

                                                    <label style="color:green; font-size: 14px;" class="col-sm-2 control-label">Child Suffers from</label>
                                                       <div class="col-md-4">

                                                        <div class="checkbox">
                                                    <label>
                                                        <input name="suffer_from" value="headaches" type="checkbox">Headaches
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="suffer_from" value="earaches" type="checkbox">Earaches
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="suffer_from" value="sorethroat" type="checkbox">Sore Throat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="suffer_from" value="stomachaches" type="checkbox">Stomach Aches
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="suffer_from" value="flu" type="checkbox">Flu / Colds
                                                    </label>
                                                </div><br>
                                                
                                                        <input name="suffer_from_other" type="text" class="form-control" placeholder="Other">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       <!--  Other Important Information / Provisions -->

                                        <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:green;">Other Important Information / Provisions</h4>
                                </div> 
                        <div class="panel-heading clearfix">
                                    <h6 class="panel-title" style="color:green; font-size: 10px;">Child will need special provisions such as: </h6>
                                </div>

                        <div class="form-group{{ $errors->has('child_welfare_clinic') ? ' has-error' : '' }}">
                            
                            <label for="child_welfare_clinic" class="col-sm-2 control-label"> Child welfare Clinic </label>
                            <div class="col-sm-10">
                                <textarea name="child_welfare_clinic" class="form-control" rows="4" cols="50">
                                    
                                </textarea>
                                @if ($errors->has('child_welfare_clinic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child_welfare_clinic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('other_provision') ? ' has-error' : '' }}">
                            
                            <label for="other_provisions" class="col-sm-2 control-label"> Other provisions we should be aware of  </label>
                            <div class="col-sm-10">
                                <textarea name="other_provision" class="form-control" rows="4" cols="50">
                                    
                                </textarea>
                                @if ($errors->has('other_provision'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_provision') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('outstanding_concerns') ? ' has-error' : '' }}">
                            
                            <label for="outstanding_concerns" class="col-sm-2 control-label">Do you have any outstanding concerns? </label>
                            <div class="col-sm-10">
                                <textarea name="outstanding_concerns" class="form-control" rows="4" cols="50">
                                    
                                </textarea>
                                @if ($errors->has('outstanding_concerns'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('outstanding_concerns') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('after_school_care') ? ' has-error' : '' }}">
                            
                            <label for="after_school_care" class="col-sm-2 control-label">Do other children require after school care? </label>
                            <div class="col-sm-10">
                                
                         Yes  <input type="radio" name="after_school_care" value="Yes"> &nbsp;
                        No <input type="radio" name="after_school_care" value="No">  <br>
  
                                @if ($errors->has('after_school_care'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('after_school_care') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <label for="after_school_care" class="col-sm-2 control-label">If yes </label>
                            <div class="col-sm-10">
                       <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input name="after_school_care_how_many" type="text" class="form-control" placeholder="How many">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input name="after_school_care_ages" type="text" class="form-control" placeholder="Ages?">
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                                    </form>
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