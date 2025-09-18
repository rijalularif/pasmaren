<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class MadrasahController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $title = 'Data Madrasah';
        $madrasahs = Lembaga::query()
            ->whereIn('jenis', ['RA', 'MI', 'MTs', 'MA'])
            ->when($q !== '', function ($query) use ($q) {
                $like = '%' . str_replace(' ', '%', $q) . '%';
                $query->where(function ($w) use ($like) {
                    $w->where('no_statistik', 'LIKE', $like)
                        ->orWhere('nama_lembaga', 'LIKE', $like)
                        ->orWhere('npsn', 'LIKE', $like)
                        ->orWhere('alamat', 'LIKE', $like)
                        ->orWhere('jenis', 'LIKE', $like);
                });
            })
            ->orderBy('nama_lembaga')
            ->paginate(20)
            ->withQueryString();

        return view('madrasah', compact('title', 'madrasahs', 'q'));
    }

    public function show(Lembaga $lembaga)
    {
        return view('lembaga', [
            'title' => 'Detail Madrasah',
            'lembaga' => $lembaga,
        ]);
    }
}
