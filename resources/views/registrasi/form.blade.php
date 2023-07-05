<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
</head>
<body>
    <h1>Form Kelurahan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('registrasi.submit') }}" method="POST">
        @csrf
        <label for="kelurahan">Kelurahan:</label>
        <input type="text" name="kelurahan" id="kelurahan">

        <label for="kecamatan">Kecamatan:</label>
        <input type="text" name="kecamatan" id="kecamatan">

        <label for="kota">Kota:</label>
        <input type="text" name="kota" id="kota">

        <button type="submit">Submit</button>

        <a href="{{ route('registrasi.edit', ['id' => $id]) }}">Edit</a>
    </form>

    <a href="{{ route('registrasi.index') }}">Kembali ke Menu List</a>
</body>
</html>
