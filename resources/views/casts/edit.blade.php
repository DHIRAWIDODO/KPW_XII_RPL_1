<h1>Edit Cast</h1>

<form action="{{ route('cast.update', $cast->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama</label>
    <input type="text" name="nama" value="{{ $cast->nama }}" maxlength="45" required>
    <br><br>

    <label>Umur</label>
    <input type="number" name="umur" value="{{ $cast->umur }}" required>
    <br><br>

    <label>Bio</label>
    <textarea name="bio" required>{{ $cast->bio }}</textarea>
    <br><br>

    <button type="submit">Update</button>
</form>