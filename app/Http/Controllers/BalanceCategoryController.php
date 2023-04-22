<?php

namespace App\Http\Controllers;

use App\Models\BalanceCategory;
use Illuminate\Http\Request;

class BalanceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $b_categories =  BalanceCategory::all();
        // dd($b_categories[0]->id);
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
        BalanceCategory::create($request->all());
        return redirect()->route('balance_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceCategory  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceCategory $balanceCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceCategory  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceCategory $balanceCategories, $id)
    {
         // dd(Balance::find($balance->id));
         $b_category = BalanceCategory::find($id);
         //  dd($b_category);
         return view('backend.balance.categories.edit', compact('b_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BalanceCategory  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BalanceCategory $balanceCategories, $id)
    {
        BalanceCategory::find($id)->update($request->all());
        return redirect()->route('balance_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceCategory  $balanceCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceCategory $balanceCategories, $id)
    {
        // dd($id);
        BalanceCategory::destroy($id);
        return redirect()->route('balance_categories.index');
    }
}
