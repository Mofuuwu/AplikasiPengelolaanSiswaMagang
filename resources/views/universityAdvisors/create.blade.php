@extends('adminlte::page')

@section('title', 'Tambah Data Instruktur Pembimbing')

@section('content_header')
    <h1>Tambah Data Instruktur Pembimbing</h1>
@stop

@section('content')

    <form action="{{ route('universityAdvisors.store') }}" method="POST">
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
            <label for="unitKerja">Unit Kerja</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="unitKerja" name="unitKerja" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                @foreach($workUnits as $UnitKerja)
                    <option value="{{ $UnitKerja->namaUnit }}" {{ old('unitKerja') == $UnitKerja->namaUnit ? 'selected' : '' }}>
                        {{ $UnitKerja->namaUnit }}
                    </option>
                @endforeach
            </select>
            @error('unitKerja')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lokasiPenempatan">Lokasi Penempatan</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="lokasiPenempatan" name="lokasiPenempatan" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                @foreach($placementLocations as $LokasiPenempatan)
                    <option value="{{ $LokasiPenempatan->namaGedung }}" {{ old('lokasiPenempatan') == $LokasiPenempatan->namaGedung ? 'selected' : '' }}>
                        {{ $LokasiPenempatan->namaGedung }}
                    </option>
                @endforeach
            </select>
            @error('lokasiPenempatan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@stop
