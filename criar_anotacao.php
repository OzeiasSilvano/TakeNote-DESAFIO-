<?php
require_once './DAO/UtilDAO.php';
UtilDao::VerLogado();
require_once './DAO/AnotacaoDAO.php';

if (isset($_POST['btnSalvar'])) {
    $titulo = $_POST['titulo'];
    $anotacao = $_POST['anotacao'];
    
    $objdao = new AnotacaoDAO();
    
    $ret = $objdao->InserirAnotacao($titulo, $anotacao);
    
    header('location: painel.php?ret=' . $ret);
}
?>
<!DOCTYPE html>
<html>
    <?php
    include_once '_head.php';
    ?>
    <body>
        <?php
        include_once '_header.php';
        ?>
        <div class="text-center">
            <?php
            if (isset($ret)) {
                ExibirMsg($ret);
            }
            ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-5">
                    <?php
                    if (isset($ret)) {
                        ExibirMsg($ret);
                    }
                    ?>
                    <h4 class="display-3">Anota aí =)</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form method="post" action="criar_anotacao.php">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control"id="titulo" name="titulo">
                        <label class="validar-campos" id="val_titulo"></label>
                    </div>
                    <div class="form-group">
                        <label>Anotação</label>
                        <textarea class="form-control" rows="4" id="anotacao" name="anotacao"></textarea>
                        <label class="validar-campos" id="val_anotacao"></label>
                    </div>
                    <button name="btnSalvar" type="submit" onclick="return ValidarTela(3)" class="btn btn-success btn-block">Anotar</button>
                    <a href="painel.php" class="btn btn-outline-dark btn-block">Voltar</a>
                </form>
            </div>
        </div>
    </body>
</html>
