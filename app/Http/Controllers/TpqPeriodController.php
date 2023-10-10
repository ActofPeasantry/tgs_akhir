<?php

namespace App\Http\Controllers;

use App\Models\TpqPeriod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TpqPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = TpqPeriod::all();
        return view('backend.tpq_period.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tpq_period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        TpqPeriod::create($request->all());
        return redirect()->route('tpq_period.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TpqPeriod $tpqPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TpqPeriod $tpqPeriod)
    {
        $tpqPeriod->find($tpqPeriod->id);
        // dd($tpqPeriod);
        return view('backend.tpq_period.edit', compact('tpqPeriod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TpqPeriod $tpqPeriod)
    {
        // dd('test');
        $tpqPeriod->find($tpqPeriod->id)->update($request->all());
        return redirect()->route('tpq_period.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TpqPeriod $tpqPeriod)
    {
        TpqPeriod::destroy($tpqPeriod->id);
        return redirect()->route('tpq_period.index')->with('error', 'Data berhasil dihapus');
    }
}
