@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Edit Barang Masuk</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('barang_masuk.index') }}">Data Barang Masuk</a></li>
            <li class="breadcrumb-item active">Edit Barang Masuk</li>
        </ol>
    </div>
</div>
@endsection 

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Form Edit Barang Masuk</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('barang_masuk.update', $barangMasuk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="product_id">Produk</label>
                        <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id', $barangMasuk->product_id) == $product->id ? 'selected' : '' }}>
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
                                <option value="{{ $supplier->id }}" {{ old('supplier_id', $barangMasuk->supplier_id) == $supplier->id ? 'selected' : '' }}>
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
                        <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $barangMasuk->quantity) }}" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="purchase_price">Harga Beli</label>
                        <input type="number" name="purchase_price" id="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price', $barangMasuk->purchase_price) }}" required>
                        @error('purchase_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="entry_date">Tanggal Masuk</label>
                        <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date', $barangMasuk->entry_date) }}" required>
                        @error('entry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gambar_barang">Bukti Barang Masuk</label>
                        <input type="file" name="gambar_barang" id="gambar_barang" class="form-control-file @error('gambar_barang') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                        @error('gambar_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mt-2">
                            @if($barangMasuk->gambar_barang)
                                <img id="preview" src="{{ asset('storage/' . $barangMasuk->gambar_barang) }}" alt="Bukti Barang Masuk" class="img-thumbnail" width="150">
                            @else
                                <img id="preview" src="#" alt="Preview Bukti Barang Masuk" class="img-thumbnail d-none" width="150">
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('barang_masuk.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.classList.remove('d-none');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
