<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with(['genre', 'kritiks'])->latest()->get();

        return view('films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();

        return view('films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:45'],
            'tahun' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'genre_id' => ['required', 'exists:genres,id'],
            'ringkasan' => ['required', 'string'],
            'poster' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'trailer' => ['nullable', 'mimes:mp4,mov,avi', 'max:20480'],
        ]);

        $validated['poster'] = $request->file('poster')->store('posters', 'public');

        if ($request->hasFile('trailer')) {
            $validated['trailer'] = $request->file('trailer')->store('trailers', 'public');
        }

        Film::create($validated);

        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function show(Film $film)
    {
        $film->load(['genre', 'kritiks.user']);

        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();

        return view('films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:45'],
            'tahun' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'genre_id' => ['required', 'exists:genres,id'],
            'ringkasan' => ['required', 'string'],
            'poster' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'trailer' => ['nullable', 'mimes:mp4,mov,avi', 'max:20480'],
        ]);

        if ($request->hasFile('poster')) {
            if ($film->poster) {
                Storage::disk('public')->delete($film->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        if ($request->hasFile('trailer')) {
            if ($film->trailer) {
                Storage::disk('public')->delete($film->trailer);
            }
            $validated['trailer'] = $request->file('trailer')->store('trailers', 'public');
        }

        $film->update($validated);

        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        if ($film->poster) {
            Storage::disk('public')->delete($film->poster);
        }
        if ($film->trailer) {
            Storage::disk('public')->delete($film->trailer);
        }

        $film->delete();

        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus.');
    }
}