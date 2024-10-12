<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Department;
use App\Models\LppmUser;
use Illuminate\Http\Request;
use App\User;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

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
        $users          = User::pluck('id', 'name');
        $organizations  = Organization::pluck('id', 'name');
        $id             = Auth::user()->id;

        if (Auth::user()->hasRole('KETUA_PENELITIAN')) {
            $isExist = LppmUser::select('user_id')->where('user_id', $id)->doesntExist();

            if($isExist)
            {          
                $departments    = Department::orderBy('name','ASC')->pluck('id','name');     
                return view('lppm-user.create',compact('departments'));
            }
        } 

        return view('home', compact('users','organizations'));
    }
}
