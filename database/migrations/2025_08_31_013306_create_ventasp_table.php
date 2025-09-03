<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventasp', function (Blueprint $table) {
            $table->id();
        $table->string('cliente');
        $table->integer('cantidad');
        $table->decimal('precio', 10, 2); // 👈 Campo para precio
        $table->unsignedBigInteger('producto_id')->nullable(); // relación opcional
        $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventasp');
    }
};
