<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('attendances', function (Blueprint $table) {
$table->id();
$table->foreignId('participant_id')->constrained()->cascadeOnDelete();
$table->foreignId('checked_in_by')->constrained('users')->cascadeOnDelete();
$table->timestamp('checked_in_at');
$table->timestamps();


$table->unique('participant_id'); // 1x check-in saja
});
}


public function down(): void
{
Schema::dropIfExists('attendances');
}
};