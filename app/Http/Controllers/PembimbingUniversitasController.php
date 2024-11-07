<?php

namespace App\Http\Controllers;

use App\Models\LokasiPenempatan;
use App\Models\PembimbingUniversitas;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class PembimbingUniversitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universityAdvisors = PembimbingUniversitas::all();
        return view('universityAdvisors.index', compact('universityAdvisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workUnits = UnitKerja::all();
        $placementLocations = LokasiPenempatan::all();
        return view('universityAdvisors.create', compact('workUnits', 'placementLocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'nomorKontak' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'unitKerja' => 'required',
            'lokasiPenempatan' => 'required'
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (PembimbingUniversitas::where('id', $randomId)->exists());


        $PembimbingUniversitas = new PembimbingUniversitas();

        $PembimbingUniversitas->id = $randomId;
        $PembimbingUniversitas->nama = $validatedData['nama'];
        $PembimbingUniversitas->nomorKontak = $validatedData['nomorKontak'];
        $PembimbingUniversitas->unitKerja = $validatedData['unitKerja'];
        $PembimbingUniversitas->lokasiPenempatan = $validatedData['lokasiPenempatan'];
        $PembimbingUniversitas->save();

        return redirect()->route('universityAdvisors.index')->with('success', 'Pembimbing Universitas created successfully.');
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
        $PembimbingUniversitas = PembimbingUniversitas::findOrFail($id);
        $workUnits = UnitKerja::all();
        $placementLocations = LokasiPenempatan::all();
        return view('universityAdvisors.edit', compact('PembimbingUniversitas','workUnits', 'placementLocations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'nomorKontak' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'unitKerja' => 'required',
            'lokasiPenempatan' => 'required'
        ]);

        $PembimbingUniversitas = PembimbingUniversitas::findOrFail($id);

        $PembimbingUniversitas->nama = $validatedData['nama'];
        $PembimbingUniversitas->nomorKontak = $validatedData['nomorKontak'];
        $PembimbingUniversitas->unitKerja = $validatedData['unitKerja'];
        $PembimbingUniversitas->lokasiPenempatan = $validatedData['lokasiPenempatan'];
        $PembimbingUniversitas->save();

        return redirect()->route('universityAdvisors.index')->with('success', 'Pembimbing Universitas created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $PembimbingUniversitas = PembimbingUniversitas::findOrFail($id);
        $PembimbingUniversitas->delete();
        return redirect()->route('universityAdvisors.index')->with('success', 'Pembimbing Universitas Delete successfully.');
    }
}
