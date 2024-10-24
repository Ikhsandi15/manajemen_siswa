@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
    <div class="container">
        <h1>Edit Kelas</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Kelas</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kelas->nama }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
