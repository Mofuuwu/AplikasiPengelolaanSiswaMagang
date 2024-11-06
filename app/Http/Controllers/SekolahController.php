<?php

namespace App\Http\Controllers;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = Sekolah::all();
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'npsn' => 'required|digits:8',
            'namaSekolah' => 'required|max:255',
            'alamatSekolah' => 'required|max:255',
            'penanggungJawab' => 'required|max:255',
        ]);

        $sekolah = new Sekolah();

        $sekolah->npsn = $validatedData['npsn'];
        $sekolah->namaSekolah = $validatedData['namaSekolah'];
        $sekolah->alamatSekolah = $validatedData['alamatSekolah'];
        $sekolah->penanggungJawab = $validatedData['penanggungJawab'];
        $sekolah->save();

        return redirect()->route('schools.index')->with('success', 'sekolah created successfully.');
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
        $Sekolah = Sekolah::findOrFail($id);
        return view('schools.edit', compact('Sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'npsn' => 'required|digits:8',
            'namaSekolah' => 'required|max:255',
            'alamatSekolah' => 'required|max:255',
            'penanggungJawab' => 'required|max:255',
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->npsn = $validatedData['npsn'];
        $sekolah->namaSekolah = $validatedData['namaSekolah'];
        $sekolah->alamatSekolah = $validatedData['alamatSekolah'];
        $sekolah->penanggungJawab = $validatedData['penanggungJawab'];
        $sekolah->save();

        return redirect()->route('schools.index')->with('success', 'sekolah update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect()->route('schools.index')->with('success', 'sekolah delete successfully');
    }
}
