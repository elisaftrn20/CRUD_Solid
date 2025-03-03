@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Tambah Supplier</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Supplier</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Supplier</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="perusahaan" id="perusahaan" class="form-control" value="{{ old('perusahaan') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" class="form-control" required>{{ old('address') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/suppliers" class="btn btn-sm btn-outline-secondary mr-2">BATAL</a>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
