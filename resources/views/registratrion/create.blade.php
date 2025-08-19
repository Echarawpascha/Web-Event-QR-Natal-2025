<!DOCTYPE html>
<html>
<head><title>Daftar Event</title></head>
<body>
<h2>Form Pendaftaran Event</h2>

@if ($errors->any())
  <div>
    <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  </div>
@endif

<form method="POST" action="{{ route('registrations.store') }}">
  @csrf
  <div>
    <label>Nama Lengkap</label><br>
    <input type="text" name="full_name" value="{{ old('full_name', auth()->user()->name) }}" required>
  </div>
  <div>
    <label>No. HP (opsional)</label><br>
    <input type="text" name="phone" value="{{ old('phone') }}">
  </div>
  <button type="submit">Daftar & Dapatkan QR</button>
</form>

</body>
</html>
