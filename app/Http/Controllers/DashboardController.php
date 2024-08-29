<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalHargaHarian = DB::table('orders')
        ->whereDate('created_at', Carbon::today())
        ->sum('total_harga');

        return view('dashboard', compact('totalHargaHarian'));
    }

}
