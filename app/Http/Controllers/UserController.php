<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function cadastro(User $user)
    {

      return view('app.cadastro', [
        'user' => $user,
      ]);
    }

    private function email_unico($id, $email)
    {
      $count = User::where('id', '<>', $id)
      ->where('email',$email)
      ->count();

      return $count;
    }

    public function alterar_cadastro(User $user, Request $request)
    {

      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255',],
      ]);

      if($this->email_unico($user->id, $request->email)){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'error',
          'mensagem' => 'E-mail já utilizado para cadastro!',
        ]);
      }

      $parametros = [
          'name' => $request['name'],
          'email' => $request['email'],
          'altura_cm' => str_replace('.', '', $request['altura_cm']),
          'peso_kg' => $request['peso_kg'],
          'sexo_id' => $request['sexo_id'],
          'password' => Hash::make($request['password']),
      ];

      if($user->update($parametros)){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'mensagem' => 'Cadastro alterado com sucesso!',
        ]);
      }

    }

    public function alterar_senha(User $user, Request $request)
    {

      $request->validate([
        'password' => ['required', 'string', 'min:6', 'confirmed'],
      ]);

      if($user->update(['password' => Hash::make($request->password)])){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'mensagem' => 'Senha alterada com sucesso!',
        ]);
      }

    }
}
