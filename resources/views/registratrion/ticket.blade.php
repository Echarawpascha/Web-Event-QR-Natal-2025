<!DOCTYPE html>
<html>
<head><title>Tiket QR</title></head>
<body>
  <h2>Tiket Kamu</h2>
  <p>Nama: {{ $registration->full_name }}</p>
  <p>Kode Tiket: <strong>{{ $registration->ticket_code }}</strong></p>

  {{-- Tampilkan QR (pakai facade) --}}
  {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(240)->margin(1)->generate($registration->ticket_code) !!}

  <p>Simpan/ss halaman ini. QR ini dipakai saat check-in.</p>
</body>
</html>
