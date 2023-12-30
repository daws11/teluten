{{-- resources/views/add.blade.php --}}
@extends('app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">
    <div class="form-container">
        <h1 class="form-title">Tambah Produk</h1>
        <p class="form-description">Masukkan informasi produk baru di bawah ini.</p>

        <form action="{{ route('produk.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="productName">Nama Produk</label>
                <input type="text" id="productName" name="nama_produk" required>
            </div>

            <div class="form-group">
                <label for="productType">Jenis</label>
                <select id="productType" name="jenis_produk">
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
            </div>

            <div class="form-group">
                <label for="productPrice">Harga</label>
                <input type="number" id="productPrice" name="harga_produk" required>
            </div>

            <div class="form-group">
                <label for="productQuantity">Jumlah</label>
                <input type="number" id="productQuantity" name="jumlah_produk" required>
            </div>

            <button type="submit" class="submit-button">Tambahkan</button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection
