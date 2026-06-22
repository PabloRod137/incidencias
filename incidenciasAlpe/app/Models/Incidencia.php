<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    /** @use HasFactory<\Database\Factories\IncidenciaFactory> */
    use HasFactory;

    protected $table = 'incidencias';

    protected $fillable = [
        'titulo',
        'descripcion',
        'acciones_a_realizar',
        'estado',
        'prioridad',
        'user_id',
        'aula_id',
        'categoria_id',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
