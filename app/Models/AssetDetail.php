<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDetail extends Model
{
    protected $fillable = ['quality', 'procurement_date', 'photo', 'budget', 'submission_status'];
    protected $casts = ['procurement_date' => 'date'];

    public function Asset(){
        return $this->belongsTo('App\Models\Asset', 'asset_id');
    }
    public function Qualitytext($asset_quality){
        switch ($asset_quality) {
            case '1':
                return "Baik";
                break;
            case '2':
                return "Tidak Baik";
            default:
                return "Tidak ada pada kategori kualitas";
                break;
        }
    }

    use HasFactory;
}
