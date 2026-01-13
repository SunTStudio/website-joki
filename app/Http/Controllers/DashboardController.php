<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Produk;
use App\Models\Subscriber;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index(){
        return view('dinamis.dashboard');
    }

    public function send(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'user_message' => $request->message,
        ];

        // Kirim email ke Tsunstudio01@gmail.com
        Mail::send([], [], function ($message) use ($data) {
            $message->to('Tsunstudio01@gmail.com')
                ->replyTo($data['email'], $data['name']) // Agar bisa langsung reply ke pengirim
                ->subject('Pesan Baru dari Website: ' . $data['name'])
                ->html("
                    <h3>Pesan Baru dari Website</h3>
                    <p><strong>Nama:</strong> {$data['name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Pesan:</strong><br>{$data['user_message']}</p>
                ");
        });

        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }

    public function landingPage(){
        // batasi tiga data
        $produk = Produk::limit(3)->get();
        $testimoni = Testimoni::limit(6)->get();;
        $portofolio = Portofolio::limit(3)->get();;
        return view('landing-page.index', compact('produk', 'testimoni', 'portofolio'));
    }
        // Handle sending email or storing message in database here

        public function subscribe(Request $request){
            try{
                $request->validate([
                    'email' => 'required|email|unique:subscribers',
                ]);
                
                Subscriber::create(['email' => $request->email]);
                
                return back()->with('success', 'Berhasil berlangganan!');
            }catch(\Exception $e){
                return back()->with('error', 'Email sudah terdaftar,Terima Kasih.');
            }
        }
        
}
