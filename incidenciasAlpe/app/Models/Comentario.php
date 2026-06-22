<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = ['incidencia_id', 'user_id', 'mensaje'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }
}
