@extends('layouts.admin-layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar User</h1>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if (count($users) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">Tidak ada data</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/{{ $user->id }}"
                                                    class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $user->id }}">
                                                    <i class="fas fa-eraser fa-sm"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @include('admin.confirmation-delete') --}}
                                @endforeach


                            </tbody>
                        @endif

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
