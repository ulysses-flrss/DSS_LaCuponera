<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'oferta';
    protected $fillable = [
        'titulo',
        'precio_regular',
        'precio_oferta',
        'inicio_oferta',
        'fin_oferta',
        'fechaLimite_cupon',
        'cantidadLimite_cupon',
        'descripcion',
        'estado',
        'cod_empresa'
    ];
}
