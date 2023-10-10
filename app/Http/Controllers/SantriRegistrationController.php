<?php

namespace App\Http\Controllers;

use App\Models\SantriRegistration;
use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\TpqPeriod;
use Illuminate\Http\Request;

class SantriRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regists = SantriRegistration::whereHas('santris', function($query){
            $user_id = auth()->user()->id;
            $query->where('user_id', $user_id);
        })->get();
        // dd($regists);
        return view('backend.santri_registration.index', compact('regists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $santris = Santri::where('user_id', $user_id)->pluck('id', 'santri_name');
        $tpq_periods = TpqPeriod::pluck('id', 'name');
        // dd($santris);
        return view('backend.santri_registration.create', compact('santris', 'tpq_periods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        SantriRegistration::create($request->all());
        return redirect()->route('santri_registration.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SantriRegistration $santriRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SantriRegistration $santriRegistration)
    {
        $user_id = auth()->user()->id;
        $santriRegistration->find($santriRegistration->id);
        $santris = $santriRegistration->santris->pluck('id', 'santri_name');
        $tpq_periods = $santriRegistration->tpqPeriods->pluck('id', 'name');
        // dd($santriRegistration);
        // dd($santris);
        return view('backend.santri_registration.edit', compact('santriRegistration', 'santris', 'tpq_periods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SantriRegistration $santriRegistration)
    {
        // dd($santriRegistration->id);
        $santriRegistration->find($santriRegistration->id)->update($request->all());
        return redirect()->route('santri_registration.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SantriRegistration $santriRegistration)
    {
        // dd($santriRegistration);
        $santriRegistration->destroy($santriRegistration->id);
        return redirect()->route('santri_registration.index')->with('error', 'Data berhasil dihapus');
    }

    public function acceptedList(){
        $periods = TpqPeriod::pluck('id', 'name');
        $search_period = TpqPeriod::whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'))->first();
        // $user = User::find(auth()->user()->id);
        // $santries = $user->Santries()->get();
        $regists = SantriRegistration::where('submission_status', 1)->whereHas('TpqPeriods', function($query){
            $query->whereDate('start_date', '<=', date('Y-m-d'))->whereDate('end_date', '>=', date('Y-m-d'));
        })->get();
        // dd($search_period->id);

        return view('backend.santri_registration.registered', compact('regists', 'periods', 'search_period'));
    }

    public function searchList(Request $request){
        $search_period = TpqPeriod::find($request->tpq_period)->first();

        $periods = TpqPeriod::pluck('id', 'name');
        $regists = SantriRegistration::where([['submission_status', 1],['tpq_period_id', $search_period->id]])->get();
        // dd($search_period);
        return view('backend.santri_registration.registered', compact('regists', 'periods', 'search_period'));

        // $periods = TpqPeriod::pluck
    }
}
