@extends('adminlte::page')
@section('title', 'Daftar Siswa')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Sekolah</h2>
@stop

@section('content')
    <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">Tambah Sekolah</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Alamat Sekolah</th>
                <th>Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $Sekolah)
                <tr>
                    <td>{{ $Sekolah->npsn }}</td>
                    <td>{{ $Sekolah->namaSekolah }}</td>
                    <td>{{ $Sekolah->alamatSekolah }}</td>
                    <td>{{ $Sekolah->penanggungJawab }}</td>
                    <td>
                        <a href="{{ route('schools.edit', $Sekolah->npsn) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('schools.destroy', $Sekolah->npsn) }}" method="POST" style="display:inline-block;">
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
