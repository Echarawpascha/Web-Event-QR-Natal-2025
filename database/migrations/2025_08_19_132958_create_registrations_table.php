<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pemilik tiket (peserta)
        $table->string('full_name');
        $table->string('phone')->nullable();
        $table->string('ticket_code')->unique(); // isi di QR
        $table->timestamp('checked_in_at')->nullable(); // waktu hadir
        $table->timestamps();
    });
}
public function down(): void
{
    Schema::dropIfExists('registrations');
}

};
