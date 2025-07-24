<?php
// app/Http/Controllers/ApoliceController.php

namespace App\Http\Controllers;

use App\Models\Apolice;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ApoliceController extends Controller
{
    public function index()
    {
     
    $apolices = Apolice::with('cliente')->get();
    $clientes = Cliente::all();
    return view('apolices', compact('apolices', 'clientes'));

    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('apolices.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero' => 'required|unique:apolices',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'valor' => 'required|numeric',
            'tipo' => 'required'
        ]);

        Apolice::create($request->all());

        return redirect()->route('apolices.index')->with('success', 'Apólice criada com sucesso!');
    }

    public function edit(Apolice $apolice)
    {
        $clientes = Cliente::all();
        return view('apolices.edit', compact('apolice', 'clientes'));
    }

    public function update(Request $request, Apolice $apolice)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero' => 'required|unique:apolices,numero,' . $apolice->id,
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'valor' => 'required|numeric',
            'tipo' => 'required'
        ]);

        $apolice->update($request->all());

        return redirect()->route('apolices.index')->with('success', 'Apólice atualizada com sucesso!');
    }

    public function destroy(Apolice $apolice)
    {
        $apolice->delete();
        return redirect()->route('apolices.index')->with('success', 'Apólice excluída com sucesso!');
    }
    public function imprimir($id)
    {
        $apolice = Apolice::with('cliente')->findOrFail($id);
        $pdf = Pdf::loadView('pdfapolices', compact('apolice'));
        return $pdf->stream('apolice_'.$apolice->numero.'.pdf');
    }
    public function renovarManual($id)

    {
        
    $original = Apolice::findOrFail($id);

    // Adiciona 1 ano à vigência
    $nova = Apolice::create([
        'cliente_id' => $original->cliente_id,
        'renovada_de' => $original->id,
        'numero' => $original->numero . '-R' . now()->format('YmdHis'),
        'data_inicio' => \Carbon\Carbon::parse($original->data_fim)->addDay(),
        'data_fim' => \Carbon\Carbon::parse($original->data_fim)->addYear(),
        'valor' => $original->valor,
        'tipo' => $original->tipo,
    ]);

    return redirect()->route('apolices.index')->with('success', 'Apólice renovada com sucesso!');
}

}
