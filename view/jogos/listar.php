<?php

include_once(__DIR__ . "/../../controller/JogoController.php");

$jogoCont = new JogoController();
$jogos = $jogoCont->listar();

?>

<?php
    include_once(__DIR__ . "/../include/header.php");
?>

<h2 class="text-dark mt-5">Lista de Jogos</h2>

<table class="table table-striped mt-4">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ano de Lançamento</th>
            <th>Empresa</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Plataforma</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($jogos as $j): ?>
            <tr>
                <td><?= $j->getId() ?></td>
                <td><?= $j->getNome() ?></td>
                <td><?= $j->getAnoLancamento() ?></td>
                <td><?= $j->getEmpresa() ?></td>
                <td>
                    <?php
                    if ($j->getPreco() == 0) {
                        echo 'Grátis';
                    } else {
                        echo 'R$ ' . number_format($j->getPreco(), 2, ',', '.');
                    }
                    ?>
                </td>

                <td><?= $j->getCategoria() ?></td>
                <td><?= $j->getPlataforma() ?></td>
                <td>
                    <a href="alterar.php?id=<?= $j->getId() ?>">
                        <img src="../../img/btn_editar.png" >
                    </a>
                </td>
                <td>
                    <a href="excluir.php?id=<?= $j->getId() ?>"
                        onclick="return confirm('Confirma a exclusão?');" >
                        <img src="../../img/btn_excluir.png" >
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<div>
    <a href="inserir.php" class="btn btn-primary">Inserir</a>
</div>

<?php 
    include_once(__DIR__ . "/../include/footer.php");
?>
