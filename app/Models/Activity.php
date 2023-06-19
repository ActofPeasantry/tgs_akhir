<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'activity_name',
        'description',
        'penceramah_name',
        'penceramah_telp',
        'schedule_start',
        'schedule_end',
        'status',
        'submission_status',
        'activity_categories_id'
    ];

    // reecognise as date
    protected $dates = ['schedule_start', 'schedule_end'];

    public function ActivityCategory(){
        return $this->belongsTo('App\Models\ActivityCategory', 'activity_categories_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getYear(){
        $result=[];
        $year_activities = Activity::orderBy('schedule_start','DESC')->pluck('schedule_start');

        $x = $year_activities[0]->format('Y');
        array_push($result, $x);

        foreach ($year_activities as $year) {
            if ($year->format('Y') != $x) {
                $x = $year->format('Y');
                array_push($result, $x);
            }
        }
        return $result;
    }

    public function getMonth(){
        $result=[];
        $month_activities = Activity::orderBy('schedule_start','ASC')->whereYear('schedule_start', date('Y'))->pluck('schedule_start');

        $x = $month_activities[0]->format('m');
        array_push($result, $x);

        foreach ($month_activities as $month) {
            if ($month->format('m') != $x) {
                $x = $month->format('m');
                array_push($result, $x);
            }
        }
        return $result;
    }
}
