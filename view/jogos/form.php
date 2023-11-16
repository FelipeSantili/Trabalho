<?php

include_once(__DIR__ . "/../../controller/CategoriaController.php");
include_once(__DIR__ . "/../../controller/PlataformaController.php");

$categoriaCont = new CategoriaController();
$categorias = $categoriaCont->listar();

$plataformaCont = new PlataformaController();
$plataformas = $plataformaCont->listar();
?>

<?php
include_once(__DIR__ . "/../include/header.php");
?>

<h3 class="text-dark mt-5"><?= ($jogo && $jogo->getId() > 0 ? 'Alterar' : 'Inserir') ?> jogo</h3>

<div class="row">
    <div class="col-8 mt-2">
        <form method="POST" action="">

            <div class="form-group">
                <label for="inpNome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="inpNome"
                    value="<?= ( $jogo ? $jogo->getNome() : '' ) ?>">
            </div>

            <div class="form-group">
                <label for="inpAnoLancamento">Ano de Lançamento:</label>
                <select class="form-control" name="anoLancamento" id="inpAnoLancamento">
                    <option value="">-Selecione-</option>
                    <?php
                    
                    for ($ano = 1990; $ano <= 2030; $ano++) {
                        echo '<option value="' . $ano . '"';
                        if ($jogo && $jogo->getAnoLancamento() == $ano) {
                            echo ' selected';
                        }
                        echo '>' . $ano . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="inpEmpresa">Empresa:</label>
                <input class="form-control" type="text" name="empresa" id="inpEmpresa"
                    value="<?= ( $jogo ? $jogo->getEmpresa() : '' )?>">
            </div>

            <div class="form-group">
                <label for="inpPreco">Preço:</label>
                <input class="form-control" type="text" name="preco" id="inpPreco"
                    value="<?= ($jogo ? number_format($jogo->getPreco(), 2, ',', '') : '') ?>"
                    pattern="[0-9]+([\.,][0-9]+)?"
                    title="Informe um valor válido">
            </div>

        

            <div class="form-group">
                <label for="inpCategoria">Categoria:</label>
                <select class="form-control" name="categoria" id="inpCategoria">
                    <option value="">---Selecione---</option>
                    <?php foreach($categorias as $c): ?>
                        <option value="<?= $c->getId() ?>"
                            <?php if($jogo && $jogo->getCategoria() &&
                                $jogo->getCategoria()->getId() == $c->getId())
                                echo 'selected';
                            ?>
                        >
                            <?= $c->getNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="inpPlataforma">Plataforma:</label>
                <select class="form-control" name="plataforma" id="inpPlataforma">
                    <option value="">---Selecione---</option>
                    <?php foreach($plataformas as $p): ?>
                        <option value="<?= $p->getId() ?>"
                            <?php if($jogo && $jogo->getPlataforma() &&
                                $jogo->getPlataforma()->getId() == $p->getId())
                                echo 'selected';
                            ?>
                        >
                            <?= $p->getNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-success" type="submit">Gravar</button>
            <button class="btn btn-danger" type="reset">Limpar</button>

            <input type="hidden" name="id_jogo"
                value="<?= $jogo ? $jogo->getId() : '' ?>">
            <input type="hidden" name="submetido" value="1">
        </form>

        <?php if($msgErros): ?>
            <div style="color: red;">
                <?= $msgErros ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<a href="listar.php" class="btn btn-secondary mt-2 mb-5">Voltar</a>
<?php
include_once(__DIR__ . "/../include/footer.php");
?>
