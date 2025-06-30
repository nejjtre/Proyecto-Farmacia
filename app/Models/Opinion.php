<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opinion extends Model
{
    protected $table = 'opinions';
    
    protected $fillable = [
        'producto_id',
        'user_id',
        'calificacion',
        'comentario',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'calificacion' => 'integer'
    ];

    // Relación con producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Productos::class);
    }

    // Relación con usuario
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}