@extends('app')

@section('title', 'Laporan')

@section('content')
<div class="laporan-container">
    <h2>Formulir Laporan</h2>
    
    <form class="laporan-form">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="identity-number">Nomor Identitas</label>
            <input type="text" id="identity-number" name="identity-number" required>
        </div>
        
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <button type="submit" class="submit-button">Kirim Laporan</button>
    </form>
</div>
@endsection
