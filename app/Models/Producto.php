<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
    'nombre',
    'descripcion',
    'precio',
    'imagen',
    'user_id',
];
public function ventas()
{
    return $this->hasMany(Ventasp::class, 'producto_id');
}


public function productor() // dueño del producto
{
    return $this->belongsTo(User::class, 'user_id');
}
    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // o 'productor_id' si así lo guardas
    }
    public function pedidos()
{
    return $this->hasMany(Pedido::class);
}
}
