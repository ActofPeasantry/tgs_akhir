<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetDetail;
use Illuminate\Http\Request;

class AssetDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd(isset($request->photo));
        $asset = new AssetDetail;
        $asset->quality = $request->quality;
        $asset->asset_id = $request->asset_id;
        $asset->procurement_date = $request->procurement_date;
        $asset->budget = $request->budget;
        if ( isset($request->photo) ) {
            $path=$request->file('photo')->store('mosque_assets', 'public');
            $asset->photo = '../../../storage/'.$path;
        }
        $asset->save();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Http\Response
     */
    public function show(AssetDetail $assetDetail)
    {
        dd('coming soon');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetDetail $assetDetail)
    {
        $as_detail = AssetDetail::find($assetDetail->id);
        $as_id = $as_detail;
        return view('backend.mosque_asset.details.edit', compact('as_detail', 'as_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetDetail $assetDetail)
    {
        // $asset = $assetDetail->asset_id;
        // dd($request->file('photo'));
        $assetDetail->quality = $request->quality;
        $assetDetail->procurement_date = $request->procurement_date;
        $assetDetail->budget = $request->budget;
        if ( isset($request->photo) ) {
            $path=$request->file('photo')->store('mosque_assets', 'public');
            $assetDetail->photo = '../../../storage/'.$path;
        }
        $assetDetail->save();
        return redirect()->route('asset.show', ['asset' => $assetDetail->asset_id])->with('success', 'Data berhasil diubah');
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetDetail $assetDetail)
    {
        // dd($assetDetail);
        // $as_id = $assetDetail->asset_id;
        AssetDetail::destroy($assetDetail->id);
        return redirect()->back()->with('error', 'Data berhasil dihapus');
    }
}
