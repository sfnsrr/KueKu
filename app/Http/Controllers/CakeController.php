<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cakes = Cake::orderBy('id', 'asc')->paginate(10);
        return view('cakes.index', compact('cakes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cakes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'bahan_utama' => 'nullable|string|max:255',
        ]);

        Cake::create($request->all());

        return redirect()->route('cakes.index')
            ->with('success', 'Kue berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cake $cake)
    {
        return view('cakes.show', compact('cake'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cake $cake)
    {
        return view('cakes.edit', compact('cake'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cake $cake)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'bahan_utama' => 'nullable|string|max:255',
        ]);

        $cake->update($request->all());

        return redirect()->route('cakes.show', $cake->id)
            ->with('success', 'Kue berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cake $cake)
    {
        $cake->delete();

        return redirect()->route('cakes.index')
            ->with('success', 'Kue berhasil dihapus!');
    }
}