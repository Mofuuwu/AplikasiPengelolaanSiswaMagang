@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Data Sekolah</h1>
@stop

@section('content')

    <form action="{{ route('schools.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="npsn">NPSN</label>
            <input type="number" class="form-control" id="npsn" name="npsn" value="{{ old('npsn') }}" required>
            @error('npsn')
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
            <label for="alamatSekolah">Alamat Sekolah</label>
            <input type="text" class="form-control" id="alamatSekolah" name="alamatSekolah" value="{{ old('alamatSekolah') }}" required>
            @error('alamatSekolah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penanggungJawab">Penanggung Jawab</label>
            <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab" value="{{ old('penanggungJawab') }}" required>
            @error('penanggungJawab')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
