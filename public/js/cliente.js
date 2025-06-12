document.addEventListener("DOMContentLoaded", function () {
    // Editar Cliente
    const editarButtons = document.querySelectorAll(
        '[wire\\:click="editarCliente"]'
    );

    editarButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const clienteId = this.getAttribute("wire:click").match(/\d+/)[0];
            fetch(`/clientes/${clienteId}/edit`)
                .then((response) => response.json())
                .then((cliente) => {
                    document.getElementById("edit_nome").value = cliente.nome;
                    document.getElementById("edit_email").value = cliente.email;
                    document.getElementById("edit_nif").value = cliente.nif;
                    document.getElementById("edit_telefone").value =
                        cliente.telefone;
                    document.getElementById("edit_endereco").value =
                        cliente.endereco;
                    document.getElementById("edit_tipo").value = cliente.tipo;
                    document.getElementById("edit_ativo").value = cliente.ativo
                        ? "1"
                        : "0";

                    document.getElementById(
                        "editarClienteForm"
                    ).action = `/clientes/${clienteId}`;

                    const modal = new bootstrap.Modal(
                        document.getElementById("editarClienteModal")
                    );
                    modal.show();
                });
        });
    });

    // Confirmar Exclusão
    const excluirButtons = document.querySelectorAll(
        '[wire\\:click="confirmarExclusao"]'
    );

    excluirButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const clienteId = this.getAttribute("wire:click").match(/\d+/)[0];
            document.getElementById(
                "excluirClienteForm"
            ).action = `/clientes/${clienteId}`;

            const modal = new bootstrap.Modal(
                document.getElementById("confirmarExclusaoModal")
            );
            modal.show();
        });
    });
});
