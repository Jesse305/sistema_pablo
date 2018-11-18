<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Alimento;

class AlimentoController extends Controller
{
  public function acompanhamento()
  {

    $hoje = date('Y-m-d');
    $alimentos = Alimento::select('id',
    DB::raw("TIME_FORMAT(hora, '%H:%i') AS hora"),
    'alimento',
    'calorias')
    ->where('user_id', Auth::user()->id)
    ->where('data', $hoje)
    ->get();

    return view('app.acompanhamento', [
      'alimentos' => $alimentos,
    ]);
  }

  public function createOrUpdate(Request $request)
  {

    if($request->id == null){

      $alimento = new Alimento([
        'alimento' => $request->alimento,
        'calorias' => $request->calorias,
        'data' => date('Y-m-d'),
        'hora' => date('H:i:s'),
        'user_id' => Auth::user()->id,
      ]);

      $alimento->save();
      return redirect()
      ->back()
      ->with('alerta', [
        'tipo' => 'success',
        'mensagem' => 'Alimento registrado com sucesso',
      ]);
    }
    else{

      $alimento = Alimento::findOrFail($request->id);

      $alimento->update([
        'alimento' => $request->alimento,
        'calorias' => $request->calorias,
      ]);

      return redirect()
      ->back()
      ->with('alerta', [
        'tipo' => 'success',
        'mensagem' => 'Alimento alterado com sucesso',
      ]);
    }
  }

  public function remove($id)
  {

    $alimento = Alimento::findOrFail($id);

    if($alimento->delete()){

      return redirect()
      ->back()
      ->with('alerta', [
        'tipo' => 'success',
        'mensagem' => 'Alimento removido com sucesso!',
      ]);
    }
  }
}
