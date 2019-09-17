<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{


    /* Load Region Add form.
      *
      * @return \Illuminate\Http\Response
      */
    public function indexG()
    {
        $guardians=DB::table('users')->where('role','parent')
            ->join('guardians', 'users.id','=','guardians.user_id')
            ->select('guardians.id as id','fullname','email','guardian_cell','guardian_work_phone','guardian_occupation','guardian_employer')
            ->get();
        //return $guardians;
        return view('super_admin/manage-parent',['guardians'=>$guardians]);
    }

    /* Load Region Add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChildrenG($id)
    {
        $children=DB::table('children')->where('guardian1_id',$id)
            ->join('guardians','children.guardian1_id','=','guardians.id')
            ->get();
        $guardian=DB::table('guardians')->where('id',$id)->pluck('guardian_name');
        //return $children;
        //return $guardian[0];
        return view('super_admin/parent-children-view',['children'=>$children, 'guardian'=>$guardian]);
    }
    /* Load Region Add form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showParentFormG()
    {
        $guardians=DB::table('users')->where('role','parent')->get();
        //return $guardians;
        return view('super_admin/create-parent',['guardians'=>$guardians]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  registerParent(Request $request){
        $validator = Validator::make($request->all(), [
            'guardian_name' => 'string|max:255',
            'user_id' => 'integer|unique:guardians',
            'guardian_home_phone' => 'string|max:255',
            'guardian_work_phone' => 'string|max:255',
            'guardian_cell' => 'string|max:13',
            'guardian_home_address' => 'string|max:255',
            'guardian_occupation' => 'string|max:255',
            'guardian_employer' => 'string|max:255',
            'guardian_business_address' => 'string|max:255',
            'guardian_work_hours' => 'string|max:255',

        ], $messages = [
            'guardian_cell.unique' => 'Please Change the Guardian Phone '.$request->input('guardian_cell'). ' and try again',
            'user_id.unique' => 'Please this User is already Registered as a Guardian',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            //Get form input fields values
            $guardian_name=$request->input('guardian_name');
            $user_id=$request->input('user_id');
            $guardian_home_phone=$request->input('guardian_home_phone');
            $guardian_work_phone=$request->input('guardian_work_phone');
            $guardian_cell=$request->input('guardian_cell');
            $guardian_home_address=$request->input('guardian_home_address');
            $guardian_occupation=$request->input('guardian_occupation');
            $guardian_employer=$request->input('guardian_employer');
            $guardian_business_address=$request->input('guardian_business_address');
            $guardian_work_hours=$request->input('guardian_work_hours');

            //Prepared Input data for db storage
            $data=array(
                'guardian_id'=>strtoupper($this->v4_uuid()),
                'user_id'=>$user_id,
                'guardian_name' => $guardian_name,
                'guardian_home_phone'=>$guardian_home_phone,
                'guardian_work_phone'=>$guardian_work_phone,
                'guardian_cell'=>$guardian_cell,
                'guardian_home_address' => $guardian_home_address,
                'guardian_occupation' => $guardian_occupation,
                'guardian_employer' => $guardian_employer,
                'guardian_business_address' => $guardian_business_address,
                'guardian_work_hours' => $guardian_work_hours,

                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            DB::table('guardians')->insert($data);
            $guardians=DB::table('users')->where('role','parent')
                ->join('guardians', 'users.id','=','guardians.user_id')
                ->select('guardians.id as id','fullname','email','guardian_cell','guardian_work_phone','guardian_occupation','guardian_employer')
                ->get();
            return Redirect::to('parents/list')->with('message','Guardian Successfully Added! ',['guardians'=>$guardians]); //pass your dynamic id
        }
    }

    public function  addRoleG(Request $request){
        $validator = Validator::make($request->all(), [
            'rolename' => 'string|max:255',

        ], $messages = [
            'role.unique' => 'Please Change the role name '.$request->input('rolename'). ' and try again',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            //Get form input fields values
            $rolename=$request->input('rolename');

            //Prepared Input data for db storage
            $data=array(
                'role_name' => $rolename,
                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            DB::table('roles')->insert($data);
            $users = User::all();
            return redirect()->back()->with('message','Role Successfully Added! '); //pass your dynamic id
        }
    }

    //------------Children Methods----------------------
    public function showAssignForm($id)
    {
        $children=DB::table('children')->select('id','child_fullname')->where('id',$id)->get();
        $caretakers=DB::table('users')->select('id','username','role','email','fullname')
            ->where('role','caretaker')->get();
        //return $children." ".$caretakers;
        return view('super_admin/assign-caretaker',
            [
                'children'=>$children,
                'caretakers'=>$caretakers,
            ]);

    }

    public function assignChild(Request $request)
    {
        //Prepared Input data for db storage
        $data=array(
            'caretaker_id' => $request->input('caretaker_id'),
            'child_id'=>$request->input('child_id'),
            'created_at' => Carbon::now(),//Server timestamp
            'updated_at' => Carbon::now()//Server timestamp
        );
        DB::table('assign_children')->insert($data);
        return redirect()->back()->with('message','Child Assigned Successfully! '); //pass your dynamic id
    }

    public function showTasks()
    {
        //Load caretaker resources
        $tasks =DB::table('caretaker_tasks')->where([
            ['caretaker_tasks.created_at', 'like','%'.date("Y-m-d") . '%']])
            ->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->select(
                'children.child_fullname',
                'guardians.guardian_name',
                'children.id',
                'pickup_name',
                'pickup_phone',
                'caretaker_tasks.created_at',
                'task',
                'fullname',
                'position'
            )
            ->get();
        //return $tasks;
        return view('super_admin/manage-tasks', ['tasks' => $tasks]);
    }

    public function showTest(){
        //$users=User::paginate(2);
        //return new UserCollection($users);
        $users=User::find(1);
        return new UserResource($users);
    }

     public function showTasksHistory()
    {
        //Load caretaker resources
        $tasks =DB::table('caretaker_tasks')
            ->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
            ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->select(
                'children.child_fullname',
                'guardians.guardian_name',
                'children.id',
                'pickup_name',
                'pickup_phone',
                'caretaker_tasks.created_at',
                'task',
                'fullname',
                'position'
            )
            ->get();

        // $tasks =DB::table('caretaker_tasks')
        //     ->join('children', 'caretaker_tasks.child_id', '=', 'children.id')
        //     ->join('users', 'caretaker_tasks.created_by', '=', 'users.id')
        //     ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
        //     ->select('children.id',
        //         'pickup_name',
        //         'child_fullname',
        //         'pickup_phone',
        //         'caretaker_tasks.created_at',
        //         'task',
        //         'fullname',
        //         'position'
        //     )
        //     ->get();
        //return $tasks;
        return view('super_admin/task_history', ['tasks' => $tasks]);
        /*//$users=User::paginate(2);
        //return new UserCollection($users);

        $user=User::find(1);
        return new UserResource($user);*/
    }

    public function deleteGuardian(Request $request, $id){

        //trigger exception in a "try" block
        try {
            $del = DB::table('guardians')->where('id', $id)->delete();
            return redirect()->back()->with('message', 'Record Successfully Deleted');
        }
    //catch exception
        catch(Exception $e) {
            return redirect()->back()->with('message', 'Cant Delete! Child assigned to this Parent. Please Delete associated Child First');
        }

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
