<?php

namespace App\Http\Controllers\Users;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
//        dd($request->user()->is_admin);
        return view('users.profile-view', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
//        dd($user->first_name);
//        dd($request->isMethod('post'));
        if ($request->isMethod('post')) {
            $user                  = User::find($request->user()->id);
            $user->first_name      = $request->input('first_name');
            $user->last_name       = $request->input('last_name');
            $user->address_street  = $request->input('address_street');
            $user->address_city    = $request->input('address_city');
            $user->address_country = $request->input('address_state');
            $user->language        = $request->input('language');
            $user->phone_mobile    = $request->input('phone_mobile');
            $user->work_mobile     = $request->input('work_mobile');
            $user->description     = $request->input('description');
            $user->save();
        }

        return view('users.profile-edit', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request, $filter, $value)
    {
        if ($value == 0) {
            $users = User::get();
        } else {
            $users = User::where($filter, $value)->first();
        }

//        dd($users);
//        $user = User::where('id', $id)->first();
//        dd($user);
//        dd($request->user()->is_admin);
        return response()->json($users);
    }
}
