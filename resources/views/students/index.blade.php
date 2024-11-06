@extends('adminlte::page')
@section('title', 'Daftar Siswa')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Siswa Pkl</h2>
@stop

@section('content')
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Nama Sekolah</th>
                <th>Nomor Kontak</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->kelas }}</td>
                    <td>{{ $student->jurusan }}</td>
                    <td>{{ $student->namaSekolah }}</td>
                    <td>{{ $student->nomorKontak }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->nis) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->nis) }}" method="POST" style="display:inline-block;">
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
