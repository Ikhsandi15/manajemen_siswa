@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/" class="btn btn-primary mb-3">Back</a>
        <h1>Data Siswa</h1>
        <a href="{{ route('siswas.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->tanggal_lahir }}</td>
                        <td>{{ $siswa->kelas->nama }}</td>
                        <td>
                            <a href="{{ route('siswas.show', $siswa->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
