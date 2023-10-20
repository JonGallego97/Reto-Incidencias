<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define la relación entre User y Department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Define la relación entre User y Incidencia.
     */
    public function incidence()
    {
        return $this->hasMany(Incidence::class);
    }

    /**
     * Define la relación entre User y Comentario.
     */
    public function comentarios()
    {
        return $this->hasMany(Comment::class);
    }
}
