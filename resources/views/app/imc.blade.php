@extends('layouts.app')

@section('h1', 'IMC')

@section('text')
<!-- texto page header aqui  -->
@endsection

@section('content')
<section id="contact" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h3>O que é IMC?</h3>
                        <hr>
                        <p>Esta é uma medida de referência internacional reconhecida pela OMS (Organização Mundial da Saúde), mas que não mede diretamente a gordura corporal, porque não contempla a massa magra, massa gorda, líquidos e a estrutura óssea da pessoa em questão.
                        O método de cálculo do IMC é simples e rápido e permite uma avaliação geral para definir se uma pessoa se encontra em risco de obesidade.</p>
                    </div>
                </div>
            </div>
            <!-- IMC -->
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="text-center">Por Favor Preencha o Seu IMC</h3>
                        <hr>
                        <form name="bmiForm">
                            <div class="form-group">
                                Altura<input type="text" class="form-control altura" placeholder="Exemplo: 191" name="height" value="{{ $user->altura_cm }}">
                            </div>

                            <div class="form-group">
                                Peso<input type="text" class="form-control" placeholder="Exemplo: 79" name="weight" value="{{ $user->peso_kg }}">
                            </div>

                            <div class="form-group">
                                <input type="button" class="btn btn-primary btn-block" onClick="calculateBmi()" value="Calcular IMC">
                            </div>
                            <hr>
                            <div class="form-group">
                                Seu IMC: <input type="text" class="form-control" name="bmi">
                            </div>

                            <div class="form-group">
                                Isso Significa: <input type="text" class="form-control" name="meaning">
                            </div>

                            <div class="form-group">
                                <input type="reset" class="btn btn-danger red darken-3 btn-block" value="Reset" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
