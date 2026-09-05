<h1>Daftar Peran</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('actor.create') }}">Tambah Peran</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Nama Peran</th>
        <th>Film</th>
        <th>Aktor</th>
        <th>Aksi</th>
    </tr>
    @foreach($actors as $actor)
    <tr>
        <td>{{ $actor->nama }}</td>
        <td>{{ $actor->film->judul ?? '-' }}</td>
        <td>{{ $actor->cast->nama ?? '-' }}</td>
        <td>
            <a href="{{ route('actor.edit', $actor->id) }}">Edit</a>
            <form action="{{ route('actor.destroy', $actor->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>