<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->has('keyword') && !$request->filled('keyword')) {
            return redirect('/kategori');
        } else {
            $kategori = Kategori::where('nama_kategori', 'like', "%{$keyword}%")
            ->orWhere('deskripsi', 'like', "%{$keyword}%")
            ->get();
        }

        return view('pages.kategori.show', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|min:4|max:50',
            'deskripsi' => 'required|string',
        ],[
            'nama_kategori.required' => 'Nama kategori wajib diisi!',
            'nama_kategori.min' => 'Nama kategori minimal 4 karakter!',
            'nama_kategori.max' => 'Nama kategori maksimal 50 karakter!',
            'deskripsi.required' => 'Deskripsi kategori wajib diisi!',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/kategori')->with('pesan', 'Kategori berhasil ditambahkan!');
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
        $data = Kategori::find($id);
        return view('pages.kategori.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|min:4|max:50',
            'deskripsi' => 'required|string',
        ],[
            'nama_kategori.required' => 'Nama kategori wajib diisi!',
            'nama_kategori.min' => 'Nama kategori minimal 4 karakter!',
            'nama_kategori.max' => 'Nama kategori maksimal 50 karakter!',
            'deskripsi.required' => 'Deskripsi kategori wajib diisi!',
        ]);

        Kategori::where('id_kategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'updated_at' => now(),
        ]);

        return redirect('/kategori')->with('pesan', 'Kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);
        return redirect('/kategori')->with('pesan', 'Kategori berhasil dihapus!');
    }
}
