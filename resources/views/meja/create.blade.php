@extends('layouts.app')

@section('title', 'Tambah Meja')

@section('content')
    <h1>Tambah Meja</h1>
    <p class="subtitle">Tambahkan data meja restoran baru</p>

    <form action="{{ route('meja.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nomor_meja">Nomor Meja:</label>
            <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" placeholder="Contoh: M-01" value="{{ old('nomor_meja') }}" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas Kursi:</label>
            <select name="kapasitas" id="kapasitas" class="form-control" required>
                <option value="2" {{ old('kapasitas') == '2' ? 'selected' : '' }}>2 Kursi</option>
                <option value="4" {{ old('kapasitas', '4') == '4' ? 'selected' : '' }}>4 Kursi</option>
                <option value="8" {{ old('kapasitas') == '8' ? 'selected' : '' }}>8 Kursi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="lokasi">Zonasi:</label>
            <select name="lokasi" id="lokasi" class="form-control" required>
                <option value="Indoor" {{ old('lokasi') == 'Indoor' ? 'selected' : '' }}>Indoor</option>
                <option value="VIP" {{ old('lokasi') == 'VIP' ? 'selected' : '' }}>VIP</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Terisi" {{ old('status') == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                <option value="Reservasi" {{ old('status') == 'Reservasi' ? 'selected' : '' }}>Reservasi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="gambar">Foto / Gambar Meja (Opsional):</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            <small style="color: #666;">Format: JPG, JPEG, PNG (Maks 2MB). Jika dikosongkan akan memakai foto default.</small>
        </div>

        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="{{ route('meja.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
