<?php

namespace App\Http\Controllers;

use App\Models\Maren;
use App\Models\Kecamatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardMarenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Madrasah & Pesantren';
        return view('dashboard.marens.index', [
            'marens' => Maren::where('author_id', Auth::user()->id)->get(),
            'title' => 'Madrasah'

        ]);
    }


    /**
     * Show the form  for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.marens.create', [
            'kecamatans' => Kecamatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => 'required|max:255',
            'slug'          => 'required|unique:marens',
            'category_id'   => 'required',
            'image'         => 'image|file|max:1024',
            'body'          => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('maren-images');
        }

        $validatedData['user_id'] = auth()->user->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Maren::create($validatedData);

        return redirect('dashboard/marens')->with('success', 'New maren has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maren  $maren
     * @return \Illuminate\Http\Response
     */
    public function show(Maren $maren)
    {
        return view('dashboard.marens.show', [
            'maren' => $maren
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maren  $maren
     * @return \Illuminate\Http\Response
     */
    public function edit(Maren $maren)
    {
        return view('dashboard.marens.edit', [
            'maren' => $maren,
            'kecamatans' => Kecamatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maren  $maren
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maren $maren)
    {
        $rules = [
            'title'         => 'required|max:255',
            'category_id'   => 'required',
            'image'         => 'image|file|max:1024',
            'body'          => 'required'
        ];

        if ($request->slug != $maren->slug) {
            $rules['slug'] = 'required|unique:marens';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('maren-images');
        }

        $validatedData['user_id'] = auth()->user->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Maren::where('id', $maren->id)
            ->update($validatedData);

        return redirect('dashboard/marens')->with('success', 'Maren has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maren  $maren
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maren $maren)
    {
        if ($maren->image) {
            Storage::delete($maren->image);
        }

        Maren::destroy($maren->id);

        return redirect('dashboard/marens')->with('success', 'Maren has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Maren::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
