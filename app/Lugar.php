<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'Lugar';

    protected $primaryKey = 'lug_codigo';

    public $incrementing = false;

    public $autoincrement = false;

    public $timestamps = false;
}
