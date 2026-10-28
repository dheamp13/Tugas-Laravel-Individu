<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /** Menampilkan daftar meja (Master Meja & Area) (read)*/
    public function index()
    {
        $meja = Meja::orderBy('id', 'asc')->get();
        return view('meja.index', compact('meja'));
    }

    /** Menampilkan form tambah meja (create)*/
    public function create()
    {
        return view('meja.create');
    }

    /** Menyimpan data meja baru (store)*/
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_meja' => 'required|string|max:50',
            'kapasitas'  => 'required|integer',
            'lokasi'     => 'required|string|max:50',
            'status'     => 'required|string|max:50',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $validated['gambar'] = 'images/' . $imageName;
        } else {
            $validated['gambar'] = 'images/OIP.jpeg';
        }

        Meja::create($validated);

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil ditambahkan!');
    }

    /** Menampilkan form edit meja (edit)*/
    public function edit($id)
    {
        $meja = Meja::findOrFail($id);
        return view('meja.edit', compact('meja'));
    }

    /** Memperbarui data meja (update)*/
    public function update(Request $request, $id)
    {
        $meja = Meja::findOrFail($id);

        $validated = $request->validate([
            'nomor_meja' => 'required|string|max:50',
            'kapasitas'  => 'required|integer',
            'lokasi'     => 'required|string|max:50',
            'status'     => 'required|string|max:50',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $validated['gambar'] = 'images/' . $imageName;
        }

        $meja->update($validated);

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil diperbarui!');
    }

    /** Menghapus data meja (delete).*/
    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil dihapus!');
    }
}
