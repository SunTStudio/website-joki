<?php

namespace App\Http\Controllers;

use App\Models\Kerjaan;
use Illuminate\Http\Request;

class KerjaanController extends Controller
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
        return view('dinamis.kerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date',
            'harga' => 'required|numeric',
            'status_pengerjaan' => 'required|string',
            'status_pembayaran' => 'required|string',
            'source_code' => 'nullable|url',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img/bukti_pembayaran');
            $image->move($destinationPath, $name);
            $validated['bukti_pembayaran'] = 'img/bukti_pembayaran/' . $name;
        }

        // user_id
        $validated['user_id'] = auth()->user()->id;

        Kerjaan::create($validated);

        return redirect()->route('admin.proses')->with('success', 'Kerjaan berhasil ditambahkan!');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Kerjaan $kerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kerjaan = Kerjaan::find($id);
        return view('dinamis.kerjaan.edit', compact('kerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerjaan $kerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerjaan $kerjaan)
    {
        //
    }

    public function proses(){
        $proses = Kerjaan::all();
        return view('dinamis.proses.index', compact('proses'));
    }

    public function selesai(){
        $selesai = Kerjaan::where('status_pengerjaan', 'Selesai')->get();
        return view('dinamis.selesai.index', compact('selesai'));
    }

    public function batal(){
        $batal = Kerjaan::all();
        return view('dinamis.batal.index', compact('batal'));
    }

    public function testimoni(){
        return view('dinamis.testimoni.index');
    }

    public function portofolio(){
        return view('dinamis.portofolio.index');
    }

    
}
