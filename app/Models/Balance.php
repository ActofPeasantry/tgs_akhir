<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'description',
        'no_invoice',
        'date_received',
        'total_amount',
        'debit_credit',
        'balance_category_id'
    ];

    // reecognised as date
    protected $dates = ['date_received'];

    public function BalanceCategories(){
        return $this->belongsTo('App\Models\BalanceCategories', 'balance_category_id');
    }

    use HasFactory;
}
