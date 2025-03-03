@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Tambah Barang Keluar</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('barang_keluar.index') }}">Data Barang Keluar</a></li>
            <li class="breadcrumb-item active">Tambah Barang Keluar</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Form Tambah Barang Keluar</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('barang_keluar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Produk</label>
                        <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                            <option value="">Pilih Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exit_date">Tanggal Keluar</label>
                        <input type="date" name="exit_date" id="exit_date" class="form-control @error('exit_date') is-invalid @enderror" value="{{ old('exit_date') }}" required>
                        @error('exit_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="barang_keluar">Bukti Barang Keluar</label>
                        <input type="file" name="barang_keluar" id="barang_keluar" class="form-control-file @error('barang_keluar') is-invalid @enderror" accept="image/*" onchange="previewImage(event, 'preview_barang_keluar')">
                        @error('barang_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img id="preview_barang_keluar" src="#" alt="Preview Bukti Barang Masuk" class="img-fluid d-none" style="max-width: 200px; border: 1px solid #ddd; padding: 5px;">
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('barang_keluar.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Script untuk menampilkan preview gambar -->
<script>
    function previewImage(event, targetId) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById(targetId);
            preview.src = reader.result;
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
