<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'activity_name',
        'description',
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

    use HasFactory;
}
