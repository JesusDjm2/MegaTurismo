<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;
    
    protected $fillable = ['fecha', 'precio', 'tour_id'];

    public static $rules = [
        'fecha' => 'required|date',
        'precio' => 'required|numeric|min:0',
    ];
    public function tour()
    {
        return $this->belongsTo(Tours::class);
    }
}
