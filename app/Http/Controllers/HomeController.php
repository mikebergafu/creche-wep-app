<?php

namespace App\Http\Controllers;

use App\AssignChild;
use App\Child;
use App\Message;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role==='super admin'){
            $children=DB::table('children')->get();

            $messages=DB::table('messages')
            ->where('created_at', 'like','%'.date("Y-m-d") .'%')
            ->get();

            $users=DB::table('users')->get();
            $caretakers=DB::table('users')->where('role','caretaker')->get();

            $messages_count=count($messages);

            $results =DB::table('assign_children')->where([
            ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']])
            ->join('children', 'assign_children.child_id', '=', 'children.id')
            ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
            ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
            ->select('children.id',
                'children.child_fullname',
                'guardians.guardian_name',
                'pickup_name',
                'users.fullname',
                'assign_children.created_at', 
                'position'
                )
            ->get();


            $children_count=count($children);
            $caretakers_count=count($caretakers);

            return view('super_admin/index',['children_count'=>$children_count,'caretakers_count'=>$caretakers_count, 'messages_count'=>$messages_count,'results'=>$results]);

        }elseif(Auth::user()->role==='admin')
        {
            return view('admin/index');
        }elseif(Auth::user()->role==='caretaker')
        {
            $messages=DB::table('messages')
            ->where('created_at', 'like','%'.date("Y-m-d") .'%')
            ->get();

            $messages_count=count($messages);

            $results =DB::table('assign_children')
                ->where([
                    ['caretaker_id',Auth::user()->id],
                    ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']
                ])
                ->join('children', 'assign_children.child_id', '=', 'children.id')
                ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
                ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
                ->select('children.id','children.child_fullname','guardians.guardian_name','assign_children.created_at')
                ->get();
            //return $results;
            return view('caretaker/index', ['results' => $results,'messages_count'=>$messages_count]);
            //return $results;

        }elseif(Auth::user()->role==='parent')

        {
            $messages=DB::table('messages')
            ->where('created_at', 'like','%'.date("Y-m-d") .'%')
            ->get();

            $messages_count=count($messages);
            //Load caretaker resources
            $results =DB::table('assign_children')->where([
                ['assign_children.created_at', 'like','%'.date("Y-m-d") . '%']])
                ->join('children', 'assign_children.child_id', '=', 'children.id')
                ->join('users', 'assign_children.caretaker_id', '=', 'users.id')
                ->join('guardians', 'children.guardian1_id', '=', 'guardians.id')
                ->where('user_id','=',Auth::user()->id)
                ->select('assign_children.id as assigned_id',
                    'assign_children.pickup_status',
                    'pickup_name',
                    'assign_children.created_at',
                    'fullname',
                    'position',
                    'children.id as child_id',
                    'children.child_fullname',
                    'users.fullname',
                    'users.email',
                    'guardians.guardian_name',
                    'guardians.guardian_cell',
                    'assign_children.confirm',
                    'assign_children.created_at',
                    'assign_children.updated_at as confirmed_at'
                )
                ->get();
            return view('parent/index',['results' => $results,'messages_count'=>$messages_count]);

        }
        else{
           echo '<div><h1>Sorry! You in the wrong place</h1></div>';
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        Auth::logout();
        return redirect('login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $roles=Role::all();
        return view('super_admin/create-user', compact('roles'));
    }
  
  

}
