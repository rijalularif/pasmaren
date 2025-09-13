<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Madrasah & Pesantren';

        // Hitung jumlah lembaga per jenis
        $lembagaCounts = Lembaga::select('jenis', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis')
            ->get()
            ->keyBy('jenis'); // supaya aksesnya gampang pakai key
            
        // Hitung total semua lembaga
        $totalLembaga = Lembaga::count();
        return view('dashboard.index', compact('title', 'lembagaCounts', 'totalLembaga'));
    }
}
