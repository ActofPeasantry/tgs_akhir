<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['asset_name','asset_categories_id'];

    public function AssetCategory(){
        return $this->belongsTo('App\Models\AssetCategory', 'asset_categories_id');
    }

    public function AssetDetail(){
        return $this->hasMany('App\Models\AssetDetail', 'asset_id', 'id');
    }

    public function totalAsset($id){
        $total = $this->AssetDetail()->where('id', $id)->count();
        if ($total < 1) {
            return "Data Aset belum dimasukkan";
        } else {
            return $total;
        }

    }

    use HasFactory;
}
