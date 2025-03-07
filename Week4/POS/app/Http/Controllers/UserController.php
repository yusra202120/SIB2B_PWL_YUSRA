<?php

namespace App\Http\Controllers;

use App\Models\UserModel; //Menggunakan model UserModel

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        // 1. Menyiapkan data baru untuk disimpan
        $data = [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make(12345)
        ]; 


        // 2. Menyimpan data ke dalam tabel 'm_user'
        UserModel::create($data);

        // 3. Menggambil semua data user dari tabel 'm_user'
        $user = UserModel::all();

        // 4. Mengirimkan data user ke tampilan (view) 
        return view('user', ['data' => $user]);

    }
    
}
