<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_activity = new Activity;
        $years = $new_activity->getYear();
        $year = $years[0];
        $month = 0;

        $new_activities =  Activity::oldest();
        $activities = $new_activities->whereYear('schedule_start', $year)->orderBy('schedule_start', 'DESC')->get();
        return view('backend.activity.index', compact('activities', 'month', 'year', 'years', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  ActivityCategory::pluck('id', 'category_name');
        return view('backend.activity.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Activity::create($request->all());
        return redirect()->route('activity.propose')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $activity->find($activity->id);
        // dd($activity->ActivityCategory->category_name);
        return view('backend.activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $activity = Activity::find($activity->id);
        $categories =  ActivityCategory::pluck('id', 'category_name');
        $activity_status = config('constants.activity_status');
        // dd($activity_status);
        return view('backend.activity.edit', compact('activity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        Activity::find($activity->id)->update($request->all());
        return redirect()->route('activity.propose')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        Activity::destroy($activity->id);
        return redirect()->route('activity.index')->with('error', 'Data berhasil dihapus');
    }

    public function propose()
    {
        $user = User::find(auth()->user()->id);
        $activities = $user->Activities()->get();
        return view('backend.activity.propose', compact('activities'));
    }

    public function search(Request $request){
        // dd($request->all());
        $new_activity = new Activity;
        $years = $new_activity->getYear();

        $month = $request->month[0];
        $year = $request->year[0];
        // dd($year);
        if ($month != 0) {
            $new_activities =  Activity::oldest();
            $activities = $new_activities->whereMonth('schedule_start', $month)->whereYear('schedule_start', $year)->orderBy('schedule_start', 'DESC')->get();
            // dd($activities);
            return view('backend.activity.index', compact('activities', 'month', 'year', 'years', ));
        }

        $new_activities =  Activity::oldest();
        $activities = $new_activities->whereYear('schedule_start', $year)->orderBy('schedule_start', 'DESC')->get();
        return view('backend.activity.index', compact('activities', 'month', 'year', 'years', ));
    }
}
