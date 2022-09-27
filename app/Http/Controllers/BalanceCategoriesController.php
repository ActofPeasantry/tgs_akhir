<?php

namespace App\Http\Controllers;

use App\Models\BalanceCategories;
use Illuminate\Http\Request;

class BalanceCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $b_categories =  BalanceCategories::all();
        // dd($balances[0]->BalanceCategories->category_name);
        return view('backend.balance.categories.index', compact('b_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.balance.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BalanceCategories::create($request->all());
        return redirect()->route('balance_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceCategories  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceCategories $balanceCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceCategories  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceCategories $balanceCategories, $id)
    {
         // dd(Balance::find($balance->id));
         $b_category = BalanceCategories::find($id);
         //  dd($b_category);
         return view('backend.balance.categories.edit', compact('b_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BalanceCategories  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BalanceCategories $balanceCategories)
    {
        BalanceCategories::find($balanceCategories->id)->update($request->all());
        return redirect()->route('balance_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceCategories  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceCategories $balanceCategories)
    {
        BalanceCategories::destroy($balanceCategories->id);
        return redirect()->route('balance_categories.index');
    }
}
