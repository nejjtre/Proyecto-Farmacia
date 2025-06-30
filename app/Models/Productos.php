<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Productos extends Model
{
    protected $table = 'productos'; // Nombre exacto de la tabla
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'precio',
        'cantidad'
    ];
    protected $casts = [
        'precio' => 'decimal:2'
    ];

    // Relación con opiniones (si aplica)
    public function opiniones(): HasMany
    {
        return $this->hasMany(Opinion::class);
    }
    

    // Método para verificar disponibilidad
    public function enStock(): bool
    {
        return $this->cantidad_stock > 0;
    }
}