<?php
include_once(__DIR__ . "/../include/header.php");
?>

<h3><?php echo ($jogo && $jogo->getId() > 0 ? 'Alterar' : 'Inserir') ?> Jogo</h3>

<div class="row">
    <div class="col-6">
        <form method="POST" action="">
            <div class="form-group">
                <label for="inpNome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="inpNome" value="<?php echo ($jogo ? $jogo->getNome() : '') ?>">
            </div>

            <div class="form-group">
                <label for="inpEmpresa">Empresa:</label>
                <input class="form-control" type="text" name="empresa" id="inpEmpresa" value="<?php echo ($jogo ? $jogo->getEmpresa() : '') ?>">
                </select>
            </div>

            <div class="form-group">
                <label for="inpCategoria">Categoria:</label>
                <select class="form-control" name="categoria" id="inpCategoria">
                    <option value="">-Selecione-</option>
                    <option value="Acao">Ação</option>
                    <option value="RPG">RPG</option>
                    <option value="Esporte">Esporte</option>
                    <option value="Simulacao">Simulação</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Puzzle">Puzzle</option>
                    <?php
                    foreach ($categorias as $categoria) {
                        $selected = ($jogo && $jogo->getCategoria() && $jogo->getCategoria()->getNome() == $categoria) ? 'selected' : '';
                        echo "<option value='{$categoria}' {$selected}>{$categoria}</option>";
                    }
                    ?>
                </select>
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
                <label for="inpDescricao">Descrição:</label>
                <input class="form-control" type="text" name="descricao" id="inpDescricao"
                    value="<?php echo ($jogo ? $jogo->getDescricao() : '') ?>">
            </div>

            <div class="form-group">
                <label for="inpNota">Preço:</label>
                <input class="form-control" type="number" name="preco" id="inpPreco" step="0.01" 
                    value="<?php echo ($jogo ? $jogo->getPreco() : '') ?>">
            </div>

            <button class="btn btn-success" type="submit">Gravar</button>
            <button class="btn btn-secondary" type="reset">Limpar</button>

            <input type="hidden" name="id_jogo" value="<?php echo ($jogo ? $jogo->getId() : '') ?>">
            <input type="hidden" name="submetido" value="1">
        </form>
    </div>
    <?php if($msgErros): ?>
        <div class="alert alert-danger">
            <?= $msgErros ?>
        </div>
    <?php endif; ?>
</div>
<a class="btn btn-outline-primary mt-5" href="listar.php">Voltar</a>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>