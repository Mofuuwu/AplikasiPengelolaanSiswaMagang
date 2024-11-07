@extends('adminlte::page')

@section('title', 'Tambah Data Lokasi Penempatan')

@section('content_header')
    <h1>Tambah Data Lokasi Penempatan</h1>
@stop

@section('content')

    <form action="{{ route('placementLocations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="namaGedung">Nama Gedung</label>
            <input type="text" class="form-control" id="namaGedung" name="namaGedung" value="{{ old('namaGedung') }}" required>
            @error('namaGedung')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamatGedung">Alamat Gedung</label>
            <input type="text" class="form-control" id="alamatGedung" name="alamatGedung" value="{{ old('alamatGedung') }}" required>
            @error('alamatGedung')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
