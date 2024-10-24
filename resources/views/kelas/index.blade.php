@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/" class="btn btn-primary mb-3">Back</a>
        <h1>Data Kelas</h1>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>
        <a href="{{ route('kelas.kelasTanpaSiswa') }}" class="btn btn-primary mb-3">Kelas Tanpa Siswa</a>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <a href="{{ route('kelas.show', $item->kelas_id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('kelas.edit', $item->kelas_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kelas.destroy', $item->kelas_id) }}" method="POST"
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
