@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="container">
        <h1>Detail Siswa</h1>
        <div class="card">
            <div class="card-header">
               Kelas: {{ $siswa->kelas->nama }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $siswa->nama }}</h5>
                <p class="card-text">NIS: {{ $siswa->nis }}</p>
                <p class="card-text">Tanggal Lahir: {{ $siswa->tanggal_lahir }}</p>
                <a href="{{ route('siswas.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
