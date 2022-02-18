<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    // conecta con -> carreras

    /* wp_carrera
    si el nombre de mi tabla no cumple la convencion de models usar... */
    //protected $table = "wp_carrera";

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}