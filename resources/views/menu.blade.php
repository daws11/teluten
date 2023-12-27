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
    <div class="menu-item">
        <p class="item-name">Nasgor Biasa</p>
        <p class="item-price">Rp. 10.000</p>
        <div class="item-controls">
            <button class="minus-button">-</button>
            <input type="text" class="quantity-input" value="1">
            <button class="plus-button">+</button>
        </div>
    </div>
    <div class="menu-item">
        <p class="item-name">Nasgor Sosis</p>
        <p class="item-price">Rp. 13.000</p>
        <div class="item-controls">
            <button class="minus-button">-</button>
            <input type="text" class="quantity-input" value="1">
            <button class="plus-button">+</button>
        </div>
    </div>
    <div class="menu-item">
        <p class="item-name">Milo</p>
        <p class="item-price">Rp. 9.000</p>
        <div class="item-controls">
            <button class="minus-button">-</button>
            <input type="text" class="quantity-input" value="1">
            <button class="plus-button">+</button>
        </div>
    </div>
    
    <!-- Tombol yang memicu modal -->
<button class="order-button" onclick="openPaymentModal()">Order</button>

<!-- Modal Pembayaran -->
<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePaymentModal()">&times;</span>
        <h3>Total Pesanan</h3>
        <input type="text" value="Rp.32.000" readonly>
        <h3>Dibayar</h3>
        <input type="text" value="Rp.50.000" readonly>
        <h3>Kembalian</h3>
        <input type="text" value="Rp.18.000" readonly>
        <button class="btn-pay" onclick="confirmPayment()">Bayar</button>
        <button class="btn-cancel" onclick="closePaymentModal()">Batal</button>
    </div>
</div>

<!-- Modal Konfirmasi Pembayaran Berhasil -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeSuccessModal()">&times;</span>
        <div class="success-checkmark">
            <div class="check-icon">
                <span class="icon-line line-tip"></span>
                <span class="icon-line line-long"></span>
                <div class="icon-circle"></div>
                <div class="icon-fix"></div>
            </div>
        </div>
        <h3>Pembayaran Berhasil!</h3>
        <p>Order #16</p>
        <p>Total Rp.32.000</p>
        <p>Jumlah Uang Rp.50.000</p>
        <p>Kembalian Rp.18.000</p>
        <button onclick="closeSuccessModal()">Home</button>
        <button onclick="printReceipt()">Print</button>
    </div>
</div>

</div>

</div>

@push('head')
<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
@endpush

@endsection
