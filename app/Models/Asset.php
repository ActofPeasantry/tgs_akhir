<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'asset_name','submission_status','asset_categories_id'];

    public function AssetCategory(){
        return $this->belongsTo('App\Models\AssetCategory', 'asset_categories_id');
    }

    public function AssetDetail(){
        return $this->hasMany('App\Models\AssetDetail', 'asset_id', 'id');
    }

    public function totalAsset($id){
        $total = $this->AssetDetail()->where([['asset_id', $id], ['submission_status', 1]])->count();
        if ($total < 1) {
            return "Data Aset belum dimasukkan";
        } else {
            return $total;
        }

    }
    public function SubmittedAsset($id){
        // dd($total);
        $total = $this->AssetDetail()->where([['asset_id', $id], ['submission_status', 0]])->count();
        if ($total < 1) {
            return "";
        } else {
            return $total." asset sedang diproses";
        }
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    use HasFactory;
}
