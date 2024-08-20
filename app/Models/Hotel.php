<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hoteles';

    protected $fillable = ['nombre', 'ubicacion', 'descripcion', 'img'];
    public static $rules = [
        'nombre' => 'required',
        'ubicacion' => 'required',
        'descripcion' => 'required',
        'img' => 'required|image',
    ];

    public function tour()
    {
        return $this->belongsTo(Tours::class);
    }
}