<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title> <!-- Menentukan judul halaman -->
</head>
<body>
    <h1>Edit Item</h1> <!-- Judul halaman -->

    <!-- Formulir untuk mengedit item -->
    <form action="{{ route('items.update', $item) }}" method="POST"> <!-- Aksi form mengarah ke route 'items.update' dengan parameter item -->
        @csrf <!-- Token CSRF untuk melindungi aplikasi dari serangan CSRF -->
        @method('PUT') <!-- Menambahkan metode PUT untuk update data -->

        <label for="name">Name:</label> <!-- Label untuk input nama item -->
        <input type="text" id="name" name="name" value="{{ $item->name }}" required> <!-- Input untuk nama item yang sudah terisi nilai saat ini -->
        <br> <!-- Pemisah baris -->

        <label for="description">Description:</label> <!-- Label untuk input deskripsi item -->
        <textarea id="description" name="description" required>{{ $item->description }}</textarea> <!-- Textarea untuk deskripsi item yang sudah terisi nilai saat ini -->
        <br> <!-- Pemisah baris -->

        <button type="submit">Update Item</button> <!-- Tombol untuk mengirim form dan memperbarui item -->
    </form>

    <!-- Link untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a>
</body>
</html>
