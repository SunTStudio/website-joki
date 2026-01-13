<?php

namespace App\Http\Controllers;

use App\Models\Kerjaan;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;

class TestimoniController extends Controller
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
        $users = User::all();
        $kerjaans = Kerjaan::where('status_pengerjaan', 'selesai')->get();
        return view('dinamis.testimoni.create', compact('users', 'kerjaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'kerjaan_id' => 'required|exists:kerjaans,id',
            'rating' => 'required|integer|min:1|max:5',
            'deskripsi' => 'required|string',
        ]);

        Testimoni::create($validated);

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::find($id);
        $users = User::all();
        $kerjaans = Kerjaan::where('status_pengerjaan', 'selesai')->get();
        return view('dinamis.testimoni.edit', compact('testimoni', 'users', 'kerjaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $testimoni = Testimoni::find($id);
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'kerjaan_id' => 'required|exists:kerjaans,id',
            'rating' => 'required|integer|min:1|max:5',
            'deskripsi' => 'required|string',
        ]);

        $testimoni->update($validated);

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::find($id);
        $testimoni->delete();   
        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus!');
    }
}
