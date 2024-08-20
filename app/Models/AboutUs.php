<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'aboutus';
    protected $fillable = [
        'correo1',
        'correo2',
        'telefono1',
        'telefono2',
        'address',
        'address2'
    ];
}
