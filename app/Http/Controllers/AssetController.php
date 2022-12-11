<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\AssetDetail;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets =  Asset::all();
        // dd($assets[0]->AssetDetail->count());
        // dd($assets[0]->totalAsset(1));
        return view('backend.mosque_asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  AssetCategory::pluck('id', 'category_name');
        return view('backend.mosque_asset.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Asset::create($request->all());
        return redirect()->route('asset.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        $as_details= AssetDetail::where('asset_id',$asset->id)->get();
        $as_id = $asset->id;
        // dd($asset_details[0]->qualitytext());
        return view('backend.mosque_asset.show',compact('as_details', 'as_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        $asset->find($asset->id);
        $categories =  AssetCategory::pluck('id', 'category_name');
        return view('backend.mosque_asset.edit', compact('asset', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        Asset::find($asset->id)->update($request->all());
        return redirect()->route('asset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        Asset::destroy($asset->id);
        return redirect()->route('asset.index');
    }

    public function approve(Asset $asset)
    {
        // Asset::destroy($asset->id);
        // return redirect()->route('asset.index');
    }
    public function disapprove(Asset $asset)
    {
        // Asset::destroy($asset->id);
        // return redirect()->route('asset.index');
    }
}
