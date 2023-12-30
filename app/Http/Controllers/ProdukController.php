<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'jenis_produk' => 'required|string|max:255',
        'harga_produk' => 'required|numeric',
        'jumlah_produk' => 'required|numeric',
    ]);

    $produk = new Produk();
    $produk->nama_produk = $validatedData['nama_produk'];
    $produk->jenis_produk = $validatedData['jenis_produk'];
    $produk->harga_produk = $validatedData['harga_produk'];
    $produk->jumlah_produk = $validatedData['jumlah_produk'];
    $produk->save();

    return redirect('/products/menu')->with('success', 'Produk berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string',
            'jenis_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'jumlah_produk' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $validatedData['nama_produk'];
        $produk->jenis_produk = $validatedData['jenis_produk'];
        $produk->harga_produk = $validatedData['harga_produk'];
        $produk->jumlah_produk = $validatedData['jumlah_produk'];
        $produk->save();

        return redirect('/products/menu')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $produk = Produk::findOrFail($id);
    $produk->delete();

    // Kembali dengan respons JSON
    return response()->json(['success' => true]);
}


    public function menu()
{
    $produk = Produk::all(); // Mengambil semua data produk
    return view('menu', compact('produk')); // Mengirim data ke view
}
}
