<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function rules()
    {
        return [
            'name' => 'required|unique:category,name',
        ];
    }
    public function incidences()
    {
        return $this->hasMany(Incidence::class);
    }
}
