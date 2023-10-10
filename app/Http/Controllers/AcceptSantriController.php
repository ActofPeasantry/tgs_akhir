<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceCategory;
use App\Models\Santri;
use App\Models\SantriRegistration;
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
        $santries = SantriRegistration::all();
        $x_santries =  SantriRegistration::where('submission_status', 0)->get();
        $y_santries=  SantriRegistration::where('submission_status', '!=',0)->get();
        return view('backend.admin.accept_santri.index', compact('x_santries', 'y_santries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regist= SantriRegistration::find($id);
        // dd($regist);
        return view('backend.admin.accept_santri.show', compact('regist'));
    }

    public function accept(Request $request, $id){
        // dd($id);
        SantriRegistration::find($id)->update(['submission_status' => 1]);
        return redirect()->route('admin.accept_santri.index');
        // dd($request->all());
    }

    public function deny(Request $request, $id){
        SantriRegistration::find($id)->update(['submission_status' => 2]);
        return redirect()->route('admin.accept_santri.index');
    }

    public function accept_checked(Request $request){
        // dd($request->santri_id);
        SantriRegistration::whereIn('id', $request->santri_id)->update(array('submission_status' => $request->accept_checked));
        return redirect()->route('admin.accept_santri.index')->with('success', 'Data berhasil diubah');
    }
}
