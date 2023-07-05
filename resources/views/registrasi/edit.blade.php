<!DOCTYPE html>
<html>
<head>
    <title>Edit Registrasi</title>
</head>
<body>
    <h1>Edit Registrasi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('registrasi.edit', ['id' => $registrasi->id]) }}" method="POST">
        @csrf
        <label for="nama_kelurahan">Kelurahan:</label>
        <input type="text" name="nama_kelurahan" id="nama_kelurahan" value="{{ $registrasi->nama_kelurahan }}">

        <label for="kecamatan">Kecamatan:</label>
        <input type="text" name="kecamatan" id="kecamatan" value="{{ $registrasi->kecamatan }}">

        <label for="kota">Kota:</label>
        <input type="text" name="kota" id="kota" value="{{ $registrasi->kota }}">

        <button type="submit">Update</button>
    </form>
</body>
</html>
