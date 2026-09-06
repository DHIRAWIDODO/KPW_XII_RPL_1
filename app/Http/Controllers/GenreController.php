<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GenreController extends Controller
{
    public function index(): View
    {
        $genres = Genre::latest()->get();

        return view('genre.index', compact('genres'));
    }

    public function create(): View
    {
        return view('genre.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|min:5',
        ]);

        Genre::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('genre.index');
    }


    public function show(Genre $genre): View
    {
        return view('genre.show', compact('genre'));
    }

    public function edit(Genre $genre): View
    {
        return view('genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|min:5',
        ]);

        $genre->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre): RedirectResponse
    {
        $genre->delete();

        return redirect()->route('genre.index');
    }
}