<!DOCTYPE DOCTYPE html>
<html>
<head>
    <title>Form Input Pegawai</title>
</head>
<body>

    <h1 class="mb-4">Form Pegawai</h1>

    {{-- !!! KRUSIAL: TAMBAHKAN KODE INI UNTUK MENAMPILKAN PESAN ERROR VALIDASI !!! --}}
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
            <strong>Gagal Simpan! Periksa kesalahan di bawah ini:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap:</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" value="{{ old('email') }}"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Nomor Telepon:</label></td>
                <td><input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir:</label></td>
                {{-- KESALAHAN HTML ASLI: TIDAK ADA PENUTUP </td>, DIPINDAH DI BAWAH --}}
                <td><input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea id="alamat" name="alamat">{{ old('alamat') }}</textarea></td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                <td><input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"></td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select id="status" name="status">
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
    
    {{-- PENUTUP HTML --}}
</body>
</html>