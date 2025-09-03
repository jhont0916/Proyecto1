<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del producto
            $table->text('descripcion')->nullable(); // Descripción
            $table->decimal('precio', 10, 2); // Precio con 2 decimales
            $table->string('imagen')->nullable(); // Ruta de la imagen
            $table->unsignedBigInteger('user_id'); // Relación con usuario
            $table->timestamps();

            // Clave foránea para relacionar con usuarios
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
