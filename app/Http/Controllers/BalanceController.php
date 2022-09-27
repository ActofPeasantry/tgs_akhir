<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceCategories;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances =  Balance::all();
        // dd($balances[0]->BalanceCategories->category_name);
        return view('backend.balance.index', compact('balances'));
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
}
