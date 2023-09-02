<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetDetail;
use App\Models\Balance;
use App\Models\BalanceCategory;

class AcceptAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x_assets =  AssetDetail::where('submission_status', 0)->get();
        $y_assets=  AssetDetail::where('submission_status', '!=',0)->get();
        // dd($x_assets[0]->Asset->asset_name);
        return view('backend.admin.accept_asset.index', compact('x_assets', 'y_assets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Asset::find($id);
        $as_details= AssetDetail::where('asset_id',$id)->get();
        return view('backend.admin.accept_asset.show', compact('asset', 'as_details'));
    }

    public function accept($id){
        // dd($request);
        Asset::find($id)->update(['submission_status' => 1]);
        return redirect()->route('admin.accept_asset.index');
        // dd($request->all());
    }

    public function deny($id){
        Asset::find($id)->update(['submission_status' => 2]);
        return redirect()->route('admin.accept_asset.index');
    }

    public function accept_checked(Request $request){
        // dd($request->accept_checked == config('constants.submission_status.denied'));
        $accept_asset_detail = AssetDetail::WhereIn('id', $request->asset_detail_id);
        $pluck_id = $accept_asset_detail->pluck('asset_id');

        if ($request->accept_checked == config('constants.submission_status.accepted')) {
            $assets = Asset::whereIn('id', $pluck_id)->get();
            foreach ($assets as $asset) {
                if ($asset->submission_status == 0) {
                    $asset->submission_status = $request->accept_checked;
                    $asset->save();
                }
            };

            $check_balance_category = BalanceCategory::where('category_name', config('constants.asset_balance_category'))->get();
            // dd(count($check_balance_category));
            if (count($check_balance_category) <= 0) {
                BalanceCategory::create([
                    'category_name' => config('constants.asset_balance_category'),
                    'debit_credit' => config('constants.debit_credit.debit'),
                ]);
            }

            $category = BalanceCategory::where('category_name', 'Pembayaran Aset')->first();
            $accepts = $accept_asset_detail->get();
            // dd($accepts[1]->Asset->asset_name);
            // dd($category);
            foreach ($accepts as $accept) {
                if ($accept->budget > 0) {
                    Balance::create([
                        'user_id' => auth()->user()->id,
                        'description' => $accept->Asset->asset_name,
                        'date_received' => now(),
                        'total_amount' => $accept->budget,
                        'balance_category_id' => $category->id
                    ]);
                }
            }
        }

        $accept_asset_detail->update(['submission_status' => $request->accept_checked]);
        return redirect()->route('admin.accept_asset.index')->with('success', 'Data berhasil diubah');
        // dd($santri->get());
    }
}
