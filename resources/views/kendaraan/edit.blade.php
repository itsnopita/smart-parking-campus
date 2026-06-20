<h1>Edit Kendaraan</h1>

<form action="/kendaraan/{{ $kendaraan->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" 
          name="plat_nomor"
          value="{{ $kendaraan->plat_nomor }}">

    <br><br>

    <select name="jenis">
        <option value="motor"
            {{ $kendaraan->jenis == 'motor' ? 'selected' : '' }}>
            Motor
        </option>

        <option value="mobil"
            {{ $kendaraan->jenis == 'mobil' ? 'selected' : '' }}>
            Mobil
        </option>
    </select>

    <br><br>

    <input type="text"
          name="merk"
          value="{{ $kendaraan->merk }}">

    <br><br>

    <input type="text"
          name="warna"
          value="{{ $kendaraan->warna }}">

    <br><br>

    <button type="submit">
        Update Kendaraan
    </button>
</form>