<h1>Tambah Peran</h1>

<form action="{{ route('actor.store') }}" method="POST">
    @csrf

    <label>Film</label>
    <select name="film_id" required>
        <option value="">-- Pilih Film --</option>
        @foreach($films as $film)
            <option value="{{ $film->id }}">{{ $film->judul }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Cast (Aktor)</label>
    <select name="cast_id" required>
        <option value="">-- Pilih Cast --</option>
        @foreach($casts as $cast)
            <option value="{{ $cast->id }}">{{ $cast->nama }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Nama Peran</label>
    <input type="text" name="nama" maxlength="45" required>
    <br><br>

    <button type="submit">Simpan</button>
</form>