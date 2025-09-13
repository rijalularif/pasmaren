<?php

namespace App\Http\Controllers;

use App\Models\Pontren;
use Illuminate\Http\Request;

class DashboardPontrenController extends Controller
{
    /**
     * Tampilkan daftar pontren.
     */
    public function index()
    {
        $title = 'Pondok Pesantren';
        $pontrens = Pontren::latest()->paginate(10);
        return view('dashboard.pontrens.index', compact('title', 'pontrens'));
    }

    /**
     * Form create.
     */
    public function create()
    {
        return view('dashboard.pontrens.create');
    }

    /**
     * Simpan data pontren baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nspp' => 'nullable|string|unique:pontren,nspp',
            'nama_lembaga' => 'required|string|max:255',
            'jenjang' => 'required|in:RA,MI,MTs,MA,PP,LPQ,MDT',
            'tingkat' => 'nullable|in:Ula,Wustha,Ulya',
            'alamat' => 'required|string',
            'link_google_maps' => 'nullable|url',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'program' => 'nullable|string',
            'jumlah_santri' => 'nullable|integer|min:0',
            'jumlah_ustadz' => 'nullable|integer|min:0',
            'ruang_kelas' => 'nullable|integer|min:0',
            'rombel' => 'nullable|integer|min:0',
            'website' => 'nullable|url',
            'fasilitas' => 'nullable|string',
            'luas_tanah' => 'nullable|numeric|min:0',
        ]);

        Pontren::create($validated);

        return redirect()->route('dashboard.pontrens.index')->with('success', 'Data pontren berhasil ditambahkan.');
    }

    /**
     * Form edit.
     */
    public function edit(Pontren $pontren)
    {
        return view('dashboard.pontrens.edit', compact('pontren'));
    }

    /**
     * Update data pontren.
     */
    public function update(Request $request, Pontren $pontren)
    {
        $validated = $request->validate([
            'nspp' => 'nullable|string|unique:pontren,nspp,' . $pontren->id,
            'nama_lembaga' => 'required|string|max:255',
            'jenjang' => 'required|in:PP,MDT,LPQ',
            'tingkat' => 'nullable|in:Ula,Wustha,Ulya',
            'alamat' => 'required|string',
            'link_google_maps' => 'nullable|url',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'program' => 'nullable|string',
            'jumlah_santri' => 'nullable|integer|min:0',
            'jumlah_ustadz' => 'nullable|integer|min:0',
            'ruang_kelas' => 'nullable|integer|min:0',
            'rombel' => 'nullable|integer|min:0',
            'website' => 'nullable|url',
            'fasilitas' => 'nullable|string',
            'luas_tanah' => 'nullable|numeric|min:0',
        ]);

        $pontren->update($validated);

        return redirect()->route('dashboard.pontrens.index')->with('success', 'Data pontren berhasil diperbarui.');
    }

    /**
     * Hapus data pontren.
     */
    public function destroy(Pontren $pontren)
    {
        $pontren->delete();
        return redirect()->route('dashboard.pontrens.index')->with('success', 'Data pontren berhasil dihapus.');
    }
}
