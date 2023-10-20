<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'time_used',
        'incidence_id',
        'user_id',
    ];

    /**
     * Define la relación entre Comment e Incidence.
     */
    public function incidence()
    {
        return $this->belongsTo(Incidence::class);
    }

    /**
     * Define la relación entre Comment y User (usuario que hizo el comentario).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
