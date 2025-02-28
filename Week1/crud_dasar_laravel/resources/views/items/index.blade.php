<!DOCTYPE html>
<html>
<head>
    <title>Item List</title> <!-- Menentukan judul halaman -->
</head>
<body>
    <h1>Item</h1> <!-- Judul halaman -->

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses dari session -->
    @endif

    <!-- Link untuk menambah item baru -->
    <a href="{{ route('items.create') }}">Add Item</a> <!-- Link ke halaman form tambah item -->

    <!-- Daftar item -->
    <ul>
        @foreach ($items as $item) <!-- Mengiterasi setiap item -->
            <li>
                {{ $item->name }} - <!-- Menampilkan nama item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- Link ke halaman edit item -->

                <!-- Formulir untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> <!-- Formulir untuk menghapus item -->
                    @csrf <!-- Menambahkan token CSRF untuk keamanan -->
                    @method('DELETE') <!-- Menambahkan metode DELETE untuk penghapusan -->
                    <button type="submit">Delete</button> <!-- Tombol untuk mengirim form dan menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
