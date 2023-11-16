<?php
include_once(__DIR__ . "/view/include/header.php");

?>

<div class="card">
    <img class="card-image-top mx-auto" src="<?= BASE_URL . "/img/card_jogo.png" ?> " style="max-width: 100px; height:auto;" />
    <div class="card-body text-center">
        <h5 class="card-title">Jogos</h5>
        <a class="btn btn-primary" href="<?= BASE_URL . "/view/jogos/listar.php"?>">Listagem de Jogos</a>
    </div>

    <p>Sistema de armazenamento de Jogos, podendo ser feito:</p>
        <ul>
            <li><strong>Inserir:</strong> Adicionar um novo jogo à lista.</li>
            <li><strong>Listar:</strong> Visualizar a lista de jogos existentes.</li>
            <li><strong>Alterar:</strong> Editar informações de um jogo existente.</li>
            <li><strong>Excluir:</strong> Remover um jogo da lista.</li>
        </ul>
</div>

<?php include_once(__DIR__ . "/view/include/footer.php")?>
