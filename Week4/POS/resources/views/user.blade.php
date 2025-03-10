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
            <tr>
                <td>{{ $data->user_id }}</td> <!-- $d ini mewakili data dari data dari tabel m_user karena seperti yang dilakukan tadi 'data' = $user dan $user itu UserModel yang isinya m_user -->
                <td>{{ $data->username }}</td> <!-- selnjutnya tampilkan data di baris pertama dengan isi dari user_id di satu persatu sampe akhir dan terus sampai $data sudah ditampilakan -->
                <td>{{ $data->nama }}</td>                
                <td>{{ $data->level_id }}</td>    
            </tr>            
        </table>
    </body>
</html>