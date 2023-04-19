<?php

namespace App\Models\Administracion;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class Cliente extends Authenticatable
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

    /* public function dataTables(){
         return DB::table('clientes as c')
             ->leftJoin('catalogo_estado as ce', 'ce.id', '=', 'c.id_estado')
             ->select('c.*','ce.nombre as estado')
             ->orderBy('c.id', 'DESC');
     }*/
    protected $guarded = [];

    protected  $table = 'empleador';

    public function dataTables(){
        return DB::table('empleador as e')
            ->leftJoin('catalogo_estado as ce', 'ce.id', '=', 'e.id_estado')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'e.id_departamento')
            ->select('e.id as id',
                'e.razon_social as razon',
                'e.representante_legal as representante',
                'cd.nombre as departamento',
                'ce.nombre as estado'
            )
            ->orderBy('e.id', 'DESC');
    }

    public function relacion_cargo_usuario()
    {
        return $this->hasOne(CargoUsuario::class, 'id_usuario', 'id');
    }
}
