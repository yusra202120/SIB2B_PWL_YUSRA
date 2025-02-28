<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title> <!-- Menentukan judul halaman -->
</head>
<body>
    <h1>Add Item</h1> <!-- Judul halaman -->

    <!-- Formulir untuk menambah item baru -->
    <form action="{{ route('items.store') }}" method="POST"> 
        @csrf <!-- Direktif untuk token CSRF, untuk keamanan form -->
        
        <label for="name">Name:</label> <!-- Label untuk input nama item -->
        <input type="text" id="name" name="name" required> <!-- Input field untuk nama item, wajib diisi -->
        <br> <!-- Pemisah baris -->

        <label for="description">Description:</label> <!-- Label untuk input deskripsi item -->
        <textarea id="description" name="description" required></textarea> <!-- Textarea untuk deskripsi item, wajib diisi -->
        <br> <!-- Pemisah baris -->

        <button type="submit">Add Item</button> <!-- Tombol untuk mengirim form dan menambahkan item -->
    </form>

    <!-- Link untuk kembali ke halaman daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a>
</body>
</html>
