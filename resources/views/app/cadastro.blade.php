@extends('layouts.app')

@section('text')
<!-- texto page header aqui  -->
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-light">Meu Cadastro</div>

                <div class="card-body" id="cb_cadastro">
                    <form method="POST" action="{{ route('alterar_cadastro', $user) }}" id="form_cad" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="altura_cm" class="col-md-4 col-form-label text-md-right">Altura</label>

                            <div class="col-md-3">
                                <input id="altura_cm" type="text" class="altura form-control{{ $errors->has('altura_cm') ? ' is-invalid' : '' }}" name="altura_cm" value="{{ old('altura_cm', $user->altura_cm) }}" maxlength="3">

                                @if ($errors->has('altura_cm'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('altura_cm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="peso_kg" class="col-md-4 col-form-label text-md-right">Peso</label>

                            <div class="col-md-3">
                                <input id="peso_kg" type="text" class="form-control{{ $errors->has('peso_kg') ? ' is-invalid' : '' }}" name="peso_kg" value="{{ old('peso_kg', $user->peso_kg) }}" maxlength="3">

                                @if ($errors->has('peso_kg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('peso_kg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo_id" class="col-md-4 col-form-label text-md-right">Sexo</label>

                            <div class="col-md-3">
                              <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="sexo_id" value="1" checked>Masculino
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="sexo_id" value="2"{{ $user->sexo_id == 2 ? 'checked' : '' }}>Feminino
                                </label>
                              </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" form="form_cad" class="btn btn-success">
                                    Salvar
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-info">Voltar</a>
                                <button class="btn btn-link" type="button" id="btn_alterar_senha">Alterar Senha</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- fim card body cadastro -->

                <!-- alterar senha -->
                <div class="card-body" id="cb_senha">
                  <form class="" action="{{ route('alterar_senha', $user) }}" method="post" id="form_senha">
                    @csrf
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmação</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" form="form_senha" class="btn btn-success">
                                Alterar Senha
                            </button>
                            <button class="btn btn-info" type="button" id="btn_cancelar" >Cancelar</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/cadastro.js') }}" charset="utf-8"></script>
@endpush
