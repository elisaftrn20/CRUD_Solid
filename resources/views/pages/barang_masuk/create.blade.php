@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Tambah Barang Masuk</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('barang_masuk.index') }}">Data Barang Masuk</a></li>
            <li class="breadcrumb-item active">Tambah Barang Masuk</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Form Tambah Barang Masuk</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('barang_masuk.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="purchase_price">Harga Beli</label>
                        <input type="number" name="purchase_price" id="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price') }}" required>
                        @error('purchase_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="entry_date">Tanggal Masuk</label>
                        <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date') }}" required>
                        @error('entry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input untuk bukti barang masuk -->
                    <div class="form-group">
                        <label for="barang_masuk">Bukti Barang Masuk</label>
                        <input type="file" name="gambar_barang" id="barang_masuk" class="form-control-file @error('gambar_barang') is-invalid @enderror" accept="image/*" onchange="previewImage(event, 'preview_barang_masuk')">
                        @error('gambar_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img id="preview_barang_masuk" src="#" alt="Preview Bukti Barang Masuk" class="img-fluid d-none mt-2" style="max-width: 200px; border: 1px solid #ddd; padding: 5px;">
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('barang_masuk.index') }}" class="btn btn-outline-secondary mr-2" onclick="resetPreview()">BATAL</a>
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan preview gambar -->
<script>
    function previewImage(event, targetId) {
        const file = event.target.files[0];
        const preview = document.getElementById(targetId);
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                preview.src = reader.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = "#";
            preview.classList.add('d-none');
        }
    }

    function resetPreview() {
        const preview = document.getElementById('preview_barang_masuk');
        preview.src = "#";
        preview.classList.add('d-none');
        document.getElementById('barang_masuk').value = "";
    }
</script>
@endsection
