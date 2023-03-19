<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Balance;
use App\Models\Asset;
use App\Models\Activity;
use App\Models\Santri;

class DashboardController extends Controller
{
    public function index()
    {
        // return view('dashboard', compact(''));
        $model_balances =  Balance::oldest();
        $balances = $model_balances->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();

        $test = $balances;
        dd($test);
        return view('dashboard');
    }
}
