<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metro extends Model
{
    use SoftDeletes;

    protected $table = 'metros';

    // Campos que se pueden llenar en masa
    protected $fillable = [
        'descripcion',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'data',
        'precio',
        'estado'
    ];
}
