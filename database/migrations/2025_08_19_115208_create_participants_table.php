<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('participants', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->cascadeOnDelete();
$table->foreignId('event_id')->constrained()->cascadeOnDelete();
$table->string('full_name');
$table->string('email');
$table->string('phone');
$table->string('unique_code')->unique();
$table->timestamp('registered_at')->nullable();
$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('participants');
}
};