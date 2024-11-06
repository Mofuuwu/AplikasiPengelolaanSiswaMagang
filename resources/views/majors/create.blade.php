@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Data Jurusan</h1>
@stop

@section('content')

    <form action="{{ route('majors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="namaJurusan">Nama Jurusan</label>
            <input type="text" class="form-control" id="namaJurusan" name="namaJurusan" value="{{ old('namaJurusan') }}" required>
            @error('namaJurusan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
