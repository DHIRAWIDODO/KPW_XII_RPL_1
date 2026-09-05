<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Kritik;
use Illuminate\Http\Request;

class KritikController extends Controller
{
    public function store(Request $request, Film $film)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
            'point' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        Kritik::create([
            'user_id' => auth()->id(),
            'film_id' => $film->id,
            'content' => $validated['content'],
            'point' => $validated['point'],
        ]);

        return back()->with('success', 'Ulasan berhasil ditambahkan.');
    }
}