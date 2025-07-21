<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FaturaController extends Controller
{
    // Listar todas as faturas
    public function index()
    {
        $faturas = Fatura::all();
        $clientes = Cliente::all();
        return view('faturas', compact('faturas', 'clientes'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('faturas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor_total' => 'required|numeric',
            'data_emissao' => 'required|date',
            'data_vencimento' => 'required|date|after_or_equal:data_emissao',
            'status' => 'required|in:pendente,paga,cancelada',
            'descricao' => 'nullable|string',
            'anexo' => 'nullable|file|mimes:pdf,jpg,png,docx,doc',
        ]);

        // Verifica nome correto da coluna para valor no DB (se for 'valor_total', ajusta aqui)
        $fatura = new Fatura([
            'cliente_id' => $request->cliente_id,
            'valor_total' => $request->valor_total,
            'data_emissao' => $request->data_emissao,
            'data_vencimento' => $request->data_vencimento,
            'status' => $request->status,
            'descricao' => $request->descricao,
        ]);

        if ($request->hasFile('anexo')) {
            $anexoPath = $request->file('anexo')->store('faturas_anexos', 'public');
            $fatura->anexo = $anexoPath;
        }

        $fatura->save();

        return redirect()->back()->with('success', 'Ocorrência cadastrada com sucesso!');
    }

    // Mostrar uma fatura específica
    public function show($id)
    {
        $fatura = Fatura::findOrFail($id);
        return view('faturas.show', compact('fatura'));
    }

    // Mostrar formulário de edição
    public function edit() {}

    // Atualizar fatura
    public function update() {}

    // Deletar fatura
    public function destroy($id)
    {
        $fatura = Fatura::findOrFail($id);
        $fatura->delete();

        return redirect()->back()->with('success', 'Ocorrência deletada com sucesso!');
    }

    public function imprimir($id)
    {
        $fatura = Fatura::with('cliente')->findOrFail($id); // sem itens
        $pdf = Pdf::loadView('pdf', compact('fatura'));
        return $pdf->stream('fatura_' . $fatura->id . '.pdf');
    }
}
