@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Edit Barang Keluar</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('barang_keluar.index') }}">Data Barang Keluar</a></li>
            <li class="breadcrumb-item active">Edit Barang Keluar</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="card-header" style="background: #1ABC9C; border-radius: 10px 10px 0 0; color: white; font-weight: bold;">
                Form Edit Barang Keluar
            </div>
            <div class="card-body">
                <form action="{{ route('barang_keluar.update', $barangKeluar->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="product_id">Produk</label>
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $barangKeluar->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>
                        <select name="supplier_id" class="form-control">
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $barangKeluar->supplier_id == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $barangKeluar->quantity }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exit_date">Tanggal Keluar</label>
                        <input type="date" name="exit_date" class="form-control" value="{{ $barangKeluar->exit_date }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="gambar_barang_keluar">Bukti Barang Keluar</label>
                        <input type="file" name="gambar_barang_keluar" id="gambar_barang_keluar" class="form-control-file @error('gambar_barang_keluar') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                        @error('gambar_barang_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    <div class="mt-2">
                        @if($barangKeluar->gambar_barang_keluar)
                        <img id="preview" src="{{ asset('storage/' . $barangKeluar->gambar_barang_keluar) }}" alt="Bukti Barang Keluar" 
                        style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px; border-radius: 5px;">
                        @else
                        <img id="preview" src="#" alt="Preview Bukti Barang Keluar" 
                        class="img-thumbnail d-none" width="100" height="100" style="object-fit: cover; border-radius: 5px;">
                        @endif
                    </div>
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