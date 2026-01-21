@extends('layouts.admin')

@section('title', 'Tambah Tipe Pembayaran')

@section('content')
<div class="container">
    <h1>Tambah Tipe Pembayaran</h1>

    <a href="{{ route('admin.payment-types.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.payment-types.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama">Nama Tipe Pembayaran</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
