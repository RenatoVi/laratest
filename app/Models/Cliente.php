<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string cnpj
 * @property string nome
 * @property string data_fundacao
 * @property Collection grupos
 */
class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'nome',
        'data_fundacao',
    ];

    public function grupos(): BelongsToMany
    {
        return $this->belongsToMany(Grupo::class, 'cliente_grupo', 'cliente_id', 'grupo_id');
    }
}
