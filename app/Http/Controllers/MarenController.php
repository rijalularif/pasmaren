<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Maren;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class MarenController extends Controller
{
    public function index()
    {
        $title = 'Madrasah & Pesantren';
        $marens = Maren::filter(request(['search', 'kecamatan', 'author']))->latest()->paginate(5)->withQueryString();

        return view('marens', compact('title', 'marens'));
    }

    public function show(Maren $maren)
    {
        return view('maren', [
            'title' => 'Single Maren',
            'maren' => $maren,
        ]);
    }

    public function byAuthor(User $user)
    {
        $title = count($user->marens) . ' Articles by: ' . $user->name;
        $marens = $user->marens;

        return view('marens', compact('title', 'marens'));
    }

    public function byKecamatan(Kecamatan $kecamatan)
    {
        $title = 'Articles in Kecamatan: ' . $kecamatan->name;
        $marens = $kecamatan->marens;

        return view('marens', compact('title', 'marens'));
    }
}
