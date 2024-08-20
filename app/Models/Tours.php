<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tours extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'resumen',
        'detallado',
        'incluidos',
        'importante',
        'lugarInicio',
        'lugarFin',
        'precioReal',
        'precioPublicado',
        'dias',
        'imgThumb',
        'img',
        'mapa',
        'categoria',
        'keywords',
        'slug',
        'galeria',
    ];

 
    public function categorias()
    {
        return $this->belongsToMany(Categorias::class, 'tour_categoria', 'tour_id', 'categoria_id');
    }
    public function fechas()
    {
        return $this->hasMany(Fecha::class, 'tour_id');
    }
    public function hoteles()
    {
        return $this->hasMany(Hotel::class, 'tour_id');
    }
}