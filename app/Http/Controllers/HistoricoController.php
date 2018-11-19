<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Alimento;

class HistoricoController extends Controller
{
    public function historico(Request $request)
    {

      $datas = Alimento::select('data')
      ->where('user_id', Auth::user()->id)
      ->distinct()
      ->get();

      $alimentos = Alimento::select(
        DB::raw("DATE_FORMAT(data, '%d/%m/%Y') AS data"),
        DB::raw("TIME_FORMAT(hora, '%H:%i') AS hora"),
        'alimento',
        'calorias'
        )
      ->where('user_id', Auth::user()->id);

      if($request->alimento){
        $alimentos->where('alimento', 'like', '%' . $request->alimento . '%');
      }

      if($request->data){
        $alimentos->where('data', $request->data);
      }

      session([
        'alimento' => $request->alimento,
        'data' => $request->data,
      ]);

      return view('app.historico', [
        'alimentos' => $alimentos->paginate(15),
        'datas' => $datas,
      ]);
    }

    public function delete()
    {

      Alimento::where('user_id', Auth::user()->id)
      ->delete();

      return redirect()
      ->back()
      ->with('alerta', [
        'tipo' => 'success',
        'mensagem' => 'Histórico apagado com sucesso!',
      ]);
    }
}
