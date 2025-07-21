<?php

namespace App\Http\Controllers;

use App\Models\Reembolso;
use App\Models\Cliente;
use App\Models\Fatura;
use Illuminate\Http\Request;

class ReembolsoController extends Controller
{
    public function index()
    {
        $reembolsos = Reembolso::with('cliente', 'fatura')->get();
        return view('reembolsos', compact('reembolsos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $faturas = Fatura::all();
        return view('reembolsos', compact('clientes', 'faturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fatura_id' => 'nullable|exists:faturas,id',
            'valor' => 'required|numeric|min:0',
            'data_reembolso' => 'required|date',
        ]);

        Reembolso::create($request->all());

        return redirect()->route('reembolsos.index')->with('success', 'Reembolso registrado com sucesso.');
    }
}
?>
