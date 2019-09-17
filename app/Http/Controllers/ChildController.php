<?php

namespace App\Http\Controllers;

use App\Child;
use App\Role;
use App\Guardian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ChildController extends Controller
{
    /**
     * Load Region Add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChildForm()
    {
        $guardians=Guardian::all();
        return view('super_admin/create-child', ['guardians' => $guardians]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function  registerChild(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'string|max:100',
            'dob' => 'string|max:10',
            'address' => 'string|max:255',
            'nickname' => 'string|max:50',

            'guardian1_contact' => 'string|max:10',
            'guardian2_contact' => 'string|max:10',
            
            'pickup_name' => 'string|max:100',
            'pickup_phone' => 'string|max:13',
            'pickup_relationship' => 'string|max:100',



            
           // 'parent_work_hours' => 'string|max:5',
            //'email' => 'string|email|max:255|unique:users',
        ], $messages = [
            'email.unique' => 'Please Change the email '.$request->input('email'). ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            //Get form input fields values

            $fullname=$request->input('fullname');
            $dob=$request->input('dob');
            $address=$request->input('address');
            $nickname=$request->input('nickname');

            $guardian1_contact=$request->input('guardian1_contact');
            $guardian2_contact=$request->input('guardian2_contact');

            $pickup_name=$request->input('pickup_name');
            $pickup_phone=$request->input('pickup_phone');
            $pickup_relationship=$request->input('pickup_relationship');

            $primary_emergency_name=$request->input('primary_emergency_name');
            $primary_emergency_homephone=$request->input('primary_emergency_homephone');
            $primary_emergency_workphone=$request->input('primary_emergency_workphone');
            $primary_emergency_relationship=$request->input('primary_emergency_relationship');
            $primary_emergency_address=$request->input('primary_emergency_address');

            $secondary_emergency_name=$request->input('secondary_emergency_name');
            $secondary_emergency_homephone=$request->input('secondary_emergency_homephone');
            $secondary_emergency_workphone=$request->input('secondary_emergency_workphone');
            $secondary_emergency_relationship=$request->input('secondary_emergency_relationship');
            $secondary_emergency_address=$request->input('secondary_emergency_address');

            $special_instruction=$request->input('special_instruction');

            $child_physician=$request->input('child_physician');
            $child_physician_phone=$request->input('child_physician_phone');
            $preffered_hospital=$request->input('preffered_hospital');
            $preffered_hospital_phone=$request->input('preffered_hospital_phone');
            $insurance_company=$request->input('insurance_company');

            $policy_number=$request->input('policy_number');
            $regular_medications=$request->input('regular_medications');
            $blood_type=$request->input('blood_type');

            $medicine_allergic=$request->input('medicine_allergic');
            $food_allergies=$request->input('food_allergies');
            $other_allergies=$request->input('other_allergies');

            $last_immunization=$request->input('last_immunization');
            $special_health=$request->input('special_health');

            $has_had=$request->input('has_had');
            $has_had_other=$request->input('has_had_other');
            $suffer_from=$request->input('suffer_from');
            $suffer_from_other=$request->input('suffer_from_other');

            $child_welfare_clinic=$request->input('child_welfare_clinic');
            $other_provision=$request->input('other_provision');
            $outstanding_concerns=$request->input('outstanding_concerns');

            $after_school_care=$request->input('after_school_care');
            $after_school_care_how_many=$request->input('after_school_care_how_many');
            $after_school_care_ages=$request->input('after_school_care_ages');

           


            //Prepared Input data for db storage
            // $parent_uid = uniqid();

            $data=array(
                'child_id'=>strtoupper($this->v4_uuid()),
                'child_fullname' => $fullname,
                'address' => $address,
                'dob' => $dob,
                'nickname' => $nickname,

                'guardian1_id' => $guardian1_contact,
                'guardian2_id' => $guardian2_contact,

                'pickup_name' => $pickup_name,
                'pickup_phone' => $pickup_phone,
                'pickup_relationship' => $pickup_relationship,

                'primary_emergency_name' => $primary_emergency_name,
                'primary_emergency_homephone' => $primary_emergency_homephone,
                'primary_emergency_workphone' => $primary_emergency_workphone,
                'primary_emergency_relationship' => $primary_emergency_relationship,
                'primary_emergency_address' => $primary_emergency_address,

                'secondary_emergency_name' => $secondary_emergency_name,
                'secondary_emergency_homephone' => $secondary_emergency_homephone,
                'secondary_emergency_workphone' => $secondary_emergency_workphone,
                'secondary_emergency_relationship' => $secondary_emergency_relationship,
                'secondary_emergency_address' => $secondary_emergency_address,

                'special_instruction' => $special_instruction,

                'child_physician' => $child_physician,
                'child_physician_phone' =>$child_physician_phone,
                'preffered_hospital' => $preffered_hospital,
                'preffered_hospital_phone' => $preffered_hospital_phone,
                'insurance_company' => $insurance_company,
                'policy_number' => $policy_number,
                'regular_medications' => $regular_medications,
                'blood_type' => $blood_type,
                'medicine_allergic' => $medicine_allergic,
                'food_allergies' => $food_allergies,
                'other_allergies' => $other_allergies,
                'last_immunization' => $last_immunization,
                'special_health' => $special_health,


                'has_had' => $has_had,
                'has_had_other' => $has_had_other,
                'suffer_from' => $suffer_from,
                'suffer_from_other' => $suffer_from_other,

                'child_welfare_clinic' => $child_welfare_clinic,
                'other_provision' => $other_provision,
                'outstanding_concerns' => $outstanding_concerns,
                'after_school_care' => $after_school_care,
                'after_school_care_how_many' => $after_school_care_how_many,
                'after_school_care_ages' => $after_school_care_ages,

                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            DB::table('children')->insert($data);
            $children = DB::table('children')
                ->leftJoin('guardians', 'children.guardian1_id', '=', 'guardians.id')
                ->select('children.id','children.child_fullname','guardian_name','guardian_cell')
                ->get();
            return Redirect::to('children/view/all')->with('message','Child Successfully Added! ',['children' => $children]); //pass your dynamic id
        }
    }

    public function editChild(Request $request){


    }

    public function getChildren(){
        $children = DB::table('children')
            ->leftJoin('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->select('children.id','children.child_fullname','children.dob','children.pickup_name','children.pickup_phone','children.primary_emergency_name','children.primary_emergency_homephone','children.secondary_emergency_name','children.secondary_emergency_homephone','guardian_name','guardian_cell')
            ->get();
        return view('super_admin/view-children', ['children' => $children]);
    }

    public static function v4_uuid()
    {
        return sprintf('%04x'.'%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
