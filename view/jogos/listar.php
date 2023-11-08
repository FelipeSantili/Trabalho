<?php 
include_once(__DIR__ . "/../../controller/JogoController.php");

// Carrega a lista de jogos
$jogoCont = new JogoController();
$jogos = $jogoCont->listar();
?>

<?php 
    include_once(__DIR__ . "/../include/header.php");
?>    

<h3>Listagem dos Jogos</h3>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped table-hover mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Empresa</th>
            <th>Categoria</th>
            <th>Ano de Lançamento</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($jogos as $j): ?>
            <tr>
                <td><?= $j->getId() ?></td>
                <td><?= $j->getNome() ?></td>
                <td><?= $j->getEmpresa() ?></td>
                <td><?= $j->getCategoria() ?></td>
                <td><?= $j->getAnoLancamento() ?></td>
                <td><?= $j->getDescricao() ?></td>
                <td><?= $j->getPreco() ?></td>
                <td>
                    <a class="btn btn-primary" href="alterar.php?id=<?= $j->getId() ?>">
                        Editar
                    </a>
                </td>
                <td>
                    <a class "btn btn-danger" href="excluir.php?id=<?= $j->getId() ?>"
                        onclick="return confirm('Confirma a exclusão?');" >
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    include_once(__DIR__ . "/../include/footer.php");
?>