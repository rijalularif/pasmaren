<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Support\Facades\DB;

class GisController extends Controller
{
    public function index()
    {
        $title = 'Persebaran Madrasah & Pesantren Kab. Pasaman';
        $lembaga = Lembaga::select('nama_lembaga', 'jenis', 'kecamatan', 'latitude', 'longitude')->get();

        $lembagaCounts = Lembaga::select('jenis', DB::raw('count(*) as total'))
            ->groupBy('jenis')
            ->get()
            ->keyBy('jenis'); // Membuat array associative berdasarkan 'jenis'

        return view(
            'gis',
            compact('title', 'lembaga', 'lembagaCounts')
        );
    }
}
