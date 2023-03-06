<?php

namespace App\Http\Controllers;

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
        $events = array();
        $activities = Activity::all();
        foreach($activities as $activity){
            // if($activity->submission_status == 1 ){ }
            switch ($activity->status) {
                case 1:
                    $events[] = [
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#f39c12', //yellow
                        'borderColor'    => '#f39c12' //yellow
                    ];
                    break;
                case 2:
                    $events[] = [
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#00a65a', //Success (green)
                        'borderColor'    => '#00a65a', //Success (green)
                    ];
                    break;
                case 3:
                    $events[] = [
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#dc3545', //red
                        'borderColor'    => '#dc3545', //red
                    ];
                    break;
                default:
                    $events[] = [
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#00c0ef', //Info (aqua)
                        'borderColor'    => '#00c0ef' //Info (aqua)
                    ];
                    break;
            }
        }
        // dd($events);
        return view('backend.activity.index', compact('activities', 'events'));
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
        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
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
        // dd($activity);
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
        //
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
        return redirect()->route('activity.index');
    }
}
