@extends('layouts.main')

@section('header')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Dashboard</h1>
        <!-- <ol style="list-style: none; padding: 0; margin: 0; display: flex;">
            <li style="margin-right: 10px;"><a href="#" style="text-decoration: none; color: black;">Beranda</a></li>
        </ol> -->
    </div>
@endsection

@section('content')
    @auth
        @if(in_array(Auth::user()->role, ['superadmin', 'admingudang']))
            <!-- Tambahan tulisan SELAMAT DATANG -->
            <div style="margin-bottom: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; text-align: center; font-weight: bold; font-size: 20px;">
                SELAMAT DATANG, {{ ucfirst(Auth::user()->role) }} 👑
            </div>
        @endif
    @endauth

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        <div style="width: 23%; padding: 20px; background-color: #17a2b8; color: white; text-align: center; border-radius: 5px;">
            <i class="fas fa-cogs fa-3x"></i>
            <h3>{{ $productCount }}</h3>
            <p>Total Produk</p>
        </div>

        <div style="width: 23%; padding: 20px; background-color: #28a745; color: white; text-align: center; border-radius: 5px;">
            <i class="fas fa-th-list fa-3x"></i>
            <h3>{{ $categoryCount }}</h3>
            <p>Total Kategori</p>
        </div>

        <div style="width: 23%; padding: 20px; background-color: #ffc107; color: black; text-align: center; border-radius: 5px;">
            <i class="fas fa-truck fa-3x"></i>
            <h3>{{ $supplierCount }}</h3>
            <p>Total Supplier</p>
        </div>

        <div style="width: 23%; padding: 20px; background-color: #dc3545; color: white; text-align: center; border-radius: 5px;">
            <i class="fas fa-arrow-circle-down fa-3x"></i>
            <h3>{{ $barangMasukCount }}</h3>
            <p>Barang Masuk</p>
        </div>

        <div style="width: 23%; padding: 20px; background-color: rgb(186, 74, 136); color: white; text-align: center; border-radius: 5px;">
            <i class="fas fa-arrow-circle-up fa-3x"></i>
            <h3>{{ $barangKeluarCount }}</h3>
            <p>Barang Keluar</p>
        </div>
    </div>
@endsection
