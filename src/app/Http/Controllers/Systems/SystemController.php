<?php

namespace App\Http\Controllers\Systems;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use App\Http\Services\Systems\System AS SystemsService;
use App\Models\User;
use App\Http\Requests\Systems\CreateSystemRequest;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();

        $users         = User::where('status', '=', 'Active')->get();
        $orderBy       = SystemsService::sortBy($request->sort);
        $orderType     = SystemsService::sortType($request->orderType);
        $systemsFilter = SystemsService::denormalizeData($request);
        $filter        = SystemsService::filter($request->all());

        if (!empty($filter)) {
            $systems = System::where($filter)->orderBy($orderBy, $orderType)->paginate(5);
        } else {
            $systems = System::orderBy($orderBy, $orderType)->paginate(5);
        }

        return view('systems.list', compact('systems', 'orderBy', 'orderType', 'systemsFilter', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', '=', 'Active')->get();

        return view('systems.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSystemRequest $request)
    {
        $system = new System();
        $system->name = $request->name;
        $system->assigned_user_id = $request->assigned_user_id;
        $system->status = $request->status;
        $system->description = $request->description;
        $system->created_by = Auth::user()->id;
        $system->updated_by = Auth::user()->id;
        $system->deleted = 0;
        $system->save();

        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $system = System::where('id', '=', $id)->first();
        $users = User::get();

        return view('systems.show', compact('system', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users  = User::where('status', '=', 'Active')->get();
        $system = System::where('id', '=', $id)->first();

        return view('systems.edit', compact('system', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSystemRequest $request, $id)
    {
        $system= System::where('id', '=', $id)->first();

        if(empty($system)) {
            return $this->create();
        }

        $system->name             = $request->name;
        $system->assigned_user_id = $request->assigned_user_id;
        $system->status           = $request->status;
        $system->description      = $request->description;
        $system->created_by       = Auth::user()->id;
        $system->updated_by       = Auth::user()->id;
        $system->deleted          = 0;
        $system->save();

        return redirect()->route('system.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
