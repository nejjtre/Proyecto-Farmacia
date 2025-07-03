<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Productos extends Model
{
    use Sortable;
    
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'categoria', 
        'precio', 
        'cantidad'
    ];
    
    public $sortable = [
        'id',
        'nombre',
        'categoria',
        'precio',
        'cantidad',
        'created_at',
        'updated_at'
    ];
}