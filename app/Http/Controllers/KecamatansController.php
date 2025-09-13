<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Routing\Controller;

class KecamatansController extends Controller
{
    public function index()
    {
        return view('kecamatans', [
            'title' => 'Post Kecamatans',
            'kecamatans' => Kecamatan::all()
        ]);
    }
}
