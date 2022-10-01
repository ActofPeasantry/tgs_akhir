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
    public function Qualitytext($asset_quality){
        switch ($asset_quality) {
            case '1':
                return "Baik";
                break;
            case '2':
                return "Sedang";
                break;
            case '3':
                return "Buruk";
                break;
            default:
                return "Tidak ada pada kategori kualitas";
                break;
        }
    }

    use HasFactory;
}
