@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="container">
        <h1>Detail Kelas</h1>
        <div class="card">
            <div class="card-header">
               ID: {{ $kelas->kelas_id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Kelas: {{ $kelas->nama }}</h5>
                <a href="{{ route('kelas.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
