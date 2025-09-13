<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;

class MadrasahController extends Controller

{
    public function index()
    {
        $title = 'Madrasah';

        // Filter hanya tipe RA, MI, MTs, MA
        $madrasahs = Lembaga::whereIn('jenis', ['RA', 'MI', 'MTs', 'MA'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('madrasah', compact('title', 'madrasahs'));
    }

    public function show(Lembaga $lembaga)
    {
        return view('lembaga', [
            'title' => 'Lembaga',
            'lembaga' => $lembaga,
        ]);
    }
}
