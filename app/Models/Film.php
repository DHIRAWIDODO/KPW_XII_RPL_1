<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'ringkasan',
        'tahun',
        'poster',
        'trailer',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function kritiks()
    {
        return $this->hasMany(Kritik::class);
    }

    public function perans()
    {
    return $this->hasMany(Actor::class);
    }

    public function getAverageRatingAttribute()
    {
        return round($this->kritiks->avg('point'), 1);
    }
}