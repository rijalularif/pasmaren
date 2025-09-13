<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Validation\Rule;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardLembagaController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $title = 'Lembaga';
        $items = Lembaga::query()
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
            ->paginate(15)
            ->withQueryString();
        if ($request->wantsJson()) {
            return response()->json($items);
        }
        return view(
            'dashboard.lembagas.index',
            compact('title', 'items', 'q')
        );
    }

    public function create()
    {
        return view('dashboard.lembagas.create', [
            'lembagas' => Lembaga::all(),
            'title' => 'Tambah Lembaga'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_statistik'  => ['required', 'string', 'max:30', 'unique:lembagas,no_statistik'],
            'npsn'          => ['nullable', 'string', 'max:30'],
            'slug'          => 'required|unique:lembagas',

            'akreditasi'    => ['nullable', 'string'],
            'jumlah_rombel' => ['nullable', 'integer'],
            'jumlah_guru'   => ['nullable', 'integer'],
            'jumlah_siswa'  => ['nullable', 'integer'],
            'kecamatan'     => ['required', 'string'],

            'nama_lembaga'  => ['required', 'string', 'max:255'],
            'jenis'         => ['required', Rule::in(['RA', 'MI', 'MTs', 'MA', 'PP', 'LPQ', 'MDT'])],
            'alamat'        => ['required', 'string'],
            'map_embed_url' => ['nullable', 'url'],
            'latitude'      => ['nullable', 'numeric', 'between:-90,90'],
            'longitude'     => ['nullable', 'numeric', 'between:-180,180'],
        ]);
        Lembaga::create($data);
        return redirect('dashboard/lembagas')->with('success', 'Data lembaga berhasil dibuat.');
    }

    public function show(Lembaga $lembaga)
    {
        //
    }

    public function edit(Lembaga $lembaga)
    {
        return view('dashboard.lembagas.edit', [
            'lembaga'   => $lembaga,
            'lembagas'  => Lembaga::all(),
            'title'     => "Edit Lembaga"
        ]);
    }

    public function update(Request $request, Lembaga $lembaga)
    {
        $data = $request->validate([
            'no_statistik'  => [
                'required',
                'string',
                'max:30',
                Rule::unique('lembagas', 'no_statistik')->ignore($lembaga->id),
            ],
            'npsn'  => ['nullable', 'string', 'max:30'],
            'nama_lembaga'  => ['required', 'string', 'max:255'],
            'jenis'         => ['required', Rule::in(['RA', 'MI', 'MTs', 'MA', 'PP', 'LPQ', 'MDT'])],

            'akreditasi'    => ['nullable', 'string'],
            'jumlah_rombel' => ['nullable', 'integer'],
            'jumlah_guru'   => ['nullable', 'integer'],
            'jumlah_siswa'  => ['nullable', 'integer'],
            'kecamatan'     => ['required', 'string'],

            'alamat'        => ['required', 'string'],
            'map_embed_url' => ['nullable', 'url'],
            'latitude'      => ['nullable', 'numeric', 'between:-90,90'],
            'longitude'     => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        Lembaga::where('id', $lembaga->id)
            ->update($data);
        return redirect('dashboard/lembagas')
            ->with('success', 'Data lembaga berhasil diperbarui.');
    }

    public function destroy(Lembaga $lembaga)
    {
        $lembaga->delete();

        return redirect('dashboard/lembagas')
            ->with('success', 'Data lembaga berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Lembaga::class, 'slug', $request->nama_lembaga);
        return response()->json(['slug' => $slug]);
    }
}
