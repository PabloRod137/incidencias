<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaFactory> */
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = ['nombre', 'responsable_id'];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }
}
