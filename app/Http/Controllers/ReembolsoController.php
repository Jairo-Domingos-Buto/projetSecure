<?php

namespace App\Http\Controllers;

use App\Models\Reembolso;
use App\Models\Cliente;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ReembolsoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $faturas = Fatura::all();
        $reembolsos  = Reembolso::all();
        return view('reembolsos', compact('clientes', 'faturas', 'reembolsos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fatura_id' => 'required|exists:faturas,id',
            'valor' => 'required|numeric|min:0',
            'data_reembolso' => 'required|date',
            'data_aprovacao' => 'required|date',
            'status' => 'required|in:Pendente,Aprovado,Negado',
            'observacao' => 'required|string',
        ]);

        // Ajusta o status para minúsculo se necessário
        $data = $request->all();
        $data['status'] = ucfirst(strtolower($data['status']));

        Reembolso::create($data);

        return redirect()->route('reembolsos.index')->with('success', 'Reembolso registrado com sucesso.');
    }
    public function destroy($id)
    {
        $reembolsos = Reembolso::findOrFail($id);
        $reembolsos->delete();

        return redirect()->back()->with('success', 'Eliminar deletada com sucesso!');
    }

    public function imprimir($id)
    {
        $reembolso = Reembolso::with('cliente')->findOrFail($id);
        $pdf = Pdf::loadView('pdfreembolso', compact('reembolso'));
        return $pdf->stream('reembolso_' . $reembolso->id . '.pdf');
    }
}
// pdfreembolso
