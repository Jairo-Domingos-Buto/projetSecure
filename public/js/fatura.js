document.addEventListener('DOMContentLoaded', function () {
    const reciboSelect = document.getElementById('recibo_adiantamento_id');
    const valorInput = document.getElementById('valor_total');

    reciboSelect.addEventListener('change', async function () {
        const reciboId = this.value;

        if (reciboId) {
            try {
                const response = await fetch(`/recibos/${reciboId}/valor`);
                if (!response.ok) throw new Error('Erro na resposta do servidor');
                
                const data = await response.json();
                valorInput.value = data.valor;
                valorInput.readOnly = true;

            } catch (error) {
                console.error('Erro ao buscar valor do recibo:', error);
                valorInput.value = '';
                valorInput.readOnly = false;
            }
        } else {
            valorInput.value = '';
            valorInput.readOnly = false;
        }
    });
});