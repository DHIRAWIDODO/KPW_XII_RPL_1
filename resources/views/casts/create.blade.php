<h1>Tambah Cast</h1>

<form action="{{ route('cast.store') }}" method="POST">
    @csrf

    <label>Nama</label>
    <input type="text" name="nama" maxlength="45" required>
    <br><br>

    <label>Umur</label>
    <input type="number" name="umur" required>
    <br><br>

    <label>Bio</label>
    <textarea name="bio" required></textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>