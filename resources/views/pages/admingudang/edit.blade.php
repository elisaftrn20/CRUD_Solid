@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 style="font-size: 24px; font-weight: bold; color: #2C3E50;">Edit Admin Gudang</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="background: none; padding: 0; font-size: 14px;">
            <li class="breadcrumb-item"><a href="#" style="color: #3498db; text-decoration: none;">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/admins" style="color: #3498db; text-decoration: none;">Admin Gudang</a></li>
            <li class="breadcrumb-item active" style="color: #7f8c8d;">Edit</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="card-header" style="background: #1ABC9C; border-radius: 10px 10px 0 0;">
                <h3 class="card-title" style="font-weight: bold; color: white;">Form Edit Admin Gudang</h3>
            </div>
            <div class="card-body" style="padding: 20px;">
                <!-- Form Edit Admin Gudang -->
                <form action="/admingudang/{{ $admin->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" style="font-weight: bold;">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email" style="font-weight: bold;">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password" style="font-weight: bold;">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 5px; font-weight: bold;">Simpan Perubahan</button>
                        <a href="/admingudang" class="btn btn-secondary" style="border-radius: 5px; font-weight: bold;">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
