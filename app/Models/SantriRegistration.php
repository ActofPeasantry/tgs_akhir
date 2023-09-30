<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriRegistration extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'santri_id',
        'tpq_period_id',
        'regist_fee',
        'submission_status'
    ];

    public function santris(){
        return $this->belongsTo('App\Models\Santri', 'santri_id');
    }

    public function tpqPeriods(){
        return $this->belongsTo('App\Models\TpqPeriod', 'tpq_period_id');
    }

}
