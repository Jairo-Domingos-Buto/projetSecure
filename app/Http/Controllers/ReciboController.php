<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Fatura;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ReciboController extends Controller
{
    public function index()
    {
        $faturas = Fatura::all();
        $clientes = Cliente::all();
        $recibos = Recibo::all();
        return view('recibos', compact('faturas', 'clientes', 'recibos'));
    }

    public function store(Request $request)
    {
        Recibo::create([
            'cliente_id'     => $request->cliente_id,
            'valor'          => $request->valor,
            'data_pagamento' => $request->data_pagamento ?? now(),
            'descricao'      => $request->descricao,
            'status'         => 'pendente',
        ]);

        return redirect()->route('recibos.index')->with('success', 'Recibo de adiantamento criado com sucesso.');
    }

    public function imprimir($id)
    {
        $recibo = Recibo::with('cliente')->findOrFail($id); // sem itens
        $pdf = Pdf::loadView('pdfrecibos', compact('recibo'));
        return $pdf->stream('recibo' . $recibo->id . '.pdf');
    }

    public function getValor($id)
    {
        $recibo = Recibo::findOrFail($id);

        return response()->json([
            'valor' => $recibo->valor,
        ]);
    }
}
