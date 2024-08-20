<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enreview extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'img', 'calificacion', 'comentario'];

}
