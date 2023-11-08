<?php
    include_once(__DIR__ . "/../../util/config.php");
?>

<nav class="navbar navbar-expand-md navbar-light bg-info">
    <a class="navbar-brand" href="<?= BASE_URL ?>">CRUD Jogos</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>   

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . "/view/jogos/listar.php" ?>">Listar Jogos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . "/view/jogos/inserir.php" ?>">Inserir Jogo</a>
            </li>
        </ul>
    </div>
</nav>
