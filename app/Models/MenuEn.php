<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuEn extends Model
{
    protected $table = 'menuen';
    protected $fillable = ['correo1', 'correo2', 'redes_sociales'];
}