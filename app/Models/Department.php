<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Define la relación entre Department y User.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Define la relación entre Department y Incidence.
     */
    public function incidencias()
    {
        return $this->hasMany(Incidence::class);
    }
}
