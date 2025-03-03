@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 style="font-size: 24px; font-weight: bold; color: #2C3E50;">Tambah Admin Gudang</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="background: none; padding: 0; font-size: 14px;">
            <li class="breadcrumb-item"><a href="#" style="color: #3498db; text-decoration: none;">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/admingudang" style="color: #3498db; text-decoration: none;">Admin Gudang</a></li>
            <li class="breadcrumb-item active" style="color: #7f8c8d;">Tambah Admin</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="card-header" style="background: #1ABC9C; border-radius: 10px 10px 0 0;">
                <h4 class="text-white">Formulir Tambah Admin Gudang</h4>
            </div>
            <div class="card-body" style="padding: 20px;">
                <form action="{{ route('admingudang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" style="font-weight: bold;">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required style="border-radius: 5px;">
                        @error('name')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email" style="font-weight: bold;">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required style="border-radius: 5px;">
                        @error('email')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" style="font-weight: bold;">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required style="border-radius: 5px;">
                        @error('password')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-success" style="border-radius: 5px; padding: 8px 20px; font-weight: bold;">
                            Simpan
                        </button>
                        <a href="/admingudang" class="btn btn-secondary ml-2" style="border-radius: 5px; padding: 8px 20px;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
