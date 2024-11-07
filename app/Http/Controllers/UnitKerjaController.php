<?php

namespace App\Http\Controllers;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workunits = UnitKerja::all();
        return view('workunits.index', compact('workunits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workunits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'namaUnit' => 'required',
            'pimpinanUnit' => 'required',
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (UnitKerja::where('id', $randomId)->exists());

        $UnitKerja = new UnitKerja();

        $UnitKerja->id = $randomId;
        $UnitKerja->namaUnit = $validatedData['namaUnit'];
        $UnitKerja->pimpinanUnit = $validatedData['pimpinanUnit'];
        $UnitKerja->save();

        return redirect()->route('workunits.index')->with('success', 'Unit Kerja created successfully.');

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
        $UnitKerja = UnitKerja::findOrFail($id);
        return view('workunits.edit', compact('UnitKerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'namaUnit' => 'required',
            'pimpinanUnit' => 'required',
        ]);

        $UnitKerja = UnitKerja::findOrFail($id);
        $UnitKerja->namaUnit = $validatedData['namaUnit'];
        $UnitKerja->pimpinanUnit = $validatedData['pimpinanUnit'];
        $UnitKerja->save();

        return redirect()->route('workunits.index')->with('success', 'Unit Kerja created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $UnitKerja = UnitKerja::findOrFail($id);
        $UnitKerja->delete();
        return redirect()->route('workunits.index')->with('success', 'Unit Kerja Delete successfully.');
    }
}
