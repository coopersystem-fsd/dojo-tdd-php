<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'quantidade',
        'valor',
    ];

    public static function soma($a, $b)
    {
        return $a + $b;
    }
}
