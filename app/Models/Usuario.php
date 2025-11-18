<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';  // tabela correta
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'email',
        'senha_hash',
        'status',
        'data_cadastro',
    ];

    protected $hidden = [
        'senha_hash',
    ];

    // Laravel precisa saber qual campo é a senha
    public function getAuthPassword()
    {
        return $this->senha_hash;
    }
}
