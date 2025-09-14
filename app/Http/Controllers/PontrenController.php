<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembaga;

class PontrenController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $title = 'Data Pesantren, MDT & LPQ';
        $pontrens = Lembaga::query()
            ->whereIn('jenis', ['PP', 'MDT', 'LPQ'])
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
            ->orderBy('jenis', 'DESC')
            ->paginate(20)
            ->withQueryString();

        return view('pontren', compact('title', 'pontrens', 'q'));
    }

    public function show(Lembaga $lembaga)
    {
        return view('lembaga', [
            'title' => 'Detail Lembaga',
            'lembaga' => $lembaga,
        ]);
    }
}
