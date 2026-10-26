@extends('layouts.app')

@section('title', 'Master Meja & Area')

@section('content')
    <h1>Master Meja & Area</h1>
    <p class="subtitle">Data Meja Restoran</p>

    <table>
        <tr>
            <th style="width: 50px;">No</th>
            <th>Nomor Meja</th>
            <th style="width: 120px;">Kapasitas</th>
            <th style="width: 120px;">Zona</th>
            <th style="width: 140px;">Status</th>
            <th style="width: 80px;">Gambar</th>
            <th style="width: 160px;">Aksi</th>
        </tr>

        @forelse($meja as $index => $item)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td><strong>{{ $item->nomor_meja }}</strong></td>
                <td align="center">{{ $item->kapasitas }} Kursi</td>
                <td align="center">{{ $item->lokasi }}</td>
                <td align="center">
                    @php
                        $badgeClass = 'badge-tersedia';
                        if ($item->status == 'Terisi') $badgeClass = 'badge-terisi';
                        elseif ($item->status == 'Reservasi') $badgeClass = 'badge-reservasi';
                    @endphp
                    <span class="badge {{ $badgeClass }}">{{ $item->status }}</span>
                </td>
                <td align="center">
                    @php
                        $imgSrc = asset('images/OIP.jpeg');
                        if (!empty($item->gambar) && file_exists(public_path($item->gambar))) {
                            $imgSrc = asset($item->gambar);
                        }
                    @endphp
                    <img src="{{ $imgSrc }}" alt="Gambar Meja" class="img-preview">
                </td>
                <td align="center">
                    <a href="{{ route('meja.edit', $item->id) }}" class="btn btn-warning" style="padding: 4px 10px; font-size: 13px;">Edit</a>
                    
                    <form action="{{ route('meja.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data meja ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 4px 10px; font-size: 13px;">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" align="center" style="padding: 25px; color: #888;">Belum ada data meja.</td>
            </tr>
        @endforelse
    </table>

    <div style="margin-top: 20px;">
        <a href="{{ route('meja.create') }}" class="btn btn-primary">+ Tambah Meja</a>
    </div>
@endsection
