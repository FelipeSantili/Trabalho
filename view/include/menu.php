<?php
include_once(__DIR__ . "/../../util/config.php");

$nome = "[NOME]";
?>
<nav class="navbar navbar-expand-md navbar-light bg-info">
    <a class="navbar-brand" href="#">CRUD Alunos</a>

    <button class="navbar-toggler" type="button" 
        data-toggle="collapse" data-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navDropDown" data-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= BASE_URL . "/view/alunos/listar.php" ?>">Alunos</a>
                    <a class="dropdown-item" href="#">Turmas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navDropDown" data-toggle="dropdown"><?= $nome ?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= BASE_URL . "/view/login/sair.php" ?>">Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>