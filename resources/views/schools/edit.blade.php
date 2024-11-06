@extends('adminlte::page')

@section('title', 'Edit Sekolah')

@section('content_header')
    <h1>Edit Sekolah</h1>
@stop

@section('content')
    <form action="{{ route('schools.update', $Sekolah->npsn) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="npsn">NPSN</label>
            <input type="text" class="form-control" id="npsn" name="npsn" value="{{ $Sekolah['npsn'] }}" required>
            @error('npsn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="namaSekolah">Nama Sekolah</label>
            <input type="text" class="form-control" id="namaSekolah" name="namaSekolah" value="{{ $Sekolah['namaSekolah'] }}" required>
            @error('namaSekolah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="alamatSekolah">Alamat Sekolah</label>
            <input type="text" class="form-control" id="alamatSekolah" name="alamatSekolah" value="{{ $Sekolah['alamatSekolah'] }}" required>
            @error('alamatSekolah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penanggungJawab">Penanggung Jawab</label>
            <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab" value="{{ $Sekolah['penanggungJawab'] }}" required>
            @error('penanggungJawab')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop