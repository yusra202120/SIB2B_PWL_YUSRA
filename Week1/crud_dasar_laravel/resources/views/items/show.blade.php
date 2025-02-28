<!DOCTYPE html>
<html>
<head>
    <title>Item List</title> <!-- Menentukan judul halaman yang akan ditampilkan di browser -->
</head>
<body>
    <h1>Item</h1> <!-- Menampilkan heading utama halaman -->

    <!-- Menampilkan pesan sukses jika ada session dengan kunci 'success' -->
    @if (session('success'))
        <p>{{ session('success') }}</p> <!-- Jika ada pesan sukses, tampilkan pesan tersebut -->
    @endif

    <!-- Link untuk menuju halaman tambah item -->
    <a href="{{ route('items.create') }}">Add Item</a> <!-- Menyediakan tautan untuk menambah item baru -->

    <!-- Daftar item yang ada -->
    <ul>
        @foreach ($items as $item) <!-- Loop untuk menampilkan setiap item -->
            <li>
                {{ $item->name }} - <!-- Menampilkan nama item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- Link untuk mengedit item yang dipilih -->

                <!-- Form untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf <!-- Token CSRF untuk perlindungan terhadap serangan CSRF -->
                    @method('DELETE') <!-- Menggunakan metode DELETE pada form untuk penghapusan data -->
                    <button type="submit">Delete</button> <!-- Tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
