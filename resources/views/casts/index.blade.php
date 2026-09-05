<h1>Daftar Cast</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('cast.create') }}">Tambah Cast</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Nama</th>
        <th>Umur</th>
        <th>Bio</th>
        <th>Aksi</th>
    </tr>
    @foreach($casts as $cast)
    <tr>
        <td>{{ $cast->nama }}</td>
        <td>{{ $cast->umur }}</td>
        <td>{{ Str::limit($cast->bio, 50) }}</td>
        <td>
            <a href="{{ route('cast.edit', $cast->id) }}">Edit</a>
            <form action="{{ route('cast.destroy', $cast->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>