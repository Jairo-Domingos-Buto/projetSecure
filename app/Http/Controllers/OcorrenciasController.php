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

    if ($request->ajax()) {
        return response()->json($ocorrencias);
    }

    return view('home', compact('ocorrencias'));
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
            'anexos'            => 'nullable|file|max:10240', // 10MB máx
        ]);

        // Lida com upload de anexo, se houver
        if ($request->hasFile('anexos')) {
            $validated['anexos'] = $request->file('anexos')->store('anexos', 'public');
        }

        Ocorrencia::create($validated);

return response()->json(['success' => true, 'message' => 'Ocorrência cadastrada com sucesso!']);
    }

    // Exibe uma ocorrência específica
    public function show($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        return view('ocorrencias.show', compact('ocorrencia'));
    }

    // Mostra o formulário de edição
    public function edit($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        return view('ocorrencias.edit', compact('ocorrencia'));
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
            'anexos'            => 'nullable|file|max:10240',
        ]);

        $ocorrencia = Ocorrencia::findOrFail($id);

        // Lida com upload de anexo, se houver
        if ($request->hasFile('anexos')) {
            $validated['anexos'] = $request->file('anexos')->store('anexos', 'public');
        }

        $ocorrencia->update($validated);

return response()->json(['success' => true, 'message' => 'Ocorrência cadastrada com sucesso!']);
    }

    // Remove uma ocorrência
    public function destroy($id)
    {
        $ocorrencia = Ocorrencia::findOrFail($id);
        $ocorrencia->delete();

return response()->json(['success' => true, 'message' => 'Ocorrência cadastrada com sucesso!']);
    }
}
