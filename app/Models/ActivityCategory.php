<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    protected $fillable = ['category_name'];

    public function Activity(){
        return $this->hasMany('App\Models\Activity', 'activity_category_id', 'id');
    }
    use HasFactory;
}
