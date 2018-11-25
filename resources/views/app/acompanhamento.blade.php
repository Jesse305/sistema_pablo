@extends('layouts.app')

@section('h1', 'ACOMPANHAMENTO')

@section('text')
<!-- texto page header aqui  -->
@endsection

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-body">
                        <h3>O que é IMC?</h3>
                        <hr>
                        <p>Esta é uma medida de referência internacional reconhecida pela OMS (Organização Mundial da Saúde), mas que não mede diretamente a gordura corporal, porque não contempla a massa magra, massa gorda, líquidos e a estrutura óssea da pessoa em questão.
                        O método de cálculo do IMC é simples e rápido e permite uma avaliação geral para definir se uma pessoa se encontra em risco de obesidade.</p>
                        <hr>
                        <b>Seu IMC: </b> <i id="imc"></i>, <i id="resultado"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="text-center">Por Favor Preencha</h3>
                        <hr>
                        <form method="post" action="{{ route('alimento.create_or_update') }}" id="form_acompanhamento">
                          @csrf
                            <input type="hidden" name="id" value="" id="id">
                            <div class="form-group">
                                <label for="alimento">Alimento</label>
                                <input type="text" placeholder="Add Item" class="form-control" id="alimento" name="alimento" required>
                            </div>
                            <div class="form-group">
                                <label for="calorias">Caloria</label>
                                <input type="number" placeholder="Add Calories" class="form-control" id="calorias" name="calorias" required>
                            </div>
                            <div id="div_add">
                              <button class="add-btn btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Meal</button>
                            </div>
                            <div id="div_edit">
                              <button class="update-btn btn btn-success btn-block"><i class="fa fa-pencil-square-o"></i> Alterar</button>
                              <button type="button" id="btn_cancel" class="update-btn btn btn-danger btn-block"><i class="fa fa-ban"></i> Cancelar</button>
                            </div>

                        </form>

                            <hr>
                            <!-- Calorie Count -->
                            <h3 class="text-center">Total Calories: <span class="total-calories">{{ $alimentos->pluck('calorias')->sum() }}</span></h3>
                            <!-- Item List -->
                            @if(count($alimentos) > 0)
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Hora</th>
                                  <th>Alimento</th>
                                  <th>Calorias</th>
                                  <th>Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($alimentos as $alimento)
                                  <tr>
                                    <td>{{ $alimento->hora }}</td>
                                    <td>{{ $alimento->alimento }}</td>
                                    <td>{{ $alimento->calorias }}</td>
                                    <td>
                                      <button class="btn btn-link text-warning edit" data-id="{{ $alimento->id }}"
                                      data-alimento="{{ $alimento->alimento }}" data-calorias="{{ $alimento->calorias }}">
                                        <i class="fa fa-pencil-square-o"></i>
                                      </button>
                                      <button class="btn btn-link text-danger remove" data-alimento="{{ $alimento->id }}"><i class="fa fa-remove"></i></button>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/acompanhamento.js') }}" charset="utf-8"></script>
<script type="text/javascript">
  calculaIMC({{ Auth::user()->peso_kg}}, {{Auth::user()->altura_cm }});
</script>
@endpush
