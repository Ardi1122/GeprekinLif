@extends('layouts.beranda-layout')

@section('content')
    <div class="container mt-5 h-100" style="min-height: 100vh;">
        <h2>Keranjang Belanja</h2>
        @if ($carts->isEmpty())
            <p>Keranjang kamu kosong.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->menu->name }}</td>
                            <td>Rp{{ number_format($cart->menu->price, 0, ',', '.') }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>Rp{{ number_format($cart->menu->price * $cart->quantity, 0, ',', '.') }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{ $cart->id }}">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus item ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($carts as $cart)
                @include('cart.modal-edit', ['cart' => $cart])
            @endforeach
        @endif
    </div>
@endsection
