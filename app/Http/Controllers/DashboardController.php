<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Balance;
use App\Models\Asset;
use App\Models\Activity;
use App\Models\Santri;

class DashboardController extends Controller
{
    public function index()
    {
        $s_male = count(Santri::where(['sex' => 1, 'submission_status' => 1 ])->get());
        $s_female = count(Santri::where(['sex' => 2, 'submission_status' => 1 ])->get());
        $s_total = count(Santri::where(['submission_status' => 1 ])->get());
        $jamaah = count(UserRole::where(['role_id' => config('constants.user_role.jamaah')] )->get());
        // dd($jamaah);

        $debit_data = array();
        $credit_data = array();
        $new_balance = new Balance;
        $months = $new_balance->getMonth();
        foreach ($months as $month) {
            // array_push($test, $month);
            $insert_credit = Balance::where('debit_credit', 1)->whereYear('date_received', date('Y'))->whereMonth('date_received', $month)->get()->sum('total_amount');
            array_push($credit_data, $insert_credit);

            $insert_debit = Balance::where('debit_credit', 0)->whereYear('date_received', date('Y'))->whereMonth('date_received', $month)->get()->sum('total_amount');
            array_push($debit_data, $insert_debit);
        }
        $asset_labels = array();
        $asset_data = array();
        $assets = Asset::where('submission_status', config('constants.submission_status.accepted'))->get();
        foreach ($assets as $asset) {
            // 'labels' => $asset->asset_name,
            // 'data' => $asset->AssetDetail()->where('asset_id', $asset->id)->count()
            array_push($asset_labels, $asset->asset_name);
            array_push($asset_data, $asset->AssetDetail()->where('asset_id', $asset->id)->count());
        }
        // dd(Asset::pluck('asset_name'));
        // dd($asset[0]->totalAsset(1));
        $sum_debit = Balance::whereYear('date_received', date('Y'))->where('debit_credit', 0)->sum('total_amount');
        $sum_credit = Balance::whereYear('date_received', date('Y'))->where('debit_credit', 1)->sum('total_amount');
        $total_sum = $sum_debit-$sum_credit;

        $events = array();
        $activities = Activity::all();
        foreach($activities as $activity){
            // if($activity->submission_status == 1 ){ }
            switch ($activity->status) {
                case 1:
                    $events[] = [
                        'id' => $activity->id,
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#00c0ef', //Info (aqua)
                        'borderColor'    => '#00c0ef' //Info (aqua)
                    ];
                    break;
                case 2:
                    $events[] = [
                        'id' => $activity->id,
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#00a65a', //Success (green)
                        'borderColor'    => '#00a65a', //Success (green)
                    ];
                    break;
                default:
                    $events[] = [
                        'id' => $activity->id,
                        'title' => $activity->activity_name,
                        'start' => $activity->schedule_start,
                        'end' => $activity->schedule_end,
                        'backgroundColor'=> '#dc3545', //red
                        'borderColor'    => '#dc3545' //red
                    ];
                    break;
            }
        }
        // dd([$credit_data, $debit_data]);
        // dd([$asset_labels, $asset_data]);
        return view('dashboard', compact('debit_data', 'credit_data', 'asset_labels', 'asset_data', 'events', 'sum_debit', 'sum_credit', 'total_sum', 's_male', 's_female', 's_total', 'jamaah'));
    }
}
