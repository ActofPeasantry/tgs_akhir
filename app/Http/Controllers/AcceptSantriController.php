<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceCategory;
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
        $x_santries =  Santri::where('submission_status', 0)->get();
        $y_santries=  Santri::where('submission_status', '!=',0)->get();
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
        $santri= Santri::find($id);
        return view('backend.admin.accept_santri.show', compact('santri'));
    }

    public function accept(Request $request, $id){
        // dd($request);
        Santri::find($id)->update(['submission_status' => 1]);
        return redirect()->route('admin.accept_santri.index');
        // dd($request->all());
    }

    public function deny(Request $request, $id){
        Santri::find($id)->update(['submission_status' => 2]);
        return redirect()->route('admin.accept_santri.index');
    }

    public function accept_checked(Request $request){
        $santries = Santri::whereIn('id', $request->santri_id);
        $check_balance_category = BalanceCategory::where('category_name', config('constants.santri_balance_category'))->get();
        // dd($santries->get());

        if ($request->accept_checked == 1) {
            if (count($check_balance_category) <= 0) {
                BalanceCategory::create([
                    'category_name' => config('constants.santri_balance_category'),
                    'debit_credit' => config('constants.debit_credit.credit'),
                ]);
            }
            $category = BalanceCategory::where('category_name', config('constants.santri_balance_category'))->first();
            // dd($category->id);
            foreach ($santries->get() as $santri) {
                if ($santri->budget > 0) {
                    Balance::create([
                        'user_id' => auth()->user()->id,
                        'description' => 'Pendaftaran santri '.$santri->santri_name,
                        'date_received' => now(),
                        'total_amount' => $santri->budget,
                        'balance_category_id' => $category->id
                    ]);
                }
            }
        }

        $santries->update(array('submission_status' => $request->accept_checked));
        return redirect()->route('admin.accept_santri.index')->with('success', 'Data berhasil diubah');
        // dd($santri->get());
    }
}
