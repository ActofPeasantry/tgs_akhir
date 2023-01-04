<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class AcceptSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santries = Santri::all();
        return view('backend.admin.accept_santri.index', compact('santries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $santri= Santri::find($id);
        return view('backend.admin.accept_santri.show', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accept(Request $request, $id){
        dd($request);
        Santri::find($id)->update(['submission_status' => 1]);
        return redirect()->route('admin.accept_santri.index');
        // dd($request->all());
    }

    public function deny(Request $request, $id){
        Santri::find($id)->update(['submission_status' => 2]);
        return redirect()->route('admin.accept_santri.index');
    }

    public function accept_checked(Request $request){
        Santri::whereIn('id', $request->santri_id)->update(array('submission_status' => $request->accept_checked));
        return redirect()->route('admin.accept_santri.index');
        // dd($santri->get());
    }
}
