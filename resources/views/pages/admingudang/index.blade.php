@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 style="font-size: 24px; font-weight: bold; color: #2C3E50;">Daftar Admin Gudang</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right" style="background: none; padding: 0; font-size: 14px;">
            <li class="breadcrumb-item"><a href="#" style="color: #3498db; text-decoration: none;">Beranda</a></li>
            <li class="breadcrumb-item active" style="color: #7f8c8d;">Admin Gudang</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="card-header d-flex justify-content-end" style="background: #1ABC9C; border-radius: 10px 10px 0 0;">
                <a href="/admingudang/create" class="btn btn-sm" 
                   style="background: white; color: #1ABC9C; border: 1px solid #1ABC9C; padding: 6px 12px; border-radius: 5px; font-weight: bold; transition: 0.3s;">
                  Tambah Admin
                </a>
            </div>
            <div class="card-body" style="padding: 20px;">
                <table class="table table-bordered" style="border-radius: 5px; overflow: hidden;">
                    <thead>                   
                        <tr style="background: #2C3E50; color: white;">
                            <th style="padding: 10px; text-align: center;">No</th>
                            <th style="padding: 10px;">Nama</th>
                            <th style="padding: 10px;">Email</th>
                            <th style="padding: 10px;">Password</th>
                            <th style="padding: 10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $index => $admin)
                        <tr style="background: #f8f9fa;">
                            <td style="text-align: center; padding: 10px;">{{ $index + 1 }}</td>
                            <td style="padding: 10px;">{{ $admin->name }}</td>
                            <td style="padding: 10px;">{{ $admin->email }}</td>
                            <td style="padding: 10px;">
                                {{ substr($admin->password, 0, strlen($admin->password) / 2) . str_repeat('*', strlen($admin->password) / 2) }}
                            </td>
                            <td style="text-align: center; padding: 10px;">
                                <a href="/admingudang/edit/{{ $admin->id }}" class="btn btn-warning btn-sm" style="margin-right: 5px; border-radius: 5px;">
                                    Edit
                                </a>
                                <!-- Hapus dengan konfirmasi -->
                                <form action="/admingudang/{{ $admin->id }}" method="POST" id="delete-form-{{ $admin->id }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" style="border-radius: 5px;" onclick="confirmDelete({{ $admin->id }})">
                                        Hapus
                                    </button>
                                </form>
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
    function confirmDelete(adminId) {
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
                // Menyubmit form jika konfirmasi hapus
                document.getElementById('delete-form-' + adminId).submit();
            }
        });
    }
</script>
@endsection
