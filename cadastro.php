<?php
require_once './DAO/UsuarioDAO.php';

if (isset($_POST['btnSalvar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rsenha = $_POST['rsenha'];

    $objdao = new UsuarioDAO();

    $ret = $objdao->CadastrarUsuario($nome, $email, $senha, $rsenha);
}
?>
<!DOCTYPE html>
<html>
    <?php
    include_once './_head.php';
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
                    <form class="form-cadastro" method="post" action="cadastro.php">
                        <h5 class="text-center">Cadastro</h5>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"placeholder="Insira seu nome">
                            <label class="validar-campos" id="val_nome"></label>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu e-mail">
                            <label class="validar-campos" id="val_email"></label>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira uma senha">
                            <label class="validar-campos" id="val_senha"></label>
                        </div>
                        <div class="form-group">
                            <label>Repetir Senha</label>
                            <input type="password" class="form-control" id="rsenha" name="rsenha" placeholder="Repita sua senha">
                        </div>
                        <button name="btnSalvar" onclick="return ValidarTela(1)" class="btn btn-success btn-block">Cadastrar</button>
                        <br/>
                        Já é cadastrado? <a href="login.php">Clique aqui!</a>
                    </form>
                </section>
            </section>
        </section>
    </body>
</html>