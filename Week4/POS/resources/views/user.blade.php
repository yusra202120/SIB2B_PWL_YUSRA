<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
        <h1>Data User</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr>
            @foreach ($data as $d)  <!-- Ambil satu persatu data dari $data as $d -->
            <tr>
                <td>{{ $d->user_id }}</td> <!-- $d ini mewakili data dari data dari tabel m_user karena seperti yang dilakukan tadi 'data' = $user dan $user itu UserModel yang isinya m_user -->
                <td>{{ $d->username }}</td> <!-- selnjutnya tampilkan data di baris pertama dengan isi dari user_id di satu persatu sampe akhir dan terus sampai $data sudah ditampilakan
                <td>{{ $d->nama }}</td>                
                <td>{{ $d->level_id }}</td>    
            </tr>            
            @endforeach
        </table>
    </body>
</html>