@extends('layouts.admin-layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>
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
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if (count($orders) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">Tidak ada data</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ $order->menu->name }}</td>
                                        <td>Rp{{ number_format($order->menu->price, 0, ',', '.') }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>Rp{{ number_format($order->menu->price * $order->quantity, 0, ',', '.') }}</td>

                                        <td>
                                            <form method="POST" action="{{ route('admin.confirm', $order->id) }}">
                                                @csrf
                                                <button class="btn btn-sm btn-success" type="submit">Konfirmasi</button>
                                            </form>

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
