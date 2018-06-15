<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'Tienda';

    protected $primaryKey = 'tie_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = [
        'tie_nombre', 'tie_descripcion', 'tie_rif', 'tie_descripcion', 'tie_tipo', 'fk_lugar'
    ];
}
