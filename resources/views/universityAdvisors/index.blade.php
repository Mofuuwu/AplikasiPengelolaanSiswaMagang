@extends('adminlte::page')
@section('title', 'Daftar Instruktur Pembimbing Universitas')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Instruktur Pembimbing Universitas</h2>
@stop

@section('content')
        <a href="{{ route('universityAdvisors.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pembimbing</th>
                <th>Nama Pembimbing</th>
                <th>Nomor Kontak</th>
                <th>Unit Kerja</th>
                <th>Lokasi Penempatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($universityAdvisors as $InstrukturPembimbing)
                <tr>
                    <td>{{ $InstrukturPembimbing->id }}</td>
                    <td>{{ $InstrukturPembimbing->nama }}</td>
                    <td>{{ $InstrukturPembimbing->unitKerja }}</td>
                    <td>{{ $InstrukturPembimbing->lokasiPenempatan }}</td>
                    <td>
                        <a href="{{ route('universityAdvisors.edit', $InstrukturPembimbing->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('universityAdvisors.destroy', $InstrukturPembimbing->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
