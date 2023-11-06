<?php 
include_once(__DIR__ . "/../../controller/AlunoController.php");

//Carrega a lista de alunos
$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);
?>
<?php 
    include_once(__DIR__ . "/../include/header.php");
?>    

<h3>Listagem de alunos</h3>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped table-hover mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Estrangeiro</th>
            <th>Curso</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($alunos as $a): ?>
            <tr>
                <td><?= $a->getId() ?></td>
                <td><?= $a->getNome() ?></td>
                <td><?= $a->getIdade() ?></td>
                <td><?= $a->getEstrangeiroDesc() ?></td>
                <td><?= $a->getCurso() ?></td>
                <td>
                    <a href="alterar.php?id=<?= $a->getId() ?>">
                        <img src="../../img/btn_editar.png" >
                    </a>
                </td>
                <td>
                    <a href="excluir.php?id=<?= $a->getId() ?>"
                        onclick="return confirm('Confirma a exclusão?');" >
                        <img src="../../img/btn_excluir.png" >
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<?php 
    include_once(__DIR__ . "/../include/footer.php");
?>    