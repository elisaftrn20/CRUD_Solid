@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Ubah Kategori</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Kategori</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <form action="/categories/{{$category->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$category->name) }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="/categories" class="btn btn-sm btn-outline-secondary mr-2">BATAL</a>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
