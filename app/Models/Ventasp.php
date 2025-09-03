<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventasp extends Model
{
    use HasFactory;

    protected $table = 'ventasp';

    protected $fillable = [
        'cliente',
        'producto',
        'cantidad',
        'precio',
        'producto_id',
        'total'
    ];
    // 👇 Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
