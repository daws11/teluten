@extends('app')

@section('title', 'Tenant Contract')

@section('content')
<div class="tenant-contract-container">
    <h2>Formulir Pendaftaran Kontrak Tenant</h2>
    
    <form class="tenant-contract-form">
        <section class="form-section">
            <h3>Profil Pemilik</h3>
            <div class="form-group">
                <label for="restaurant-name">Nama Restoran (Merek)</label>
                <input type="text" id="restaurant-name" name="restaurant-name" required>
            </div>
        </section>

        <section class="form-section">
            <h3>Data Personal</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="owner-name">Nama Pemilik</label>
                    <input type="text" id="owner-name" name="owner-name" required>
                </div>
                <div class="form-group">
                    <label for="owner-phone">Nomor Telepon Pemilik</label>
                    <input type="tel" id="owner-phone" name="owner-phone" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="owner-email">Email Pemilik</label>
                    <input type="email" id="owner-email" name="owner-email" required>
                </div>
                <div class="form-group">
                    <label for="owner-id-type">Jenis Identitas Pemilik</label>
                    <select id="owner-id-type" name="owner-id-type">
                        <option value="ktp">KTP</option>
                        <!-- Other ID types -->
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="owner-id-number">Nomor Identitas Pemilik</label>
                    <input type="text" id="owner-id-number" name="owner-id-number" required>
                </div>
                <div class="form-group">
                    <label for="owner-city">Kota</label>
                    <input type="text" id="owner-city" name="owner-city" required>
                </div>
            </div>

            <div class="form-group">
                <label for="owner-address">Alamat Pemilik</label>
                <input type="text" id="owner-address" name="owner-address" required>
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
                <td>{{ $contract->restaurant_name }}</td>
                <td>{{ $contract->owner_name }}</td>
                <td>{{ $contract->owner_phone }}</td>
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
