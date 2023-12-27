@extends('app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <div class="form-container">
        <h1 class="form-title">Edit Produk</h1>
        <p class="form-description">Memperbarui informasi produk yang dipilih</p>

        <form action="/products/edit" method="post">
            @csrf <!-- Token CSRF untuk keamanan -->
            <div class="form-group">
                <label for="productName">Nama Produk</label>
                <input type="text" id="productName" name="productName" value="Nasgor Biasa" required>
            </div>

            <div class="form-group">
                <label for="productType">Jenis</label>
                <select id="productType" name="productType">
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <!-- Tambahkan opsi lain sesuai dengan jenis produk Anda -->
                </select>
            </div>

            <div class="form-group">
                <label for="productPrice">Harga</label>
                <input type="text" id="productPrice" name="productPrice" value="10000" required>
            </div>

            <div class="form-group">
                <label for="productQuantity">Jumlah</label>
                <input type="number" id="productQuantity" name="productQuantity" value="1" required>
            </div>

            <button type="submit" class="submit-button">Simpan</button>
        </form>
    </div>
</div>
@endsection
