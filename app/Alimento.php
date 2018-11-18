<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{

  public $timestamps = false;

  protected $fillable = [
    'alimento', 'calorias', 'data', 'hora', 'user_id'
  ];
}
