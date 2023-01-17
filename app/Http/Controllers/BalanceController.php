<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_balance = new Balance;
        $years = $new_balance->getYear();

        $model_balances =  Balance::oldest();
        $balances = $model_balances->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $sum_debit = $balances->where('debit_credit', 0)->sum('total_amount');
        $sum_credit = $balances->where('debit_credit', 1)->sum('total_amount');
        $total_sum = $sum_debit-$sum_credit;

        return view('backend.balance.index', compact('balances','years', 'sum_debit', 'sum_credit', 'total_sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  BalanceCategories::pluck('id', 'category_name');
        return view('backend.balance.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $balance = Balance::create($request->all());
        return redirect()->route('balance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        // dd(Balance::find($balance->id));
        $balance->find($balance->id);
        // dd($balance->debit_credit);
        $categories =  BalanceCategories::pluck('id', 'category_name');
        return view('backend.balance.edit', compact('balance', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        Balance::find($balance->id)->update($request->all());
        return redirect()->route('balance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        Balance::destroy($balance->id);
        return redirect()->route('balance.index');
    }

    public function search(Request $request){
        // dd('test');
        $data['month'] = $request->month;
        dd($data);
    }
}
