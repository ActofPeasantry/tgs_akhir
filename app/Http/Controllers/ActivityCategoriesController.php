<?php

namespace App\Http\Controllers;

use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ac_categories = ActivityCategory::all();
        return view('backend.activity.categories.index', compact('ac_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.activity.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ActivityCategory::create($request->all());
        return redirect()->route('activity_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityCategory  $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityCategory $activityCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityCategory  $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityCategory $activityCategory)
    {
        $ac_category = ActivityCategory::find($activityCategory->id);
        // dd($ac_category);
        return view('backend.activity.categories.edit', compact('ac_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityCategory  $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityCategory $activityCategory)
    {
        ActivityCategory::find($activityCategory->id)->update($request->all());
        return redirect()->route('activity_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityCategory  $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityCategory $activityCategory)
    {
        ActivityCategory::destroy($activityCategory->id);
        return redirect()->route('activity_categories.index');
    }
}
