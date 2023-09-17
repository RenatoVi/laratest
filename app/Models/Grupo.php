<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string nome
 * @property Collection clientes
 */
class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'cliente_grupo', 'grupo_id', 'cliente_id');
    }
}
