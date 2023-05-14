<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $table = 'rubro';

    protected $fillable = [
        'cod_rubro',
        'rubro'
    ];
}
