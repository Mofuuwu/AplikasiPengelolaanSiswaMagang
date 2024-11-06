<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $students = Siswa::all();
        // dd($students);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nis' => 'required|digits:6',
            'kelas' => 'required',
            'jurusan' => 'required|string|max:255',
            'namaSekolah' => 'required|max:255',
            'nomorKontak' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
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


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $students = Siswa::findOrFail($id);
        return view('students.edit', ['students' => $students]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nis' => 'required|digits:6',
            'kelas' => 'required',
            'jurusan' => 'required|string|max:255',
            'namaSekolah' => 'required|max:255',
            'nomorKontak' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
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

    public function destroy(string $id)
    {
        $students = Siswa::findOrFail($id);
        $students->delete(); 

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
