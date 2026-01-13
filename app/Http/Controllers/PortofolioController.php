<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
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
        return view('dinamis.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    data yang diterima judul,deskripsi,gambar,gambar2...gambar4
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
            'gambar2' => 'image',
            'gambar3' => 'image',
            'gambar4' => 'image',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = $profileImage;
        }
        if ($image = $request->file('gambar2')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "2." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar2'] = $profileImage;
        }
        if ($image = $request->file('gambar3')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "3." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar3'] = $profileImage;
        }
        if ($image = $request->file('gambar4')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "4." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar4'] = $profileImage;
        }

        Portofolio::create($input);

        return redirect()->route('admin.portofolio')
            ->with('success', 'Portofolio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $portofolio = Portofolio::find($id);
        return view('dinamis.portofolio.edit', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        
        // Hapus gambar terkait jika ada
        $images = ['gambar', 'gambar2', 'gambar3', 'gambar4'];
        foreach ($images as $imageField) {
            if ($portofolio->$imageField && file_exists(public_path('image/' . $portofolio->$imageField))) {
                unlink(public_path('image/' . $portofolio->$imageField));
            }
        }

        $portofolio->delete();
        return redirect()->route('admin.portofolio')->with('success', 'Portofolio berhasil dihapus!');
        
    }
}
