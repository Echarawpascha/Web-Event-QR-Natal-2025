<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventRegistrationController extends Controller
{
    // Tampilkan form pendaftaran (hanya untuk peserta login)
    public function create()
    {
        return view('registration.create');
    }

    // Simpan data + generate ticket_code + tampilkan QR
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone'     => 'nullable|string|max:30',
        ]);

        // generate kode unik (10 karakter)
        do {
            $code = strtoupper(Str::random(10));
        } while (Registration::where('ticket_code', $code)->exists());

        $registration = Registration::create([
            'user_id'     => auth()->id(),
            'full_name'   => $request->full_name,
            'phone'       => $request->phone,
            'ticket_code' => $code,
        ]);

        return redirect()->route('registrations.ticket', $registration);
    }

    // Halaman tiket (menampilkan QR)
    public function ticket(Registration $registration)
    {
        // pastikan hanya pemilik tiket yang bisa lihat
        abort_unless($registration->user_id === auth()->id(), 403);

        return view('registration.ticket', compact('registration'));
    }
}
