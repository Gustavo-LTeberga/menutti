document.addEventListener("DOMContentLoaded", () => {

    // percorre todos os contadores da página
    document.querySelectorAll(".contador").forEach(contador => {

        // elementos internos de cada contador
        const btnMinus = contador.querySelector(".btn-minus");
        const btnPlus = contador.querySelector(".btn-plus");
        const quantidade = contador.querySelector(".quantidade");

        // pega o valor inicial do HTML (ex: <span>2</span>)
        let valor = parseInt(quantidade.textContent) || 0;

        // pega o limite máximo definido no HTML (data-max="3")
        const max = parseInt(contador.dataset.max) || Infinity;

        // trava para evitar múltiplos cliques rápidos
        let bloqueado = false;

        // atualiza o número na tela e estado dos botões
        function render() {

            // mostra o valor atual
            quantidade.textContent = valor;

            // desativa botão "+" se chegou no limite
            btnPlus.disabled = valor >= max;

            // desativa botão "-" se estiver em 0
            btnMinus.disabled = valor <= 0;
        }

        // função que controla execução (anti-spam de clique)
        function executar(acao) {

            // impede execução se estiver bloqueado
            if (bloqueado) return;

            bloqueado = true;

            // executa a ação (incrementar ou decrementar)
            acao();

            // atualiza interface
            render();

            // libera novamente depois de 200ms
            setTimeout(() => {
                bloqueado = false;
            }, 200);
        }

        // clique no "+"
        btnPlus.addEventListener("click", () => {
            executar(() => {

                // só aumenta se não tiver no limite
                if (valor < max) {
                    valor++;
                }

            });
        });

        // clique no "-"
        btnMinus.addEventListener("click", () => {
            executar(() => {

                // só diminui se for maior que 0
                if (valor > 0) {
                    valor--;
                }

            });
        });

        // inicializa o estado correto ao carregar
        render();
    });

});