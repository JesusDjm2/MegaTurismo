<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entag extends Model
{
    protected $table = 'entags';
    protected $fillable = [
        'nombre',
        'slug'
    ];
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'enblog_tags', 'categoria_id', 'blog_id');
    }
}
