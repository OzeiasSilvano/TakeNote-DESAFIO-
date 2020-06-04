<?php
require_once './DAO/UsuarioDAO.php';

if (isset($_POST['btnSalvar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objdao = new UsuarioDAO();

    $ret = $objdao->LogarUsuario($email, $senha);
}
?>
<!DOCTYPE html>
<html>
    <?php
    include_once '_head.php';
    ?>
    <body>
        <div class="text-center">
            <?php
            if (isset($ret)) {
                ExibirMsg($ret);
            }
            ?>
        </div>
        <section class="container-fluid bg">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                    <form method="post" action="login.php" class="form-container">
                        <h5 class="text-center">Login</h5>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu e-mail">
                            <label class="validar-campos" id="val_email"></label>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha">
                            <label class="validar-campos" id="val_senha"></label>
                        </div>
                        <button name="btnSalvar" class="btn btn-success btn-block" onclick="return ValidarTela(2)">Entrar</button>
                        Não possui uma conta? <a href="cadastro.php">Clique aqui</a>
                    </form>
                </section>
            </section>
        </section>
    </body>
</html>