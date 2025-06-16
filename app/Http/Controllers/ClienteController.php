<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Exibe a lista de clientes
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(Cliente::all());
        }
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('clientes.create');
    }

    // Salva um novo cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nif' => 'required|string|max:20|unique:clientes,nif',
            'email' => 'nullable|email|max:100',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'tipo' => 'required|in:individual,empresa',
            'ativo' => 'boolean',
        ]);

        Cliente::create($validated);

        return $request->expectsJson()
            ? response()->json(['success' => true, 'message' => 'Cliente cadastrado com sucesso!'])
            : redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Exibe um cliente específico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        if (request()->expectsJson()) {
            return response()->json($cliente);
        }
        return view('clientes.show', compact('cliente'));
    }

    // Atualiza um cliente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nif' => 'required|string|max:20|unique:clientes,nif,' . $id,
            'email' => 'nullable|email|max:100',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'tipo' => 'required|in:individual,empresa',
            'ativo' => 'boolean',
        ]);

        Cliente::where('id', $id)->update($validated);

        return $request->expectsJson()
            ? response()->json(['success' => true, 'message' => 'Cliente atualizado com sucesso!'])
            : redirect()->back()->with('success', 'Cliente atualizado com sucesso!');
    }

    // Remove um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return request()->expectsJson()
            ? response()->json(['success' => true, 'message' => 'Cliente excluído com sucesso!'])
            : redirect()->back()->with('success', 'Cliente excluído com sucesso!');
    }
}
