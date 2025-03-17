<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect('/kategori');
    }

    public function edit($id)
{
    $kategori = KategoriModel::findOrFail($id);
    return view('kategori.edit', compact('kategori'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'kategori_kode' => 'required',
        'kategori_nama' => 'required',
    ]);

    $kategori = KategoriModel::findOrFail($id);
    $kategori->update($request->all());

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
}

public function destroy($id)
{
    $kategori = KategoriModel::findOrFail($id);
    $kategori->delete();

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
}




}
