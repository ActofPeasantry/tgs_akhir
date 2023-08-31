<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Balance;
use App\Models\BalanceCategory;
use Illuminate\Http\Request;

class AcceptActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x_activities =  Activity::where('submission_status', 0)->get();
        $y_activities=  Activity::where('submission_status', '!=',0)->get();
        return view('backend.admin.accept_activity.index', compact('x_activities', 'y_activities'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity= Activity::find($id);
        return view('backend.admin.accept_activity.show', compact('activity'));
    }

    public function accept($id)
    {
        Activity::find($id)->update(['submission_status' => 1]);
        return redirect()->route('admin.accept_activity.index')->with('success', 'Data berhasil diubah');
    }

    public function deny($id)
    {
        Activity::find($id)->update(['submission_status' => 2]);
        return redirect()->route('admin.accept_activity.index')->with('success', 'Data berhasil diubah');
    }

    public function accept_checked(Request $request)
    {
        // dd(auth()->user()->id);
        $accepts = Activity::whereIn('id', $request->activity_id);
        $check_balance_category = BalanceCategory::where('category_name', config('constants.activity_balance_category'))->get();
        // dd(count($check_balance_category) <= 0);
        if ($request->accept_checked == 1) {
            if (count($check_balance_category) <= 0) {
                BalanceCategory::create([
                    'category_name' => config('constants.activity_balance_category'),
                    'debit_credit' => config('constants.debit_credit.debit'),
                ]);
            }
            $category = BalanceCategory::where('category_name', config('constants.activity_balance_category'))->first();
            // dd($category->id);
            foreach ($accepts->get() as $accept) {
                if ($accept->budget > 0) {
                    Balance::create([
                        'user_id' => auth()->user()->id,
                        'description' => $accept->activity_name,
                        'date_received' => now(),
                        'total_amount' => $accept->budget,
                        'balance_category_id' => $category->id
                    ]);
                }
            }
        }
        // dd(count($accepts->get()));
        $accepts->update(array('submission_status' => $request->accept_checked));
        return redirect()->route('admin.accept_activity.index')->with('success', 'Data berhasil diubah');
    }
}
