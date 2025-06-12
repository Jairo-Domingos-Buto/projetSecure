<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencia;

class OcorrenciasController extends Controller
{
    // Exibe a lista de ocorrências
    public function index(Request $request)
    {
        $ocorrencias = Ocorrencia::all();
        return view('ocorrencias', compact('ocorrencias'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('ocorrencias.create');
    }

    // Salva uma nova ocorrência
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_conta'      => 'required|string|max:50',
            'tipo_ocorrencia'   => 'required|string|max:100',
            'data_ocorrencia'   => 'required|date',
            'local_ocorrencia'  => 'required|string|max:255',
            'descricao'         => 'required|string',
            'status'            => 'required|string|max:50',
        ]);

        Ocorrencia::create($validated);

    return redirect()->back()->with('success', 'Ocorrência cadastrada com sucesso!');
    }


    // Exibe uma ocorrência específica
    public function show($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        return view('ocorrencias.show', compact('ocorrencia'));
    }

    // Atualiza uma ocorrência
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'numero_conta'      => 'required|string|max:50',
            'tipo_ocorrencia'   => 'required|string|max:100',
            'data_ocorrencia'   => 'required|date',
            'local_ocorrencia'  => 'required|string|max:255',
            'descricao'         => 'required|string',
            'status'            => 'required|string|max:50',
        ]);
            Ocorrencia::where('id', $id)->update($validated);
            return redirect()->back()->with('success', 'Ocorrência atualizada com sucesso!');


    }
    // Remove uma ocorrência
    public function destroy($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        $ocorrencia->delete();
        
     return redirect()->back()->with('success', 'Ocorrência cadastrada com sucesso!');


    }
}
