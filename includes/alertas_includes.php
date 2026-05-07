<!-- O incrude tá aqui -->
<?php
// Exibir o sweetalert apenas quando houver dados na SESSION['alerta']:
if(isset($_SESSION['alerta'])){
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Verificar se é erro ou sucesso:
        <?php if($_SESSION['alerta']['tipo'] == "erro") {?>
        Swal.fire({
            title: "Erro!",
            text: "<?= $_SESSION['alerta']['mensagem'] ?>",
            icon: "error"
        });
        <?php } ?>
        <?php if($_SESSION['alerta']['tipo'] == "sucesso") {?>
        Swal.fire({
            title: "Sucesso!",
            text: "<?= $_SESSION['alerta']['mensagem'] ?>",
            icon: "success"
        });
        <?php } ?>
    </script>
<?php 
// Apagar a sessão de mensagem:
unset($_SESSION['alerta']);
}

?>