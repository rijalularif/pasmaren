<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Madrasah & Pesantren';
        return view('dashboard.index', [
            'jumlahpost' => DB::table('marens')->count(),
            'jumlahkecamatan' => DB::table('kecamatans')->count(),
            'title' => 'Dashboard'
        ]);
    }
}
