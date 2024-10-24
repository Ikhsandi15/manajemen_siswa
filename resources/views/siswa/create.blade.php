@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<div class="container">
    <h1>Tambah Siswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis') }}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas_id" id="kelas" class="form-control">
                @foreach($kelas as $item)
                    <option value="{{$item->kelas_id}}">{{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
