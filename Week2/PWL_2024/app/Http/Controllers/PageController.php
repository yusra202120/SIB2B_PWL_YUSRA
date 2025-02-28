<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //Menampilkan pesan "Selamat Datang"

    public function index() {
        return "Selamat Datang";
    }

    // Menampilkan Nama dan NIM

    public function about(){
        return "NIM: 2341760044 - Nama: Yusra Yusuf";

    }

    public function articles   ($id) {
        return "Halaman Artikel dengan ID" .$id;
        
    }
}
