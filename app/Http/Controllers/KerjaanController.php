<?php

namespace App\Http\Controllers;

use App\Models\Kerjaan;
use App\Models\Portofolio;
use App\Models\ProgresKerjaan;
use App\Models\Testimoni;
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
    public function show($id)
    {
        $kerjaan = Kerjaan::find($id);
        $prosesKerjaan = ProgresKerjaan::where('kerjaan_id', $id)->get();
        $timelines = ProgresKerjaan::where('kerjaan_id', $id)->get();
        return view('dinamis.kerjaan.show', compact('kerjaan', 'prosesKerjaan','timelines'));
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

    public function updateStatus(Request $request, $id)
    {
        $kerjaan = Kerjaan::findOrFail($id);

        $validated = $request->validate([
            'status_pengerjaan' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status_pembayaran' => 'required|string',
            'source_code' => 'nullable|url',
        ]);

        // kerjaan_id ,progres,status_progres
       $progresKerjaan = ProgresKerjaan::create([
            'kerjaan_id' => $kerjaan->id,
            'progres' => $validated['status_pengerjaan'],
            'deskripsi' => $validated['deskripsi'],
            'status_progres' => $validated['status_pengerjaan'],
            'source_code' => $validated['source_code'],
        ]);

        $kerjaan->update([
            'status_pengerjaan' => $validated['status_pengerjaan'],
            'status_pembayaran' => $validated['status_pembayaran'],
            'source_code' => $validated['source_code'],
        ]);

        return redirect()->back()->with('success', 'Status kerjaan berhasil diperbarui!');
    }

    public function revisi(Request $request, $id){
        $kerjaan = Kerjaan::findOrFail($id);

        // kerjaan_id ,progres,status_progres
       $progresKerjaan = ProgresKerjaan::create([
            'kerjaan_id' => $kerjaan->id,
            'progres' => 'Revisi',
            'deskripsi' => $request->catatan_revisi,
            'status_progres' => 'Revisi',
            'source_code' => null,
        ]);

        $kerjaan->update([
            'status_pengerjaan' => 'proses',
        ]);

        return redirect()->back()->with('success', 'Status kerjaan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerjaan $kerjaan)
    {
        //
    }

    public function proses(){
        // kalo kerjaan status pengerjaan bukan selesai dan batal
        $proses = Kerjaan::where('status_pengerjaan', '!=', 'selesai')->where('status_pengerjaan', '!=', 'Batal')->get();
        return view('dinamis.proses.index', compact('proses'));
    }

    public function selesai(){
        $selesai = Kerjaan::where('status_pengerjaan', 'selesai')->get();
        return view('dinamis.selesai.index', compact('selesai'));
    }

    public function batal(){
        $batal = Kerjaan::where('status_pengerjaan', 'Batal')->get();
        return view('dinamis.batal.index', compact('batal'));
    }

    public function testimoni(){
        $testimoni = Testimoni::get();
        return view('dinamis.testimoni.index', compact('testimoni'));
    }

    public function portofolio(){
        $portofolios = Portofolio::get();
        return view('dinamis.portofolio.index', compact('portofolios'));
    }

    public function createPortofolio(){
        return view('dinamis.portofolio.create');
    }

    public function storePortofolio(Request $request){

    }

    

    
}
