@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Adiantamento de recibos')
@section('content')
    <form action="{{ route('recibos.store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-sm-6">
            <label for="valor" style="margin-bottom: 10px;">Valor</label>
            <input type="number" name="valor" step="0.01" class="form-control" required>
        </div>

        <div class="col-sm-6">
            <label for="data_emissao" style="margin-bottom: 10px;">Data de Emissão</label>
            <input type="date" name="data_emissao" class="form-control" required>
        </div>

        <div class="col-sm-6">
            <label for="descricao" style="margin-top: 15px; margin-bottom: 10px;">Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>

        <div class="col-sm-6">
            <label for="fatura_id" style="margin-top: 15px; margin-bottom: 10px;">Vincular a Fatura (Opcional)</label>
            <select name="fatura_id" class="form-control">
                <option value="">Escolha uma Fatura</option>
                @foreach ($faturas as $fatura)
                    <option value="{{ $fatura->id }}">{{ $fatura->numero }} - {{ $fatura->cliente }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-6">
            <label for="cliente_id" style="margin-top: 15px; margin-bottom: 10px;">Vincular ao Cliente (Opcional)</label>
            <select name="cliente_id" class="form-control">
                <option value="">Escolha um Cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
        <button type="submit" class="btn btn-primary mt-3">Salvar Recibo</button>
    </form>
</div>
	</div>
</section>
@endsection