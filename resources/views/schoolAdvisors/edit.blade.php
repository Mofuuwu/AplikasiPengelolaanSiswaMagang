@extends('adminlte::page')

@section('title', 'Ubah Data Pembimbing Sekolah')

@section('content_header')
    <h1>Ubah Data Pembimbing Sekolah</h1>
@stop

@section('content')
    <form action="{{ route('schoolAdvisors.update', $PembimbingSekolah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Pembimbing</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $PembimbingSekolah['nama'] }}" required>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="nomorKontak">Nomor Kontak</label>
            <input type="number" class="form-control" id="nomorKontak" name="nomorKontak" value="{{ $PembimbingSekolah['nomorKontak'] }}" required>
            @error('nomorKontak')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="namaSekolah">Nama Sekolah</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="namaSekolah" name="namaSekolah" required>
                <option value=""disabled selected >Pilih Sekolah</option>
                @foreach($ListSekolah as $Sekolah)
                    <option value="{{ $Sekolah->namaSekolah }}" {{ $PembimbingSekolah->namaSekolah == $Sekolah->namaSekolah ? 'selected' : '' }}>
                        {{ $Sekolah->namaSekolah }}
                    </option>
                @endforeach
            </select>
            @error('lokasiPenempatan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop