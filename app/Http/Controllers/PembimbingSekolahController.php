<?php

namespace App\Http\Controllers;

use App\Models\PembimbingSekolah;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class PembimbingSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolAdvisors = PembimbingSekolah::all();
        return view('schoolAdvisors.index', compact('schoolAdvisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Sekolah = Sekolah::all();
        return view('schoolAdvisors.create', compact('Sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'nomorKontak' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'namaSekolah' => 'required'
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (PembimbingSekolah::where('id', $randomId)->exists());


        $PembimbingSekolah = new PembimbingSekolah();

        $PembimbingSekolah->id = $randomId;
        $PembimbingSekolah->nama = $validatedData['nama'];
        $PembimbingSekolah->nomorKontak = $validatedData['nomorKontak'];
        $PembimbingSekolah->namaSekolah = $validatedData['namaSekolah'];
        $PembimbingSekolah->save();

        return redirect()->route('schoolAdvisors.index')->with('success', 'Pembimbing Sekolah created successfully.');
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
        $ListSekolah = Sekolah::all();
        $PembimbingSekolah = PembimbingSekolah::findOrFail($id);
        return view('schoolAdvisors.edit', compact('PembimbingSekolah', 'ListSekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'nomorKontak' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'namaSekolah' => 'required'
        ]);

        $PembimbingSekolah = PembimbingSekolah::findOrFail($id);
        $PembimbingSekolah->nama = $validatedData['nama'];
        $PembimbingSekolah->nomorKontak = $validatedData['nomorKontak'];
        $PembimbingSekolah->namaSekolah = $validatedData['namaSekolah'];
        $PembimbingSekolah->save();

        return redirect()->route('schoolAdvisors.index')->with('success', 'Pembimbing Sekolah update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $PembimbingSekolah = PembimbingSekolah::findOrFail($id);
        $PembimbingSekolah->delete();
        return redirect()->route('schoolAdvisors.index')->with('success', 'Pembimbing Sekolah Delete successfully.');
    }
}
