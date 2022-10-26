<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
        'nama_santri',
        'born_place',
        'born_date',
        'gender',
        'school_name',
        'school_class',
        'telp_number'
    ];
    use HasFactory;
}
