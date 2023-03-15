<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['asset_name','submission_status','asset_categories_id'];

    public function AssetCategory(){
        return $this->belongsTo('App\Models\AssetCategory', 'asset_categories_id');
    }

    public function AssetDetail(){
        return $this->hasMany('App\Models\AssetDetail', 'asset_id', 'id');
    }

    public function totalAsset($id){
        $total = $this->AssetDetail()->where('asset_id', $id)->count();
        if ($total < 1) {
            return "Data Aset belum dimasukkan";
        } else {
            return $total;
        }

    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    use HasFactory;
}
