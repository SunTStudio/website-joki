<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // index
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('dinamis.subscriber.index', compact('subscribers'));
    }

    public function create()
    {
        return view('dinamis.subscriber.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create($request->all());

        return redirect()->route('admin.subscribers')->with('success', 'Subscriber berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $subscriber = Subscriber::find($id);
        return view('dinamis.subscriber.edit', compact('subscriber'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email,' . $id,
        ]);

        $subscriber = Subscriber::find($id);
        $subscriber->update($request->all());

        return redirect()->route('admin.subscribers')->with('success', 'Subscriber berhasil diperbarui!');
    }
    


    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect()->route('admin.subscribers')->with('success', 'Subscriber berhasil dihapus!');
    }


}
