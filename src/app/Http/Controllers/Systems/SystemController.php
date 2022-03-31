<?php

namespace App\Http\Controllers\Systems;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use App\Http\Services\Systems\System AS SystemsService;

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

        $orderBy       = SystemsService::sortBy($request->sort);
        $orderType     = SystemsService::sortType($request->orderType);
        $systemsFilter = SystemsService::denormalizeData($request);
        $filter        = SystemsService::filter($request->all());

        if (!empty($filter)) {
            $systems = System::where($filter)->orderBy($orderBy, $orderType)->paginate(5);
        } else {
            $systems = System::orderBy($orderBy, $orderType)->paginate(5);
        }

        return view('systems.list', compact('systems', 'orderBy', 'orderType', 'systemsFilter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
