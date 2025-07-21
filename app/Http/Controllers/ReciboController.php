<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Fatura;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ReciboController extends Controller
{
    public function index()
    {
        $faturas = Fatura::all();
        $clientes = Cliente::all();
        return view('recibos', compact('faturas', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:0',
            'data_emissao' => 'required|date',
            'fatura_id' => 'nullable|exists:faturas,id',
            'cliente_id' => 'nullable|exists:clientes,id',
        ]);

        Recibo::create($request->all());

        return redirect()->route('recibos.index')->with('success', 'Recibo de adiantamento criado com sucesso!');
    }
}
?>