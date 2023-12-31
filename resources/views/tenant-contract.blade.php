@extends('app')

@section('title', 'Tenant Contract')

@section('content')
<div class="tenant-contract-container">
    <h2>Formulir Pendaftaran Kontrak Tenant</h2>
    
    <form class="tenant-contract-form" action="{{ route('tenant-contract.store') }}" method="POST">
    @csrf
    <section class="form-section">
        <h3>Profil Pemilik</h3>
        <div class="form-group">
            <label for="restaurant-name">Nama Restoran (Merek)</label>
            <input type="text" id="restaurant-name" name="nama_restoran" required>
        </div>
    </section>

    <section class="form-section">
        <h3>Data Personal</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon Pemilik</label>
                <input type="tel" id="nomor_telepon" name="nomor_telepon" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="email">Email Pemilik</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="owner-city">Kota</label>
                <input type="text" id="kota" name="kota" required>
            </div>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Pemilik</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>
    </section>

    <button type="submit" class="submit-button">Submit</button>
</form>


    <table class="tenant-contract-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Restoran</th>
                <th>Nama Pemilik</th>
                <th>No Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($contracts))
            @foreach($contracts as $contract)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contract->nama_restoran}}</td>
                <td>{{ $contract->nama_pemilik }}</td>
                <td>{{ $contract->nomor_telepon }}</td>
                <td>
                    <form action="{{ route('tenant-contract.destroy', $contract->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
        <p>No contracts found.</p>
        @endif
        </tbody>
    </table>
</div>
</div>
@endsection
