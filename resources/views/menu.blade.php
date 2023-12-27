@extends('app')

@section('title', 'Menu')

@section('content')
<div class="menu-container">
    <div class="product-table">
        <h2>Menu</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh baris produk -->
                @for ($i = 1; $i <= 10; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Nasgor Bawang</td>
                    <td>Rp. 10.000</td>
                    <td>
                        <button class="amount-button">-</button>
                        <input type="text" value="1" class="amount-input">
                        <button class="amount-button">+</button>
                    </td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
                @endfor
            </tbody>
        </table>
        <button class="order-button">Buat Pesanan</button>
    </div>

    <div class="order-cart">
        <h3>Order Menu</h3>
        <p>Order No. 16</p>
        <p>Silahkan pilih menu...</p>
        <button class="order-button">Order</button>
    </div>
</div>

@push('head')
<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
@endpush

@endsection
