<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::latest()->get();
        return view('casts.index', compact('casts'));
    }

    public function create()
    {
        return view('casts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:45',
            'umur'  => 'required|integer',
            'bio'   => 'required|string',
        ]);

        Cast::create($validated);

        return redirect()->route('cast.index')->with('success', 'Cast berhasil ditambahkan.');
    }

    public function show(Cast $cast)
    {
        return view('casts.show', compact('cast'));
    }

    public function edit(Cast $cast)
    {
        return view('casts.edit', compact('cast'));
    }

    public function update(Request $request, Cast $cast)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:45',
            'umur'  => 'required|integer',
            'bio'   => 'required|string',
        ]);

        $cast->update($validated);

        return redirect()->route('cast.index')->with('success', 'Cast berhasil diupdate.');
    }

    public function destroy(Cast $cast)
    {
        $cast->delete();
        return redirect()->route('cast.index')->with('success', 'Cast berhasil dihapus.');
    }
}