@extends('layouts.admin-layout')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Barang</h1>
        <a href="/admin/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        @if (count($menus) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">Tidak ada data</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->description }}</td>
                                        <td>{{ $menu->category }}</td>
                                        <td>{{ $menu->price }}</td>
                                        <td>{{ $menu->stock }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="80" class="img-thumbnail" style="height: 70px; object-fit: cover;">
                                        </td>
                                        
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/{{ $menu->id }}"
                                                    class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $menu->id }}">
                                                    <i class="fas fa-eraser fa-sm"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.confirmation-delete')
                                @endforeach


                            </tbody>
                        @endif

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
