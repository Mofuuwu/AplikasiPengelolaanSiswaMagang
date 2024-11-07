@extends('adminlte::page')

@section('title', 'Tambah Data Pembimbing Sekolah')

@section('content_header')
    <h1>Tambah Data Pembimbing Sekolah</h1>
@stop

@section('content')

    <form action="{{ route('schoolAdvisors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Pembimbing</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="nomorKontak">Nomor Kontak</label>
            <input type="number" class="form-control" id="nomorKontak" name="nomorKontak" value="{{ old('nomorKontak') }}" required>
            @error('nomorKontak')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="namaSekolah">Nama Sekolah</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="namaSekolah" name="namaSekolah" required>
                <option value="">Pilih Sekolah</option>
                @foreach($Sekolah as $sekolah)
                    <option value="{{ $sekolah->namaSekolah }}" {{ old('namaSekolah') == $sekolah->namaSekolah ? 'selected' : '' }}>
                        {{ $sekolah->namaSekolah }}
                    </option>
                @endforeach
            </select>
            @error('namaSekolah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@stop
