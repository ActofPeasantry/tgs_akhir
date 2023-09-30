<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpqPeriod extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'start_date', 'end_date'];
    protected $casts = ['start_date' => 'date', 'end_date' => 'date'];

    public function santriRegistrations(){
        return $this->hasMany('App\Models\SantriRegistration', 'tpq_period_id');
    }
}
