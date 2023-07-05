<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kelurahan</title>
</head>
<body>
    <h1>Daftar Kelurahan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrasiList as $registrasi)
                <tr>
                    <td>{{ $registrasi->id }}</td>
                    <td>{{ $registrasi->nama_kelurahan }}</td>
                    <td>{{ $registrasi->nama_kecamatan }}</td>
                    <td>{{ $registrasi->nama_kota }}</td>
                    <td>
                        <form action="{{ route('registrasi.edit', ['id' => $registrasi->id]) }}" method="GET">
                            @csrf
                            <button type="submit">Edit</button>
                        </form>
                        <form action="{{ route('registrasi.delete', ['id' => $registrasi->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('registrasi.create') }}">Tambah Kelurahan</a>
</body>
</html>
