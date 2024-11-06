@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Siswa</h1>
@stop

@section('content')

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis') }}" required>
            @error('nis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('kelas') == '' ? 'selected' : '' }}>Pilih Kelas</option>
                <option value="10" {{ old('kelas') == '10' ? 'selected' : '' }}>10</option>
                <option value="11" {{ old('kelas') == '11' ? 'selected' : '' }}>11</option>
                <option value="12" {{ old('kelas') == '12' ? 'selected' : '' }}>12</option>
            </select>
            @error('kelas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('jurusan') == '' ? 'selected' : '' }}>Pilih Jurusan</option>
                <option value="pplg" {{ old('jurusan') == 'pplg' ? 'selected' : '' }}>Pengembangan Perangkat Lunak dan Gim</option>
                <option value="tjkt" {{ old('jurusan') == 'tjkt' ? 'selected' : '' }}>Teknik Jaringan Komputer dan Telekomunikasi</option>
                <option value="dkv" {{ old('jurusan') == 'dkv' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
            </select>
            @error('jurusan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="namaSekolah">Nama Sekolah</label>
            <input type="text" class="form-control" id="namaSekolah" name="namaSekolah" value="{{ old('namaSekolah') }}" required>
            @error('namaSekolah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nomorKontak">Nomor Kontak</label>
            <input type="number" class="form-control" id="nomorKontak" name="nomorKontak" pattern="^0[0-9]{9,12}$" required placeholder="Contoh: 081234567890" value="{{ old('nomorKontak') }}">
            @error('nomorKontak')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
