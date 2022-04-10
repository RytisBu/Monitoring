<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RegisterUserRequest $request)
    {
        $data             = $request->validated();
        $user             = new User();

        $user->name       = $data['first_name'] . ' ' . $data['last_name'];
        $user->first_name = $data['first_name'];
        $user->last_name  = $data['last_name'];
        $user->email      = $data['email'];
        $user->language   = $data['language'];
        $user->password   = Hash::make($data['password']);
        $user->save();

        return redirect()->route('main');
    }
}
