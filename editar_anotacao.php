<?php
require_once './DAO/UtilDAO.php';
UtilDao::VerLogado();
require_once './DAO/AnotacaoDAO.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $objdao = new AnotacaoDAO();
    
    $anotacoes = $objdao->DetalharAnotacao($id);
    
    if (count($anotacoes) == 0) {
        header('location: painel.php');
    }
    
    
} else if (isset($_POST['btnSalvar'])) {
    $titulo = $_POST['titulo'];
    $anotacao = $_POST['anotacao'];
    $id = $_POST['id'];
    
    $objdao = new AnotacaoDAO();
    
    $ret = $objdao->AlterarAnotacao($titulo, $anotacao, $id);
    
    
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
        <div class="row justify-content-center my-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form method="post" action="editar_anotacao.php">
                    <input type="hidden" name="id" value="<?= $anotacoes[0]['id_anotacao'] ?>" />
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control"id="titulo" name="titulo" value="<?= $anotacoes[0]['titulo'] ?>" />
                        <label class="validar-campos" id="val_titulo" ></label>
                    </div>
                    <div class="form-group">
                        <label>Anotação</label>
                        <textarea class="form-control" rows="4" id="anotacao"name="anotacao" ><?= $anotacoes[0]['anotacao'] ?></textarea>
                        <label class="validar-campos" id="val_anotacao"></label>
                    </div>
                    <button name="btnSalvar" onclick="return ValidarTela(4)" class="btn btn-success btn-block">Alterar</button>
                    <a href="painel.php" class="btn btn-outline-dark btn-block">Voltar</a>
                </form>
            </div>
        </div>
    </body>
</html>
