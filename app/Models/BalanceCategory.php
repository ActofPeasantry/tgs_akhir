<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];

    public function Balances(){
        return $this->hasMany('App\Models\Balance', 'balance_category_id', 'id');
    }
    use HasFactory;
}
