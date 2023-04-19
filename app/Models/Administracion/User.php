<?php

namespace App\Models\Administracion;

use App\Models\Rrhh\CargoUsuario;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_estado',
        'id_tipo_usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dataTables(){
        return DB::table('users as u')
            ->leftJoin('catalogo_estado as ce', 'ce.id', '=', 'u.id_estado')
            ->select('u.*','ce.nombre as estado')
            ->orderBy('u.id', 'DESC');
    }

    public function relacion_cargo_usuario()
    {
        return $this->hasOne(CargoUsuario::class, 'id_usuario', 'id');
    }
}
