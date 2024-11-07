@extends('adminlte::page')
@section('title', 'Daftar Guru Pembimbing Sekolah')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Guru Pembimbing Sekolah</h2>
@stop

@section('content')
        <a href="{{ route('schoolAdvisors.create') }}" class="btn btn-primary mb-3">Tambah Data Guru Pembimbing Sekolah</a>

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
                <th>Nama Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schoolAdvisors as $GuruPembimbing)
                <tr>
                    <td>{{ $GuruPembimbing->id }}</td>
                    <td>{{ $GuruPembimbing->nama }}</td>
                    <td>{{ $GuruPembimbing->nomorKontak}}</td>
                    <td>{{ $GuruPembimbing->namaSekolah}}</td>
                    <td>
                        <a href="{{ route('schoolAdvisors.edit', $GuruPembimbing->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('schoolAdvisors.destroy', $GuruPembimbing->id) }}" method="POST" style="display:inline-block;">
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
