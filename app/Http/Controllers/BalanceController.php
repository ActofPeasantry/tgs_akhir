<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(rolesName(1));
        $new_balance = new Balance;
        // dd();
        if ($new_balance->get()->isNotEmpty()) {
            $years = $new_balance->getYear();
            $year = $years[0];
        }
        else {
            $years = now();
            $year = now();
        }
        $month = 0;
        // dd($years);

        $model_balances =  Balance::oldest();
        $balances = $model_balances->whereMonth('date_received', date('m'))->whereYear('date_received', date('Y'))->orderBy('date_received', 'ASC')->get();

        // SALDO COUNTER (ITS BAD I KNOW)
        $saldo = [];
        if ($balances->isNotEmpty()) {
            if ($balances[0]->BalanceCategories->debit_credit == 0) {
                $insert_amount = 0 - $balances[0]->total_amount;
                array_push($saldo, $insert_amount);
            } elseif($balances[0]->BalanceCategories->debit_credit == 1) {
                $insert_amount = $balances[0]->total_amount;
                array_push($saldo, $insert_amount);
            }

            for ($i=1; $i < $balances->count(); $i++) {
                if ($balances[$i]->BalanceCategories->debit_credit == 0) {
                    $insert_amount = $saldo[$i-1] - $balances[$i]->total_amount;
                    array_push($saldo, $insert_amount);
                }
                elseif($balances[$i]->BalanceCategories->debit_credit == 1) {
                    $insert_amount = $saldo[$i-1] + $balances[$i]->total_amount;
                    array_push($saldo, $insert_amount);
                }
            }
        }
        // dd($saldo);

        $balances_debit = Balance::whereHas('BalanceCategories', function($query){
            $query->where('debit_credit', '=', 0);})
        ->whereMonth('date_received', date('m'))->whereYear('date_received', date('Y'))->orderBy('date_received', 'ASC')->get();
        $balances_credit = Balance::whereHas('BalanceCategories', function($query){
            $query->where('debit_credit', '=', 1);})
        ->whereMonth('date_received', date('m'))->whereYear('date_received', date('Y'))->orderBy('date_received', 'ASC')->get();

        $sum_debit = $balances_debit->sum('total_amount');
        $sum_credit = $balances_credit->sum('total_amount');
        $total_sum = $sum_credit - $sum_debit;

        // $categories = BalanceCategory::pluck('id', 'category_name');
        //KATEGORI LAPORAN KEUANGAN
        $categories_default = array("--Seluruh Kategori--" => 0);
        $categories_pluck = BalanceCategory::pluck('id', 'category_name')->all();
        $categories = array_merge($categories_default, $categories_pluck);
        // dd($categories);
        // $sum_debit = $balances->whereHas('BalanceCategories', function($query){
        //     $query->where('debit_credit', '=', 0);
        //  })->get()->sum('total_amount');

        // $sum_credit = $balances->whereHas('BalanceCategories', function($query){
        //     $query->where('debit_credit', '=', 1);
        // })->get()->sum('total_amount');

        // dd([$sum_credit, $sum_debit]);
        // $total_sum = $sum_credit - $sum_debit;

        return view('backend.balance.index', compact('month', 'year','balances', 'years', 'sum_debit', 'sum_credit', 'total_sum', 'categories', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  BalanceCategory::select('id', 'category_name', 'debit_credit')->get();
        // dd($categories);
        return view('backend.balance.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->date_received);
        $balance = Balance::create($request->all());
        return redirect()->route('balance.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        // dd(Balance::find($balance->id));
        $balance->find($balance->id);
        // dd($balance->debit_credit);
        $categories =  BalanceCategory::select('id', 'category_name', 'debit_credit')->get();
        return view('backend.balance.edit', compact('balance', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        // dd($request->all());
        Balance::find($balance->id)->update($request->all());
        return redirect()->route('balance.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        Balance::destroy($balance->id);
        return redirect()->route('balance.index')->with('error', 'Data berhasil dihapus');
    }

    public function search(Request $request){

        // GET REQUESTED CATEGORY YEAR AND MONTH
        $new_balance = new Balance;
        if ($new_balance->get()->isEmpty()) {
            return redirect()->route('balance.index');
        }

        else{
            $years = $new_balance->getYear();
            $month = $request->month[0];
            $year = $request->year[0];
            $category = $request->category[0];
            // dd($category);

            //QUERY BALANCE BASED ON DEBIT/CREDIT ON BALANCECATEGORIES
            $debit_balance = Balance::whereHas('BalanceCategories', function($query){
                $query->where('debit_credit', '=', 0);
            });
            $credit_balance = Balance::whereHas('BalanceCategories', function($query){
                $query->where('debit_credit', '=', 1);
            });

            //KATEGORI LAPORAN KEUANGAN
            $categories_default = array("--Seluruh Kategori--" => 0);
            $categories_pluck = BalanceCategory::pluck('id', 'category_name')->all();
            $categories = array_merge($categories_default, $categories_pluck);
            // dd($categories);

            //BALANCE REPORT BASED ON SEARCH
            if ($category == 0 && $month == 0) {
                $balances = $new_balance->whereYear('date_received', $year)->orderBy('balances.date_received', 'ASC')->get();

                // SALDO COUNTER (ITS BAD I KNOW)
                $saldo = [];
                if ($balances->isNotEmpty()) {
                    if ($balances[0]->BalanceCategories->debit_credit == 0) {
                        $insert_amount = 0 - $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    } elseif($balances[0]->BalanceCategories->debit_credit == 1) {
                        $insert_amount = $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    }

                    for ($i=1; $i < $balances->count(); $i++) {
                        if ($balances[$i]->BalanceCategories->debit_credit == 0) {
                            $insert_amount = $saldo[$i-1] - $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                        elseif($balances[$i]->BalanceCategories->debit_credit == 1) {
                            $insert_amount = $saldo[$i-1] + $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                    }
                }

                $sum_debit = $debit_balance->whereYear('date_received', $year)->sum('total_amount');
                $sum_credit = $credit_balance->whereYear('date_received', $year)->sum('total_amount');
                $total_sum = $sum_credit - $sum_debit;

                return view('backend.balance.index', compact('balances', 'month', 'year', 'years', 'sum_debit', 'sum_credit', 'total_sum','categories', 'saldo'));
            }

            elseif ($category == 0 && $month != 0) {
                $balances = $new_balance->whereMonth('date_received', $month)->whereYear('date_received', $year)->orderBy('date_received', 'ASC')->get();

                // SALDO COUNTER (ITS BAD I KNOW)
                $saldo = [];
                if ($balances->isNotEmpty()) {
                    if ($balances[0]->BalanceCategories->debit_credit == 0) {
                        $insert_amount = 0 - $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    } elseif($balances[0]->BalanceCategories->debit_credit == 1) {
                        $insert_amount = $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    }

                    for ($i=1; $i < $balances->count(); $i++) {
                        if ($balances[$i]->BalanceCategories->debit_credit == 0) {
                            $insert_amount = $saldo[$i-1] - $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                        elseif($balances[$i]->BalanceCategories->debit_credit == 1) {
                            $insert_amount = $saldo[$i-1] + $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                    }
                }

                $sum_debit = $debit_balance->whereMonth('date_received', $month)->whereYear('date_received', $year)->sum('total_amount');
                $sum_credit = $credit_balance->whereMonth('date_received', $month)->whereYear('date_received', $year)->sum('total_amount');

                $total_sum = $sum_credit - $sum_debit;
                return view('backend.balance.index', compact('balances', 'month', 'year', 'years', 'sum_debit', 'sum_credit', 'total_sum', 'categories', 'saldo'));
            }

            elseif ($category != 0 && $month == 0){
                $balances = $new_balance->where('balance_category_id', $category)->whereYear('date_received', $year)->orderBy('date_received', 'ASC')->get();

                // SALDO COUNTER (ITS BAD I KNOW)
                $saldo = [];
                if ($balances->isNotEmpty()) {
                    if ($balances[0]->BalanceCategories->debit_credit == 0) {
                        $insert_amount = 0 - $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    } elseif($balances[0]->BalanceCategories->debit_credit == 1) {
                        $insert_amount = $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    }

                    for ($i=1; $i < $balances->count(); $i++) {
                        if ($balances[$i]->BalanceCategories->debit_credit == 0) {
                            $insert_amount = $saldo[$i-1] - $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                        elseif($balances[$i]->BalanceCategories->debit_credit == 1) {
                            $insert_amount = $saldo[$i-1] + $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                    }
                }

                $sum_debit = $debit_balance->where('balance_category_id', $category)->whereYear('date_received', $year)->sum('total_amount');
                $sum_credit = $credit_balance->where('balance_category_id', $category)->whereYear('date_received', $year)->sum('total_amount');

                $total_sum = $sum_credit - $sum_debit;
                return view('backend.balance.index', compact('balances', 'month', 'year', 'years', 'sum_debit', 'sum_credit', 'total_sum', 'categories', 'saldo'));
            }

            else{
                $balances = $new_balance->where('balance_category_id', $category)->whereMonth('date_received', $month)->whereYear('date_received', $year)->orderBy('date_received', 'ASC')->get();

                // SALDO COUNTER (ITS BAD I KNOW)
                $saldo = [];
                if ($balances->isNotEmpty()) {
                    if ($balances[0]->BalanceCategories->debit_credit == 0) {
                        $insert_amount = 0 - $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    } elseif($balances[0]->BalanceCategories->debit_credit == 1) {
                        $insert_amount = $balances[0]->total_amount;
                        array_push($saldo, $insert_amount);
                    }

                    for ($i=1; $i < $balances->count(); $i++) {
                        if ($balances[$i]->BalanceCategories->debit_credit == 0) {
                            $insert_amount = $saldo[$i-1] - $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                        elseif($balances[$i]->BalanceCategories->debit_credit == 1) {
                            $insert_amount = $saldo[$i-1] + $balances[$i]->total_amount;
                            array_push($saldo, $insert_amount);
                        }
                    }
                }

                $sum_debit = $debit_balance->where('balance_category_id', $category)->whereMonth('date_received', $month)->whereYear('date_received', $year)->sum('total_amount');
                $sum_credit = $credit_balance->where('balance_category_id', $category)->whereMonth('date_received', $month)->whereYear('date_received', $year)->sum('total_amount');

                $total_sum = $sum_credit - $sum_debit;
                return view('backend.balance.index', compact('balances', 'month', 'year', 'years', 'sum_debit', 'sum_credit', 'total_sum', 'categories', 'saldo'));
            }
        }
    }
}
