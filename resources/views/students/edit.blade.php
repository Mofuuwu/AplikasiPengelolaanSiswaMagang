@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    <form action="{{ route('students.update', $students->nis) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $students['nama'] }}" required>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis" value="{{ $students['nis'] }}" required>
            @error('nis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('kelas', $students['kelas']) == '' ? 'selected' : '' }}>Pilih Kelas</option>
                <option value="10" {{ old('kelas', $students['kelas']) == '10' ? 'selected' : '' }}>10</option>
                <option value="11" {{ old('kelas', $students['kelas']) == '11' ? 'selected' : '' }}>11</option>
                <option value="12" {{ old('kelas', $students['kelas']) == '12' ? 'selected' : '' }}>12</option>
            </select>
            @error('kelas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('jurusan', $students['jurusan']) == '' ? 'selected' : '' }}>Pilih Jurusan</option>
                <option value="PPLG" {{ old('jurusan', $students['jurusan']) == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                <option value="TKJ" {{ old('jurusan', $students['jurusan']) == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                <option value="RPL" {{ old('jurusan', $students['jurusan']) == 'RPL' ? 'selected' : '' }}>RPL</option>
            </select>
            @error('jurusan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="namaSekolah">Nama Sekolah</label>
            <input type="text" class="form-control" id="namaSekolah" name="namaSekolah" value="{{ $students['namaSekolah'] }}" required>
            @error('namaSekolah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nomorKontak">Nomor Kontak</label>
            <input type="number" class="form-control" id="nomorKontak" name="nomorKontak" pattern="^0[0-9]{9,12}$" required placeholder="Contoh: 081234567890" value="{{ $students['nomorKontak'] }}">
            @error('nomorKontak')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $students['alamat'] }}" required>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop