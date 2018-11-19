@extends('layouts.app')

@section('h1', 'HISTÓRICO')

@section('text')
<!-- texto page header aqui  -->
@endsection

@section('content')

<div class="text-right" style="margin-bottom: 20px;">
  <button type="button" class="btn btn-danger btn-sm" id="btn_limpar_historico">Limpar Histórico</button>
</div>

<div class="card" style="margin-bottom: 20px;">
  <div class="card-body">
    <form class="" action="" method="get">
      <div class="form-group row">
        <label class="col-md-2" for="">Alimento:</label>
        <div class="col-md-4">
          <input class="form-control" type="text" name="alimento" value="{{ session('alimento') != null ? session('alimento') : '' }}">
        </div>
        <div class="col-md-4">
          <select class="form-control" name="data">
            <option value="">-selecione a data-</option>
            @foreach($datas as $data)
              <option value="{{ $data->data }}" {{ session('data') == $data->data ? 'selected' : '' }} > {{ date('d/m/Y', strtotime($data->data)) }} </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <button class="btn btn-sm btn-primary" type="submit">Buscar</button>
          <a href="{{ route('historico') }}" class="btn btn-sm btn-info">Limpar</a>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th width="15%">Data</th>
          <th>Hora</th>
          <th>Alimento</th>
          <th class="text-right">Calorias</th>
        </tr>
      </thead>
      <tbody>
        @foreach($alimentos as $alimento)
        <tr>
          <td>{{ $alimento->data }}</td>
          <td>{{ $alimento->hora }}</td>
          <td>{{ $alimento->alimento }}</td>
          <td class="text-right">{{ $alimento->calorias }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th class="text-right" colspan="3">TOTAL DE CALORIAS:</th>
          <th class="text-right">{{ $alimentos->pluck('calorias')->sum() }}</th>
        </tr>
      </tfoot>
    </table>
    {{ $alimentos->links() }}
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/historico.js') }}" charset="utf-8"></script>
@endpush
