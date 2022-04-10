<?php

namespace App\Http\Controllers\Users;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\Users\User AS UsersService;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy       = UsersService::sortBy($request->sort);
        $orderType     = UsersService::sortType($request->orderType);
        $usersFilter   = UsersService::denormalizeData($request);
        $filter        = UsersService::filter($request->all());

        if (!empty($filter)) {
            $users = User::where($filter)->where('deleted', '0')->orderBy($orderBy, $orderType)->paginate(5);
        } else {
            $users = User::where('deleted', '0')->orderBy($orderBy, $orderType)->paginate(5);
        }

        return view('users.list', compact('users', 'orderBy', 'orderType', 'usersFilter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request)
    {
        $user = $request->user();

        return view('users.profile-edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User();

        if ($request->isMethod('post')) {
            $user->name            = $request->input('first_name') . ' ' . $request->input('last_name');
            $user->first_name      = $request->input('first_name');
            $user->email           = $request->input('email');
            $user->last_name       = $request->input('last_name');
            $user->address_street  = $request->input('address_street');
            $user->address_city    = $request->input('address_city');
            $user->address_country = $request->input('address_state');
            $user->language        = $request->input('language');
            $user->phone_mobile    = $request->input('phone_mobile');
            $user->work_mobile     = $request->input('work_mobile');
            $user->description     = $request->input('description');
            $user->password        = Hash::make($request->input('new_password'));
            $user->save();
        }

        return redirect()->route('user.show', [$user->id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $user = $request->user();

        return view('users.profile-view', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = User::find($id)->delete();

        if($response) {
            return redirect()->route('user.list');
        }

        return redirect()->route('user.show', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(empty($user)) { return $this->create(); }

        $user->name            = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->first_name      = $request->input('first_name');
        $user->last_name       = $request->input('last_name');
        $user->address_street  = $request->input('address_street');
        $user->address_city    = $request->input('address_city');
        $user->address_country = $request->input('address_state');
        $user->language        = $request->input('language');
        $user->phone_mobile    = $request->input('phone_mobile');
        $user->work_mobile     = $request->input('work_mobile');
        $user->description     = $request->input('description');
        $user->password        = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('user.show', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        if(empty($user)) { return $this->create(); }

        $user->name            = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->first_name      = $request->input('first_name');
        $user->last_name       = $request->input('last_name');
        $user->address_street  = $request->input('address_street');
        $user->address_city    = $request->input('address_city');
        $user->address_country = $request->input('address_state');
        $user->language        = $request->input('language');
        $user->phone_mobile    = $request->input('phone_mobile');
        $user->work_mobile     = $request->input('work_mobile');
        $user->description     = $request->input('description');
        $user->password        = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('profile.show');
    }
}
