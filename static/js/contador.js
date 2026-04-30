document.addEventListener("DOMContentLoaded", () => {

    // pega todos os contadores da página (cada produto)
    document.querySelectorAll(".contador").forEach(contador => {

        // valor atual do contador
        let valor = 1;

        // trava pra evitar clique duplo (mobile / spam)
        let bloqueado = false;

        // pegando elementos dentro desse contador específico
        const btnMinus = contador.querySelector(".btn-minus");
        const btnPlus = contador.querySelector(".btn-plus");
        const quantidade = contador.querySelector(".quantidade");

        // atualiza o que aparece na tela
        function render() {
            quantidade.textContent = valor;

            // se for 0, mostra lixeira, senão mostra "-"
            btnMinus.textContent = valor === 0 ? "🗑️" : "-";
        }

        // função intermediária pra evitar execução dupla
        function executar(acao) {

            // se estiver bloqueado, ignora clique
            if (bloqueado) return;

            bloqueado = true;

            // executa a ação recebida (incrementar ou decrementar)
            acao();

            // atualiza a interface
            render();

            // libera depois de 200ms
            setTimeout(() => {
                bloqueado = false;
            }, 200);
        }

        // botão +
        btnPlus.addEventListener("click", () => {
            executar(() => {
                valor++;
            });
        });

        // botão -
        btnMinus.addEventListener("click", () => {
            executar(() => {

                if (valor > 0) {
                    valor--;
                } else {
                    // aqui depois você remove do carrinho
                    console.log("remover item futuramente");
                }

            });
        });

        // inicializa o contador na tela
        render();
    });

});