<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Laravel\Prompts\Clear;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'nif' => [
                'required',
                'unique:clientes,nif',
                'regex:/^[0-9]{9}[A-Z]{2}[0-9]{3}$/'
            ],
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required',
            'endereco' => 'required',
            'tipo' => 'required|in:individual,empresa',
            /* 'data_nascimento' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'ativo' => 'boolean', */
        ], [
            'nif.regex' => 'O NIF deve conter 9 números, seguidos de 2 letras maiúsculas e 3 números',
            /* 'data_nascimento.date' => 'A data de nascimento deve ser uma data válida',
            'data_nascimento.min' => 'O cliente deve ter pelo menos 18 anos', */
            'tipo.in' => 'O tipo deve ser "individual" ou "empresa"',
            'email.unique' => 'O email já está em uso.',
            'nif.unique' => 'O NIF já está em uso.',
            'nome.required' => 'O nome é obrigatório.',
            'nif.required' => 'O NIF é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'telefone.required' => 'O telefone é obrigatório.',
            'endereco.required' => 'O endereço é obrigatório.',
            'tipo.required' => 'O tipo de cliente é obrigatório.',
            /* 'data_nascimento.required' => 'A data de nascimento é obrigatória.', */
            'ativo.boolean' => 'O campo ativo deve ser verdadeiro ou falso.',
        ]);

        try {
            $cliente = Cliente::create([
                'nome' => $request->nome,
                'nif' => $request->nif,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'endereco' => $request->endereco,
                /* 'data_nascimento' => $request->data_nascimento, */
                'tipo' => $request->tipo,
                'ativo' => $request->ativo, // Por padrão, o cliente é ativo
            ]);

            return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao criar cliente: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'nif' => [
                'required',
                'unique:clientes,nif,' . $cliente->id,
                'regex:/^[0-9]{9}[A-Z]{2}[0-9]{3}$/'
            ],
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required',
            'endereco' => 'required',
            'tipo' => 'required|in:individual,empresa',
        ], [
            'nif.regex' => 'O NIF deve conter 9 números, seguidos de 2 letras maiúsculas e 3 números',
            'tipo.in' => 'O tipo deve ser "individual" ou "empresa"',
            'email.unique' => 'O email já está em uso.',
            'nif.unique' => 'O NIF já está em uso.',
            'nome.required' => 'O nome é obrigatório.',
            'nif.required' => 'O NIF é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'telefone.required' => 'O telefone é obrigatório.',
            'endereco.required' => 'O endereço é obrigatório.',
            'tipo.required' => 'O tipo de cliente é obrigatório.',
        ]);

        try {
            $cliente->update([
                'nome' => $request->nome,
                'nif' => $request->nif,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'endereco' => $request->endereco,
                'tipo' => $request->tipo,
                'ativo' => $request->ativo,
            ]);

            return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao atualizar cliente: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao excluir cliente: ' . $e->getMessage()]);
        }
    }
};
