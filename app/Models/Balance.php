<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'user_id',
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

    public function getYear(){
        $result=[];
        $year_balances = Balance::orderBy('date_received','DESC')->pluck('date_received');

        $x = $year_balances[0]->format('Y');
        array_push($result, $x);

        foreach ($year_balances as $year) {
            if ($year->format('Y') != $x) {
                $x = $year->format('Y');
                array_push($result, $x);
            }
        }
        return $result;
    }

    public function getMonth(){
        $result=[];
        $month_balances = Balance::orderBy('date_received','ASC')->whereYear('date_received', date('Y'))->pluck('date_received');

        $x = $month_balances[0]->format('m');
        array_push($result, $x);

        foreach ($month_balances as $month) {
            if ($month->format('m') != $x) {
                $x = $month->format('m');
                array_push($result, $x);
            }
        }
        return $result;
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    use HasFactory;
}
