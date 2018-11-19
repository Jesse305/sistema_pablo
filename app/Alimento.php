<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alimento extends Model
{

  public $timestamps = false;

  protected $fillable = [
    'alimento', 'calorias', 'data', 'hora', 'user_id'
  ];
}
