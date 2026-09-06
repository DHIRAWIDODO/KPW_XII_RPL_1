<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Cast;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::with(['film', 'cast'])->latest()->get();
        return view('actors.index', compact('actors'));
    }

    public function create()
    {
        $films = Film::all();
        $casts = Cast::all();
        return view('actors.create', compact('films', 'casts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:casts,id',
            'nama'    => 'required|string|max:45',
        ]);

        Actor::create($validated);

        return redirect()->route('actor.index')->with('success', 'Peran berhasil ditambahkan.');
    }

    public function show(Actor $actor)
    {
        $actor->load(['film', 'cast']);
        return view('actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        $films = Film::all();
        $casts = Cast::all();
        return view('actors.edit', compact('actor', 'films', 'casts'));
    }

    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:casts,id',
            'nama'    => 'required|string|max:45',
        ]);

        $actor->update($validated);

        return redirect()->route('actor.index')->with('success', 'Peran berhasil diupdate.');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('actor.index')->with('success', 'Peran berhasil dihapus.');
    }
}