@extends('app')

@section('title', 'Menu')

@section('content')
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
                @foreach ($produk as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>Rp. {{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                    <td>{{ $item->jumlah_produk }}</td>
                    <td>
                        <button class="edit-button" onclick='openEditModal(@json($item))'>Edit</button>
                        <button class="edit-button" onclick='deleteProduct({{ $item->id }})'>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

                <!-- Modal Edit Produk -->
        <div id="editProductModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Edit Produk</h2>
                <form method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="editProductId" name="id">
                    
                    <div class="form-group">
                        <label for="editProductName">Nama Produk</label>
                        <input type="text" id="editProductName" name="nama_produk" required>
                    </div>

                    <div class="form-group">
                        <label for="editProductType">Jenis</label>
                        <select id="editProductType" name="jenis_produk">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editProductPrice">Harga</label>
                        <input type="text" id="editProductPrice" name="harga_produk" required>
                    </div>

                    <div class="form-group">
                        <label for="editProductQuantity">Jumlah</label>
                        <input type="number" id="editProductQuantity" name="jumlah_produk" required>
                    </div>

                    <button type="submit" class="submit-button">Update</button>
                </form>
            </div>
        </div>

    </div>
</div>


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
<script src="{{ asset('js/menu.js') }}"></script>
<script type="module" src="{{ asset('js/app.js') }}"></script>

@endpush

@endsection
