@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 style="font-size: 24px; font-weight: bold; color: #2C3E50;">Produk/Barang</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="background: none; padding: 0; font-size: 14px;">
            <li class="breadcrumb-item"><a href="#" style="color: #3498db; text-decoration: none;">Beranda</a></li>
            <li class="breadcrumb-item active" style="color: #7f8c8d;">Produk/Barang</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="card-header d-flex justify-content-end" style="background: #1ABC9C; border-radius: 10px 10px 0 0;">
                @if(auth()->user()->role == 'superadmin')
                <a href="/products/create" class="btn btn-sm" 
                   style="background: white; color: #1ABC9C; border: 1px solid #1ABC9C; padding: 6px 12px; border-radius: 5px; font-weight: bold; transition: 0.3s;">
                  Tambah Barang
                </a>
                @endif
            </div>
            <div class="card-body" style="padding: 20px;">
                <table class="table table-bordered" style="border-radius: 5px; overflow: hidden;">
                    <thead>                  
                        <tr style="background: #2C3E50; color: white;">
                            <th style="padding: 10px; text-align: center;">No</th>
                            <th style="padding: 10px;">Produk/Barang</th>
                            <th style="padding: 10px;">Deskripsi</th>
                            <th style="padding: 10px;">Harga Jual</th>
                            <th style="padding: 10px;">Stok</th>
                            <th style="padding: 10px;">Kategori</th>
                            <th style="padding: 10px;">Gambar</th>
                            @if(auth()->user()->role == 'superadmin') 
                                <th style="padding: 10px; text-align: center;">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr style="background: #f8f9fa;">
                            <td style="text-align: center; padding: 10px;">{{ $loop->iteration }}</td> 
                            <td style="padding: 10px;">{{ $product->name }}</td>
                            <td style="padding: 10px;">{{ $product->description }}</td>
                            <td style="padding: 10px;">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td style="padding: 10px;">{{ $product->stock }}</td>
                            <td style="padding: 10px;">{{ $product->category->name }}</td>
                            <!-- <pre>{{ var_dump($product->gambar_produk) }}</pre> -->
                            <td>
                                @if ($product->gambar_produk)
                                <img src="{{ asset($product->gambar_produk) }}" alt="Gambar Produk" 
                                class="img-fluid" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                                @endif
                            </td>
                            @if(auth()->user()->role == 'superadmin') 
                            <td style="text-align: center; padding: 10px;">
                                <div class="d-flex justify-content-center">
                                    <a href="/products/edit/{{ $product->id }}" class="btn btn-sm mr-2" 
                                       style="background: #f39c12; color: white; border: none; padding: 6px 12px; border-radius: 5px; transition: 0.3s;">
                                        Edit
                                    </a>
                                    <button onclick="confirmDelete({{ $product->id }})" class="btn btn-sm"
                                            style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 5px; transition: 0.3s;">
                                        Hapus
                                    </button>
                                    <form id="delete-form-{{ $product->id }}" action="/products/{{ $product->id }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }
</script>

@endsection
