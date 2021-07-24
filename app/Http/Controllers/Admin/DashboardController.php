<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\KasusModel;
use App\Model\KriminalModel;
use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->toDateString();
        $data = array(
            'lakalintas' => KasusModel::orderBy('created_at', 'desc')->take(1)->get(),
            'kriminalitas' => KriminalModel::orderBy('created_at', 'desc')->take(1)->get(),
            'total_laka' => KasusModel::count(),
            'total_kriminal' => KriminalModel::count(),
            'total_korban' => KasusModel::sum('jumlah_korban'),
            'total_today' => KasusModel::where('created_at', $date)->count(),
        );
        return view('admin.dashboard')->with('data', $data);
    }
}
