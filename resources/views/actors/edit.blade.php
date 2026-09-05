<h1>Edit Peran</h1>

<form action="{{ route('actor.update', $actor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Film</label>
    <select name="film_id" required>
        @foreach($films as $film)
            <option value="{{ $film->id }}" {{ $actor->film_id == $film->id ? 'selected' : '' }}>
                {{ $film->judul }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Cast (Aktor)</label>
    <select name="cast_id" required>
        @foreach($casts as $cast)
            <option value="{{ $cast->id }}" {{ $actor->cast_id == $cast->id ? 'selected' : '' }}>
                {{ $cast->nama }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Nama Peran</label>
    <input type="text" name="nama" value="{{ $actor->nama }}" maxlength="45" required>
    <br><br>

    <button type="submit">Update</button>
</form>