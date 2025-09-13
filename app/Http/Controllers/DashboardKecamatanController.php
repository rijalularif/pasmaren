<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKecamatanController extends Controller
{
    public function index()
    {
        $title = 'Kecamatan';
        $kecamatans = Kecamatan::filter(request(['search']))->latest()->paginate(6)->withQueryString();
        return view(
            'dashboard.kecamatans.index',
            compact('title', 'kecamatans')
        );
    }

    public function create()
    {
        return view('dashboard.kecamatans.create', [
            'kecamatans' => Kecamatan::all(),
            'title' => 'Create Kecamatan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:kecamatans',
            'color' => 'required|max:255'
        ]);
        Kecamatan::create($validatedData);
        return redirect('dashboard/kecamatans')->with('success', 'Kecamatan has been added!');
    }

    public function show(Kecamatan $kecamatan)
    {
        //
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('dashboard.kecamatans.edit', [
            // 'kecamatan' => $kecamatan,
            'title' => 'Edit Kecamatan',
            'kecamatans' => Kecamatan::all()
        ]);
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $rules = [
            'name' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);

        Kecamatan::where('id', $kecamatan->id)
            ->update($validatedData);
        return redirect('dashboard/kecamatans')
        ->with('success', 'Kecamatan has been updated!');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        Kecamatan::destroy($kecamatan->id);
        return redirect('dashboard/kecamatans')->with('success', 'Kecamatan has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kecamatan::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
