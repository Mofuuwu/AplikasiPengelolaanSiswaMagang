@extends('adminlte::page')

@section('title', 'Edit Sekolah')

@section('content_header')
    <h1>Edit Unit Kerja</h1>
@stop

@section('content')
    <form action="{{ route('workunits.update', $UnitKerja->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="namaUnit">Nama Unit Kerja</label>
            <input type="text" class="form-control" id="namaUnit" name="namaUnit" value="{{ $UnitKerja['namaUnit'] }}" required>
            @error('namaUnit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pimpinanUnit">Pimpinan Unit</label>
            <input type="text" class="form-control" id="pimpinanUnit" name="pimpinanUnit" value="{{ $UnitKerja['pimpinanUnit'] }}" required>
            @error('pimpinanUnit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop