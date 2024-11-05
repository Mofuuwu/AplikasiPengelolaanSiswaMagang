<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Siswa::all();
        return view('students.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nis' => 'required|digits:6',
            'kelas' => 'required|max:255',
            'jurusan' => 'required|max:255',
            'namaSekolah' => 'required|max:255',
            'nomorKontak' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        $siswa = new Siswa();
        $siswa->nama = $validatedData['nama'];
        $siswa->nis = $validatedData['nis'];
        $siswa->kelas = $validatedData['kelas'];
        $siswa->jurusan = $validatedData['jurusan'];
        $siswa->namaSekolah = $validatedData['namaSekolah'];
        $siswa->nomorKontak = $validatedData['nomorKontak'];
        $siswa->alamat = $validatedData['alamat'];
        $siswa->save();

        return redirect()->route('students.index')->with('success', 'siswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Siswa::findOrFail($id);
        return view('students.edit', ['students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nis' => 'required|digits:6',
            'kelas' => 'required|max:255',
            'jurusan' => 'required|max:255',
            'namaSekolah' => 'required|max:255',
            'nomorKontak' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $validatedData['nama'];
        $siswa->nis = $validatedData['nis'];
        $siswa->kelas = $validatedData['kelas'];
        $siswa->jurusan = $validatedData['jurusan'];
        $siswa->namaSekolah = $validatedData['namaSekolah'];
        $siswa->nomorKontak = $validatedData['nomorKontak'];
        $siswa->alamat = $validatedData['alamat'];
        $siswa->save();

        return redirect()->route('students.index')->with('success', 'siswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Siswa::findOrFail($id);
        $students->delete(); // Menghapus data siswa

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
