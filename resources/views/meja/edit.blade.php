@extends('layouts.app')

@section('title', 'Edit Meja')

@section('content')
    <h1>Edit Data Meja</h1>
    <p class="subtitle">Perbarui data meja restoran</p>

    <form action="{{ route('meja.update', $meja->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomor_meja">Nomor Meja:</label>
            <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" value="{{ old('nomor_meja', $meja->nomor_meja) }}" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas Kursi:</label>
            <select name="kapasitas" id="kapasitas" class="form-control" required>
                <option value="2" {{ old('kapasitas', $meja->kapasitas) == 2 ? 'selected' : '' }}>2 Kursi</option>
                <option value="4" {{ old('kapasitas', $meja->kapasitas) == 4 ? 'selected' : '' }}>4 Kursi</option>
                <option value="8" {{ old('kapasitas', $meja->kapasitas) == 8 ? 'selected' : '' }}>8 Kursi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="lokasi">Zonasi:</label>
            <select name="lokasi" id="lokasi" class="form-control" required>
                <option value="Indoor" {{ old('lokasi', $meja->lokasi) == 'Indoor' ? 'selected' : '' }}>Indoor</option>
                <option value="VIP" {{ old('lokasi', $meja->lokasi) == 'VIP' ? 'selected' : '' }}>VIP</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Tersedia" {{ old('status', $meja->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Terisi" {{ old('status', $meja->status) == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                <option value="Reservasi" {{ old('status', $meja->status) == 'Reservasi' ? 'selected' : '' }}>Reservasi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="gambar">Foto / Gambar Meja:</label>
            <div style="margin-bottom: 10px;">
                @php
                    $imgSrc = asset('images/OIP.jpeg');
                    if (!empty($meja->gambar) && file_exists(public_path($meja->gambar))) {
                        $imgSrc = asset($meja->gambar);
                    }
                @endphp
                <img src="{{ $imgSrc }}" alt="Gambar Sekarang" class="img-preview" style="width: 70px; height: 70px;">
                <span style="font-size: 13px; color: #777; margin-left: 10px;">Gambar saat ini</span>
            </div>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            <small style="color: #666;">Pilih file baru jika ingin mengganti gambar (Format: JPG, JPEG, PNG, Maks 2MB).</small>
        </div>

        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('meja.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
