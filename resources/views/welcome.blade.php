@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manajemen Siswa</h1>
        <a href="{{ route('siswas.index') }}" class="btn btn-primary mb-3">Siswa</a>
        <a href="{{ route('kelas.index') }}" class="btn btn-primary mb-3">kelas</a>
    </div>
@endsection
