@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
    <div class="container">
        <h1>Edit Siswa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswas.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="nis" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ $siswa->tanggal_lahir }}">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas_id" id="kelas" class="form-control">
                    <option value="{{ $siswa->kelas_id }}">{{ $siswa->kelas->nama }}</option>
                    @foreach ($kelas as $item)
                        @if (!($item->kelas_id == $siswa->kelas_id))
                            <option value="{{ $item->kelas_id }}">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
