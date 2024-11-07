<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiPenempatan;

class LokasiPenempatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $placementLocations = LokasiPenempatan::all();
        return view('placementLocations.index', compact('placementLocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('placementLocations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    $validatedData = $request->validate([
        'namaGedung' => 'required',
        'alamatGedung' => 'required',
    ]);

    do {
        $randomId = random_int(100000, 999999);
    } while (LokasiPenempatan::where('id', $randomId)->exists()); // Pastikan ID unik

    // Simpan data ke tabel placementlocations
    $LokasiPenempatan = new LokasiPenempatan();
    $LokasiPenempatan->id = $randomId;
    $LokasiPenempatan->namaGedung = $validatedData['namaGedung'];
    $LokasiPenempatan->alamatGedung = $validatedData['alamatGedung'];
    $LokasiPenempatan->save();

    // Setelah data disimpan di placementlocations, ID-nya akan digunakan di students
    return redirect()->route('placementLocations.index')->with('success', 'Lokasi penempatan created successfully.');
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
        $LokasiPenempatan = LokasiPenempatan::findOrFail($id);
        return view('placementLocations.edit', compact('LokasiPenempatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'namaGedung' => 'required',
            'alamatGedung' => 'required',
        ]);

        $LokasiPenempatan = LokasiPenempatan::findOrFail($id);
        $LokasiPenempatan->namaGedung = $validatedData['namaGedung'];
        $LokasiPenempatan->alamatGedung = $validatedData['alamatGedung'];
        $LokasiPenempatan->save();

        return redirect()->route('placementLocations.index')->with('success', 'Jurusan update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $LokasiPenempatan = LokasiPenempatan::findOrFail($id);
        $LokasiPenempatan->delete();
        return redirect()->route('placementLocations.index')->with('success', 'Jurusan Delete successfully.');
    }
}
