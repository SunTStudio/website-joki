<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('dinamis.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dinamis.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'estimasi' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Tentukan lokasi penyimpanan
        $destinationPath = public_path('img/produk');
        
        // Pastikan folder ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Helper closure untuk upload
        $handleUpload = function ($file, $suffix) use ($destinationPath) {
            $filename = time() . "_{$suffix}." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            return 'img/produk/' . $filename;
        };

        // Proses upload gambar
        if ($request->hasFile('gambar')) $validated['gambar'] = $handleUpload($request->file('gambar'), 'main');
        if ($request->hasFile('gambar2')) $validated['gambar2'] = $handleUpload($request->file('gambar2'), '2');
        if ($request->hasFile('gambar3')) $validated['gambar3'] = $handleUpload($request->file('gambar3'), '3');

        Produk::create($validated);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('dinamis.produk.edit', compact('produk'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'estimasi' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Tentukan lokasi penyimpanan
        $destinationPath = public_path('img/produk');
        
        // Helper closure untuk upload dan hapus gambar lama
        $handleUpdateUpload = function ($file, $oldImagePath, $suffix) use ($destinationPath) {
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
            $filename = time() . "_{$suffix}." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            return 'img/produk/' . $filename;
        };

        // Proses upload dan update gambar
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $handleUpdateUpload($request->file('gambar'), $produk->gambar, 'main');
        } else {
            $validated['gambar'] = $produk->gambar; // Pertahankan gambar lama jika tidak ada upload baru
        }

        if ($request->hasFile('gambar2')) {
            $validated['gambar2'] = $handleUpdateUpload($request->file('gambar2'), $produk->gambar2, '2');
        } else {
            $validated['gambar2'] = $produk->gambar2;
        }

        if ($request->hasFile('gambar3')) {
            $validated['gambar3'] = $handleUpdateUpload($request->file('gambar3'), $produk->gambar3, '3');
        } else {
            $validated['gambar3'] = $produk->gambar3;
        }

        $produk->merge($validated);
        $produk->save();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
