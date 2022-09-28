<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDetail extends Model
{
    protected $fillable = ['quality', 'photo'];

    public function Asset(){
        return $this->belongsTo('App\Models\Asset', 'asset_id');
    }

    use HasFactory;
}
