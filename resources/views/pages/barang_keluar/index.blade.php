@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 style="font-size: 24px; font-weight: bold; color: #2C3E50;">Data Barang Keluar</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="background: none; padding: 0; font-size: 14px;">
            <li class="breadcrumb-item"><a href="#" style="color: #3498db; text-decoration: none;">Beranda</a></li>
            <li class="breadcrumb-item active" style="color: #7f8c8d;">Data Barang Keluar</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="card-header d-flex justify-content-end" style="background: #1ABC9C; border-radius: 10px 10px 0 0;">
                <a href="{{ route('barang_keluar.create') }}" class="btn btn-sm" 
                   style="background: white; color: #1ABC9C; border: 1px solid #1ABC9C; padding: 6px 12px; border-radius: 5px; font-weight: bold; transition: 0.3s;">
                    Tambah Barang Keluar
                </a>
            </div>
            <div class="card-body" style="padding: 20px;">
                <table class="table table-bordered" style="border-radius: 5px; overflow: hidden;">
                    <thead>                   
                        <tr style="background: #2C3E50; color: white;">
                            <th style="padding: 10px; text-align: center;">No</th>
                            <th style="padding: 10px;">Produk</th>
                            <th style="padding: 10px;">Supplier</th>
                            <th style="padding: 10px;">Jumlah</th>
                            <th style="padding: 10px;">Tanggal Keluar</th>
                            <th style="padding: 10px; text-align: center;">Bukti Barang Keluar</th>
                            <th style="padding: 10px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangKeluar as $items)
                        <tr style="background: #f8f9fa;">
                            <td style="text-align: center; padding: 10px;">{{ $loop->iteration }}</td> 
                            <td style="padding: 10px;">{{ $items->product->name }}</td>
                            <td style="padding: 10px;">{{ $items->supplier->name }}</td>
                            <td style="padding: 10px;">{{ $items->quantity }}</td>
                            <td style="padding: 10px;">{{ $items->exit_date }}</td>
                            <td style="text-align: center; padding: 10px;">
                                @if($items->gambar_barang_keluar)
                                    <img src="{{ asset('storage/'.$items->gambar_barang_keluar) }}" alt="Gambar Barang" 
                                         style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px;">
                                @else
                                    <span style="color: #e74c3c;">Tidak ada bukti</span>
                                @endif
                            </td>
                            <td style="text-align: center; padding: 10px;">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('barang_keluar.edit', $items->id) }}" class="btn btn-sm mr-2" 
                                       style="background: #f39c12; color: white; border: none; padding: 6px 12px; border-radius: 5px; transition: 0.3s;">
                                       Edit
                                    </a>
                                    <form action="{{ route('barang_keluar.delete', $items->id) }}" method="POST" id="delete-form-{{ $items->id }}">
                                        @csrf
                                        @method('DELETE')
                                        @if(auth()->user()->role == 'superadmin') 
                                        <button type="button" onclick="confirmDelete({{ $items->id }})" class="btn btn-sm" 
                                                style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 5px; transition: 0.3s;">
                                            Hapus
                                        </button>
                                        @endif
                                    </form>
                                </div>
                            </td>
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
    function confirmDelete(itemId) {
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
                document.getElementById('delete-form-' + itemId).submit();
            }
        });
    }
</script>
@endsection
