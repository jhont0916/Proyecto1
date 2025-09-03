<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            // Quién compró (cliente)
            $table->foreignId('cliente_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Qué producto compró
            $table->foreignId('producto_id')
                  ->constrained('productos')
                  ->cascadeOnDelete();

            // Datos de la venta (snapshot)
            $table->unsignedInteger('cantidad')->default(1);
            $table->decimal('precio_unitario', 12, 2); // copia del precio del producto en el momento
            $table->decimal('total', 12, 2);           // cantidad * precio_unitario

            // (Opcional) estado de la venta
            $table->string('estado')->default('pagado'); // pagado|pendiente|cancelado

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
