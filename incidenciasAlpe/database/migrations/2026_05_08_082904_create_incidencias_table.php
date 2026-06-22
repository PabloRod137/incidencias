<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('incidencias', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('descripcion');
        $table->text('acciones_a_realizar')->nullable();
        $table->enum('estado', ['abierta', 'en_proceso', 'resuelta'])->default('abierta');
        $table->enum('prioridad', ['baja', 'media', 'alta', 'critica'])->default('media');
        
        // Relaciones principales[cite: 1, 3]
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // El profesor
        $table->foreignId('aula_id')->constrained()->onDelete('cascade'); // El lugar
        $table->foreignId('categoria_id')->constrained()->onDelete('cascade'); // El tipo
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
