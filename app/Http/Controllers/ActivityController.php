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
        $events = array();
        $activities = Activity::all()->where('submission_status', 1);
        // dd($activities->where('submission_status', 1));
        foreach($activities as $activity){
            switch ($activity->status) {
                case 1:
                    $events[] = [
                        'id' => $activity->id,
                        'url' => route('activity.show', $activity->id),
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#00c0ef', //Info (aqua)
                        'borderColor'    => '#00c0ef' //Info (aqua)
                    ];
                    break;
                case 2:
                    $events[] = [
                        'id' => $activity->id,
                        'url' => route('activity.show', $activity->id),
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#00a65a', //Success (green)
                        'borderColor'    => '#00a65a', //Success (green)
                    ];
                    break;
                default:
                    $events[] = [
                        'id' => $activity->id,
                        'url' => route('activity.show', $activity->id),
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#dc3545', //red
                        'borderColor'    => '#dc3545' //red
                    ];
                    break;
            }
        }
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
        return redirect()->route('activity.index')->with('success', 'Data berhasil ditambahkan');
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
}
