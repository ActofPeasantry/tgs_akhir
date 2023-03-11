<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class AcceptActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('backend.admin.accept_activity.index', compact('activities'));
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

    public function accept($id)
    {
        Activity::find($id)->update(['submission_status' => 1]);
        return redirect()->route('admin.accept_activity.index');
    }

    public function deny($id)
    {
        Activity::find($id)->update(['submission_status' => 2]);
        return redirect()->route('admin.accept_activity.index');
    }

    public function accept_checked(Request $request)
    {
        Activity::whereIn('id', $request->activity_id)->update(array('submission_status' => $request->accept_checked));
        return redirect()->route('admin.accept_activity.index');
    }
}
