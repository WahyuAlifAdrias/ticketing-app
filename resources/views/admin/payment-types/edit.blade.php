@extends('layouts.admin')

@section('title', 'Edit Tipe Pembayaran')

@section('content')
<div class="container">
    <h1>Edit Tipe Pembayaran</h1>

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

    <form action="{{ route('admin.payment-types.update', $paymentType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama">Nama Tipe Pembayaran</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $paymentType->nama) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
