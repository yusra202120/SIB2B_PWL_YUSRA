<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();  // Mengambil semua item dari database
        return view('items.index', compact('items'));  // Mengirim data ke view
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');  // Menampilkan form untuk membuat item baru
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  // Validasi input dari form
            'name' => 'required',
            'description' => 'required',
        ]);
    
        Item::create($request->only(['name', 'description']));  // Menyimpan data ke database
        return redirect()->route('items.index')->with('success', 'Item added successfully.');  // Mengalihkan ke halaman index dengan pesan sukses
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));  // Menampilkan detail item berdasarkan ID
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));  // Menampilkan form edit untuk item yang dipilih
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([  // Validasi input dari form
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $item->update($request->only(['name', 'description']));  // Memperbarui item di database
        return redirect()->route('items.index')->with('success', 'Item updated successfully');  // Mengalihkan ke halaman index dengan pesan sukses
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();  // Menghapus item dari database
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');  // Mengalihkan ke halaman index dengan pesan sukses
    }
    
}
