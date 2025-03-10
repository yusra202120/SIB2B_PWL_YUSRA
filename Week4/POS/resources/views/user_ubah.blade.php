<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data User</title>
</head>

<body>

<h1>Form Ubah Data User</h1>
<a href="{{ url('/user') }}">Kembali</a>
<br><br>

<form method="post" action="{{ url('/user/ubah_simpan/' . $data->user_id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <label>Username</label>
    <input type="text" name="username" placeholder="Masukan Username" value="{{ $data->username }}">
    <br>

    <label>Nama</label>
    <input type="text" name="nama" placeholder="Masukan Nama" value="{{ $data->nama }}">
    <br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukan Password" value="{{ $data->password }}">
    <br>

    <label>Level ID</label>
    <input type="number" name="level_id" placeholder="Masukan ID Level" value="{{ $data->level_id }}">
    <br><br>

    <input type="submit" class="btn btn-success" value="Ubah">
</form>
</body>
</html>