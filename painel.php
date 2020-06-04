<?php
require_once './DAO/UtilDAO.php';
UtilDao::VerLogado();
require_once './DAO/AnotacaoDAO.php';

if (isset($_GET['id_anotacao']) && is_numeric($_GET['id_anotacao'])) {
    $id_anot = $_GET['id_anotacao'];

    $objdao_exc = new AnotacaoDAO();

    $ret = $objdao_exc->ExcluirAnotacao($id_anot);
} else if (isset($_GET['close']) && $_GET['close'] == 1) {
    UtilDao::Deslogar();
}


$objdao = new AnotacaoDAO();

$anotacoes = $objdao->ConsultarAnotacao();
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
            if (isset($_GET['ret'])) {
                ExibirMsg($_GET['ret']);
            }
            ?>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 my-5">
                    <a href="criar_anotacao.php" class="btn btn-primary btn-block">Criar Anotação</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($anotacoes); $i++) { ?>
                                    <tr>
                                        <td class="text-center"><a href="editar_anotacao.php?id=<?= $anotacoes[$i]['id_anotacao'] ?>"><?= $anotacoes[$i]['titulo'] ?></a></td>
                                        <td class="text-center"><a href="painel.php?id_anotacao=<?= $anotacoes[$i]['id_anotacao'] ?>" type="submit" class="btn btn-danger btn-sm">Excluir</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <a href="painel.php?close=1" class="btn btn-outline-dark">Sair</a>
            </div>
        </div>
    </body>
</html>