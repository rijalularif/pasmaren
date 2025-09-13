<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;

class PontrenController extends Controller
{
    public function index()
    {
        $title = 'Pesantren';
        $pontrens = Lembaga::whereIn('jenis', ['MDT', 'LPQ', 'PP'])
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('pontren', compact('title', 'pontrens'));
    }

    public function show(Lembaga $lembaga)
    {
        return view('lembaga', [
            'title' => 'Lembaga',
            'lembaga' => $lembaga,
        ]);
    }
}
