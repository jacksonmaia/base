<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacao extends Model
{
    protected $fillable = ['nome', 'email', 'telefone'];
}
