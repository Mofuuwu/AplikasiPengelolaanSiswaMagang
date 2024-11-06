@extends('adminlte::page')

@section('title', 'Tambah Unit Kerja')

@section('content_header')
    <h1>Tambah Unit Kerja</h1>
@stop

@section('content')

    <form action="{{ route('workunits.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="namaUnit">Nama Unit Kerja</label>
            <input type="text" class="form-control" id="namaUnit" name="namaUnit" value="{{ old('namaUnit') }}" required>
            @error('namaUnit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pimpinanUnit">Pimpinan Unit</label>
            <input type="text" class="form-control" id="pimpinanUnit" name="pimpinanUnit" value="{{ old('pimpinanUnit') }}" required>
            @error('pimpinanUnit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
