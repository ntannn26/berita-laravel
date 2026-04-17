<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('berita.index', compact('berita'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('berita.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        return redirect('/')->with('success', 'Berita berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $berita = Berita::findOrFail($id);

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        return redirect('/')->with('success', 'Berita berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect('/')->with('success', 'Berita berhasil dihapus');
    }
}