<?php

namespace App\Http\Controllers\Complaints;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use App\Http\Services\Complaints\Complaint AS ComplaintsService;
use App\Models\System;
use App\Http\Requests\Complaints\CreateComplaintRequest;


class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $complaintsFilter = ComplaintsService::denormalizeData($request);
        $users            = User::getActiveUsers();
        $systems          = System::where('deleted', '0')->get();
        $orderBy          = ComplaintsService::sortBy($request->sort);
        $orderType        = ComplaintsService::sortType($request->orderType);
        $filter           = ComplaintsService::filter($request->all());

        if (!empty($filter)) {
            $complaints = Complaint::with('system', 'user', 'createdBy', 'updatedBy')->where($filter)->where('deleted', '0')->orderBy($orderBy, $orderType)->paginate(50);
        } else {
            $complaints = Complaint::with('system', 'user', 'createdBy', 'updatedBy')->where('deleted', '0')->orderBy($orderBy, $orderType)->paginate(50);
        }

        return view('complaints.list', compact('complaints', 'complaintsFilter', 'users', 'systems', 'orderBy', 'orderType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users   = User::getActiveUsers();
        $systems = System::getActiveSystems();

        return view('complaints.create', compact('users', 'systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateComplaintRequest $request)
    {
        $user = User::where('id', $request->assigned_user_id)->first();

        $complaint                   = new Complaint();
        $complaint->name             = $request->name;
        $complaint->assigned_user_id = $request->assigned_user_id;
        $complaint->status           = $request->status;
        $complaint->priority         = $request->priority;
        $complaint->category         = $request->category;
        $complaint->system_id        = $request->system_id;
        $complaint->description      = $request->description;
        $complaint->created_by_user  = Auth::user()->id;
        $complaint->updated_by_user  = Auth::user()->id;
        $complaint->deleted          = '0';
        $complaint->save();

        return redirect()->route('complaint.show', $complaint->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::with('user', 'system', 'createdBy', 'updatedBy')
            ->where('id', $id)
            ->where('deleted', '!=', '1')
            ->first();

        if(empty($complaint)) {
            return view('complaint.list');
        }

        return view('complaints.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint = Complaint::with('user', 'system')->where('deleted', '0')->first();
        $users     = User::getActiveUsers();
        $systems   = System::getActiveSystems();

        return view('complaints.edit', compact('users', 'systems', 'complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateComplaintRequest $request, $id)
    {
        $complaint= Complaint::where('id', $id)->first();

        if(empty($complaint)) { return $this->create(); }

        $complaint->name             = $request->name;
        $complaint->assigned_user_id = $request->assigned_user_id;
        $complaint->status           = $request->status;
        $complaint->priority         = $request->priority;
        $complaint->category         = $request->category;
        $complaint->system_id        = $request->system_id;
        $complaint->description      = $request->description;
        $complaint->updated_by_user  = Auth::user()->id;
        $complaint->save();

        return redirect()->route('complaint.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Complaint::find($id)->delete();

        if($response) {
            return redirect()->route('complaint.list');
        }

        return redirect()->route('complaint.show', $id);
    }
}
