<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Producto';

    protected $primary_key = 'pro_codigo';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'pro_nombre', 'pro_descripcion', 'pro_sabor', 'pro_color', 'pro_relleno'
    ];
}