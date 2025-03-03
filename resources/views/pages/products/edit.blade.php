@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Ubah Produk</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi Produk</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Harga Produk</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stock" class="form-label">Stok Produk</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="form-label">Kategori Produk</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar_produk" class="form-label">Gambar Produk</label>
                        <input type="file" name="gambar_produk" id="gambar_produk" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-2">
                            <img id="preview" src="{{ asset('storage/' . $product->gambar_produk) }}" alt="Gambar Produk" class="img-thumbnail" width="150">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ url('/products') }}" class="btn btn-outline-secondary mr-2">BATAL</a>
                    <button type="submit" class="btn btn-success">SIMPAN PERUBAHAN</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
