<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PDOException;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // funcion para sacar su rol
    /**
     * @param none
     * @return string retorna una cadena con el rol que tiene el usuario
     */
    public function getRol()
    {

        $rol = DB::table('roles')
            ->where('id', function ($query) {
                $query->select('role_id')
                    ->from('model_has_roles')
                    ->where('model_id', $this->id);
            })
            ->pluck('name')
            ->first();

        return $rol;
    }

    /**
     * @param int $nuevoRol , ID del rol que quieres poner al usuario
     * @return mixed 1 si es correcto redirect si es fallo
     */
    public function setRol($nuevoRol)
    {
        try {
            return DB::table('model_has_roles')
                ->where('model_id', $this->id)
                ->update(['role_id' => $nuevoRol]);
        } catch (PDOException $e) {
            return redirect()->route('usuarios.index')->with('error', 'Error al actualizar el actualizar el rol');
        }
    }

    public function objetivo()
    {
        return $this->hasOne(Objetivo::class);
    }

    public function progreso()
    {
        return $this->hasOne(Progreso::class);
    }


    public function rutinas()
    {
        return $this->hasMany(Rutina::class);
    }

    public function dietas()
    {
        return $this->hasMany(Dieta::class);
    }

    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}