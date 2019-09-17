<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CareTakerStatusController extends Controller
{
    /* Load  list of Caretakers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caretakers=DB::table('users')
            ->where('role','caretaker')
            ->join('care_taker_statuses', 'users.id','=','care_taker_statuses.user_id','left outer')
            ->select(
                'users.id as id',
                'care_taker_statuses.id as status_id',
                'users.fullname as fullname',
                'users.role as role',
                'users.position as position',
                'users.email as email',
                'care_taker_statuses.status as status',
                'care_taker_statuses.end_date as end_date'
            )
            ->get();

        $available_caretakers=DB::table('users')
            ->where('role','caretaker')
            ->join('care_taker_statuses', 'users.id','=','care_taker_statuses.user_id')
            ->get();
        //return $caretakers;
        return view('super_admin/manage-caretaker',['caretakers'=>$caretakers]);
    }

    /* Load  list of Caretakers.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm($id)
    {
        $caretakers=DB::table('users')->where('id',$id)->get();
        return view('super_admin/create-caretaker-status',['caretakers'=>$caretakers]);
    }

    /* Load Caretakers Status Add form.
         *
         * @return \Illuminate\Http\Response
         */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:10',
            'status' => 'required|string|max:20',
            'start_date' => 'required|string|max:20',
            'end_date' => 'required|string|max:20',
        ], $messages = [
            'state_date.required' => 'required Start Date',
            'end_date.required' => 'required End Date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            //Get form input fields values
            $user_id = $request->input('user_id');
            $status = $request->input('status');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $remarks = $request->input('remarks');

            //Prepared Input data for db storage
            $data = array(
                'user_id' => $user_id,
                'status' => $status,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'remarks' => $remarks,
                'created_at' => Carbon::now(),//Server timestamp
                'updated_at' => Carbon::now()//Server timestamp
            );
            DB::table('care_taker_statuses')->insert($data);
            $caretakers=DB::table('care_taker_statuses')->get();
            return Redirect::to('/caretakers/list')->with('message', 'Task Successfully Updated',['caretakers'=>$caretakers]);
        }

    }

    public function deleteStatus($id){
        $del = DB::table('care_taker_statuses')->where('id', $id);
        $del->delete();
        return redirect()->back()->with('message', 'Status Successfully Deleted');
    }


}
