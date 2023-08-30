<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
        'user_id',
        'santri_name',
        'tpq_grade',
        'birth_place',
        'birth_date',
        'sex',
        'address',
        'father_name',
        'mother_name',
        'school_name',
        'school_grade',
        'photo',
        'telp_number',
        'submission_status'
    ];
    protected $casts = ['birth_date' => 'date'];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    use HasFactory;
}
