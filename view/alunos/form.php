<?php 

include_once(__DIR__ . "/../../controller/CursoController.php");

//Carregar a lista de cursos para exibir no input:select
$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);
?>
<?php 
    include_once(__DIR__ . "/../include/header.php");
?>    

<h3><?php echo ($aluno && $aluno->getId() > 0 ? 'Alterar' : 'Inserir') ?> 
        Aluno</h3>

<div class="row">
    <div class="col-6">        
        <form method="POST" action="">

            <div class="form-group">
                <label for="inpNome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="inpNome"
                    value="<?php echo ( $aluno ? $aluno->getNome() : '' ) ?>">
            </div>

            <div class="form-group">
                <label for="inpIdade">Idade:</label>
                <input class="form-control" type="number" name="idade" id="inpIdade"
                    style="width: 100px;"
                    value="<?php echo ( $aluno ? $aluno->getIdade() : '' )?>">
            </div>

            <div class="form-group">
                <label for="inpEstrang">Estrangeiro:</label>
                <select class="form-control" name="estrang" id="inpEstrang">
                    <option value="">---Selecione---</option>
                    <option value="S"
                        <?php echo ($aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '') ?> 
                    >Sim</option>
                    
                    <option value="N"
                        <?php echo ($aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '') ?> 
                    >Não</option>
                </select>
            </div>

            <div class="form-group">
                <label for="inpCurso">Curso:</label>
                <select class="form-control" name="curso" id="inpCurso">
                    <option value="">---Selecione---</option>
                    <?php foreach($cursos as $c): ?>
                        <option value="<?= $c->getId() ?>" 
                            <?php if($aluno && $aluno->getCurso() && 
                                        $aluno->getCurso()->getId() == $c->getId())
                                        echo 'selected';
                            ?>

                        >
                            <?= $c->getNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-success" type="submit">Gravar</button>
            <button class="btn btn-secondary" type="reset">Limpar</button>

            <input type="hidden" name="id_aluno" 
                value="<?php echo ( $aluno ? $aluno->getId() : '' ) ?>">
            <input type="hidden" name="submetido" value="1">
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErros): ?>
            <div class="alert alert-danger" >
                <?= $msgErros ?>      
            </div>
        <?php endif; ?>
    </div>
</div>

<a class="btn btn-outline-primary mt-5" href="listar.php">Voltar</a>

<?php 
    include_once(__DIR__ . "/../include/footer.php");
?> 