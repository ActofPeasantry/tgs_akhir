<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $santries = $user->Santries()->get();
        // dd($santries);
        return view('backend.santri.index', compact('santries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.santri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Santri::create($request->all());
        // return redirect()->route('santri.index')->with('success', 'Data berhasil ditambahkan');

        $santri = new Santri;
        $santri->user_id = $request->user_id;
        $santri->santri_name = $request->santri_name;
        $santri->tpq_grade = $request->tpq_grade;
        $santri->birth_place = $request->birth_place;
        $santri->birth_date = $request->birth_date;
        $santri->sex = $request->sex;
        $santri->address = $request->address;
        $santri->father_name = $request->father_name;
        $santri->mother_name = $request->mother_name;
        $santri->school_name = $request->school_name;
        $santri->school_grade = $request->school_grade;
        $santri->telp_number = $request->telp_number;
        // $santri->regist_fee = $request->regist_fee;
        // $santri->submission_status = 0;
        if ( isset($request->photo) ) {
            $path=$request->file('photo')->store('santri_photos', 'public');
            $santri->photo = '../../../storage/'.$path;
        }
        $santri->save();
        return redirect()->route('santri.propose')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        $santri->find($santri->id);
        return view('backend.santri.show', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        $santri->find($santri->id);
        // dd($santri);
        return view('backend.santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        // dd($santri->id);
        // Santri::find($santri->id)->update($request->all());
        $santri->user_id = $request->user_id;
        $santri->santri_name = $request->santri_name;
        $santri->tpq_grade = $request->tpq_grade;
        $santri->birth_place = $request->birth_place;
        $santri->birth_date = $request->birth_date;
        $santri->sex = $request->sex;
        $santri->address = $request->address;
        $santri->father_name = $request->father_name;
        $santri->mother_name = $request->mother_name;
        $santri->school_name = $request->school_name;
        $santri->school_grade = $request->school_grade;
        $santri->telp_number = $request->telp_number;
        // $santri->regist_fee = $request->regist_fee;
        // $santri->submission_status = 0;
        if ( isset($request->photo) ) {
            $path=$request->file('photo')->store('santri_photos', 'public');
            $santri->photo = '../../../storage/'.$path;
        }
        $santri->save();
        return redirect()->route('santri.propose')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {
        Santri::destroy($santri->id);
        return redirect()->route('santri.index')->with('error', 'Data berhasil dihapus');
    }

    public function propose()
    {
        $user = User::find(auth()->user()->id);
        $santries = $user->Santries()->get();
        // dd($santries);
        return view('backend.santri.propose', compact('santries'));
    }
}
