<?php

namespace App\Http\Livewire\ClienteManager;

use Livewire\Component;
use App\Models\Cliente;

class ClienteManager extends Component
{
    public $clientes;
    public $clienteId, $nome, $email, $nif, $tipo, $telefone, $endereco, $ativo;
    public $showEditModal = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:100',
        'nif' => 'required|string|max:14|unique:clientes,nif',
        'tipo' => 'required|in:individual,empresa',
        'telefone' => 'nullable|string|max:9',
        'endereco' => 'required|string',
        'ativo' => 'required|boolean',
    ];

    public function mount()
    {
        $this->clientes = Cliente::all();
    }

    public function editarCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->email = $cliente->email;
        $this->nif = $cliente->nif;
        $this->tipo = $cliente->tipo;
        $this->telefone = $cliente->telefone;
        $this->endereco = $cliente->endereco;
        $this->ativo = $cliente->ativo;
        $this->showEditModal = true;
    }

    public function atualizar()
    {
        $this->validate(array_merge($this->rules, [
            'nif' => 'required|string|max:14|unique:clientes,nif,' . $this->clienteId,
        ]));

        Cliente::findOrFail($this->clienteId)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'nif' => $this->nif,
            'tipo' => $this->tipo,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'ativo' => $this->ativo,
        ]);

        $this->showEditModal = false;
        $this->clientes = Cliente::all();
        session()->flash('success', 'Cliente atualizado com sucesso!');
    }

    public function confirmarExclusao($id)
    {
        $this->dispatch('confirmar-exclusao', id: $id);
    }

    public function excluirCliente($id)
    {
        Cliente::findOrFail($id)->delete();
        $this->clientes = Cliente::all();
        session()->flash('success', 'Cliente excluído com sucesso!');
    }

    public function render()
    {
        return view('livewire.cliente-manager');
    }
}
