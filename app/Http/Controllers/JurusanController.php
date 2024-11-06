<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Jurusan::all();
        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaJurusan' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (Jurusan::where('id', $randomId)->exists());


        $Jurusan = new Jurusan();

        $Jurusan->id = $randomId;
        $Jurusan->namaJurusan = $validatedData['namaJurusan'];
        $Jurusan->save();

        return redirect()->route('majors.index')->with('success', 'jurusan created successfully.');
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
        $Jurusan = Jurusan::findOrFail($id);
        return view('majors.edit', compact('Jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'namaJurusan' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);

        $Jurusan = Jurusan::findOrFail($id);
        $Jurusan->namaJurusan = $validatedData['namaJurusan'];
        $Jurusan->save();

        return redirect()->route('majors.index')->with('success', 'Jurusan update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Jurusan = Jurusan::findOrFail($id);
        $Jurusan->delete();
        return redirect()->route('majors.index')->with('success', 'Jurusan Delete successfully.');
    }
}
