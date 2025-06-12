/*  document.addEventListener('DOMContentLoaded', function() {
    const tipoSelect = document.getElementById('tipo');
    const dataNascimentoDiv = document.getElementById('data_nascimento').closest('.col-md-4');

    // Função para controlar a visibilidade do campo data_nascimento
    function toggleDataNascimento() {
        if (tipoSelect.value === 'empresa') {
            dataNascimentoDiv.style.display = 'none';
            document.getElementById('data_nascimento').removeAttribute('required');
        } else {
            dataNascimentoDiv.style.display = 'block';
            document.getElementById('data_nascimento').setAttribute('required', 'required');
        }
    }

    // Executa quando há mudança no select
    tipoSelect.addEventListener('change', toggleDataNascimento);

    // Executa ao carregar a página (para manter estado em caso de erro de validação)
    toggleDataNascimento();
});


 */
