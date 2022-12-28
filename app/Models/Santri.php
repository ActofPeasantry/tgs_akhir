<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
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
    use HasFactory;
}
