@extends('layouts.beranda-layout')

@section('content')
    <div class="container mt-5 h-100" style="min-height: 100vh;">
        <h2>Keranjang Belanja</h2>
        @if($carts->isEmpty())
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
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{ $cart->menu->name }}</td>
                            <td>Rp{{ number_format($cart->menu->price, 0, ',', '.') }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>Rp{{ number_format($cart->menu->price * $cart->quantity, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
