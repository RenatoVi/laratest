<?php

namespace App\Models;

use App\Enums\NivelGerenteEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property NivelGerenteEnum $nivel
 */
class Gerente extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'nivel',
    ];

    protected $casts = [
        'nivel' => NivelGerenteEnum::class,
    ];

    public function isNivelDois()
    {
        return $this->nivel === NivelGerenteEnum::NIVEL_DOIS;
    }
}
