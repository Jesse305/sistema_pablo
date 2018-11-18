<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ImcController extends Controller
{
    public function imc()
    {

      return view('app.imc', [
        'user' => Auth::user(),
      ]);
    }
}
