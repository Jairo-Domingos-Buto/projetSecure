document.addEventListener("DOMContentLoaded", function () {
    // Função para carregar clientes via AJAX
    function carregarClientes() {
        fetch("{{ route('clientes.index') }}", {
            headers: { Accept: "application/json" },
        })
            .then((response) => response.json())
            .then((data) => {
                let tbody = document.querySelector(".clientes-table tbody");
                tbody.innerHTML = "";
                data.forEach((cliente) => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${cliente.id}</td>
                            <td>${cliente.nome}</td>
                            <td>${cliente.nif}</td>
                            <td>${
                                cliente.tipo.charAt(0).toUpperCase() +
                                cliente.tipo.slice(1)
                            }</td>
                            <td>
                                <span class="badge bg-${
                                    cliente.ativo ? "success" : "secondary"
                                }">
                                    ${cliente.ativo ? "Ativo" : "Inativo"}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info btn-editar" data-id="${
                                    cliente.id
                                }">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-excluir" data-id="${
                                    cliente.id
                                }">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    carregarClientes();

    // Submissão do formulário de novo cliente (ou edição)
    document
        .getElementById("cliente-form")
        .addEventListener("submit", function (e) {
            e.preventDefault();
            let form = e.target;
            let formData = new FormData(form);
            let id = form.getAttribute("data-id");
            let url = id ? `/clientes/${id}` : "{{ route('clientes.store') }}";
            let method = id ? "PUT" : "POST";

            fetch(url, {
                method: method,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    Accept: "application/json",
                },
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        carregarClientes();
                        var modal = bootstrap.Modal.getInstance(
                            document.getElementById("novoClienteModal")
                        );
                        modal.hide();
                        form.reset();
                        form.removeAttribute("data-id");
                        form.querySelector(".modal-title").textContent =
                            "Novo Cliente";
                    } else {
                        alert("Erro ao salvar cliente!");
                    }
                })
                .catch(() => alert("Erro ao salvar cliente!"));
        });

    // Editar cliente
    document
        .querySelector(".clientes-table")
        .addEventListener("click", function (e) {
            if (e.target.closest(".btn-editar")) {
                let id = e.target
                    .closest(".btn-editar")
                    .getAttribute("data-id");
                fetch(`/clientes/${id}`, {
                    headers: { Accept: "application/json" },
                })
                    .then((response) => response.json())
                    .then((cliente) => {
                        let form = document.getElementById("cliente-form");
                        form.setAttribute("data-id", cliente.id);
                        form.querySelector('[name="nome"]').value =
                            cliente.nome || "";
                        form.querySelector('[name="nif"]').value =
                            cliente.nif || "";
                        form.querySelector('[name="email"]').value =
                            cliente.email || "";
                        form.querySelector('[name="telefone"]').value =
                            cliente.telefone || "";
                        form.querySelector('[name="endereco"]').value =
                            cliente.endereco || "";
                        form.querySelector('[name="data_nascimento"]').value =
                            cliente.data_nascimento || "";
                        form.querySelector('[name="tipo"]').value =
                            cliente.tipo || "individual";
                        form.querySelector('[name="ativo"]').value =
                            cliente.ativo ? "1" : "0";
                        form.querySelector(".modal-title").textContent =
                            "Editar Cliente";
                        var modal = new bootstrap.Modal(
                            document.getElementById("novoClienteModal")
                        );
                        modal.show();
                    })
                    .catch(() => alert("Erro ao carregar dados do cliente!"));
            }
        });

    // Excluir cliente
    document
        .querySelector(".clientes-table")
        .addEventListener("click", function (e) {
            if (e.target.closest(".btn-excluir")) {
                if (confirm("Tem certeza que deseja excluir este cliente?")) {
                    let id = e.target
                        .closest(".btn-excluir")
                        .getAttribute("data-id");
                    fetch(`/clientes/${id}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            Accept: "application/json",
                        },
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                carregarClientes();
                            } else {
                                alert("Erro ao excluir cliente!");
                            }
                        })
                        .catch(() => alert("Erro ao excluir cliente!"));
                }
            }
        });

    // Ao fechar o modal, limpa o formulário
    document
        .getElementById("novoClienteModal")
        .addEventListener("hidden.bs.modal", function () {
            let form = document.getElementById("cliente-form");
            form.reset();
            form.removeAttribute("data-id");
            form.querySelector(".modal-title").textContent = "Novo Cliente";
        });
});
