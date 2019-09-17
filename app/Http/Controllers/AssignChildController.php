<?php

namespace App\Http\Controllers;

use App\Child;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignChildController extends Controller
{
     public function showAssignForm($id)
        {
            $status_count=DB::table('care_taker_statuses')->count();
            if($status_count>0){
                $children=DB::table('children')->select('id','child_fullname')->where('id',$id)->get();
                $caretakers=DB::table('users')->select('users.id','username','role','email','fullname')->where('role','caretaker')
                    ->join('care_taker_statuses', 'users.id','!=','care_taker_statuses.user_id')
                    ->get();

            }else{
                $children=DB::table('children')->select('id','child_fullname')->where('id',$id)->get();
                $caretakers=DB::table('users')->select('users.id','username','role','email','fullname')->where('role','caretaker')
                    ->get();
            }
        //return $children." ".$caretakers;
         return view('parent/assign-caretaker', ['children'=>$children, 'caretakers'=>$caretakers,]);

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

    public function taskForm()
    {
        return view('caretaker/create-children-tasks');
    }

    public function showAssigned()
    {
        //Load caretaker resources
        $results =DB::table('assign_children')->where([
            ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']])
            ->join('children', 'assign_children.child_id', '=', 'children.id')
            ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->where('guardians.id','=',Auth::user()->id)
            ->get();
        //return $results;
        return view('caretaker/index', ['results' => $results]);

    }



}