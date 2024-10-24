@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Kelas Tanpa Siswa</h1>
        <a href="{{ route('kelas.index') }}" class="btn btn-primary mb-3">Back</a>
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
