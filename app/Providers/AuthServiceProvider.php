<?php

namespace App\Providers;

use App\Models\Gerente;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Grupo::class => GrupoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('grupo.criar', fn (Gerente $gerente) => $gerente->isNivelDois());
        Gate::define('grupo.atualizar', fn (Gerente $gerente) => $gerente->isNivelDois());
        Gate::define('grupo.deletar', fn (Gerente $gerente) => $gerente->isNivelDois());
    }
}
