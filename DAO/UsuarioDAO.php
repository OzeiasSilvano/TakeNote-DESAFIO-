<?php
require_once 'UtilDAO.php';
require_once 'Conexao.php';

class UsuarioDAO extends Conexao {
    
    public function CadastrarUsuario($nome, $email, $senha, $rsenha) {
        if (trim($nome) == '' || trim($email) == '' || trim($senha) == '' || trim($rsenha) == '') {
            return 0;
        } elseif (strlen(trim($senha)) < 6) {
            return -1;
        } elseif ($senha !== $rsenha) {
            return -2;
        }
        
        $conexao = parent::retornaConexao();
        
        $comando = "insert into tb_usuario (nome, email, senha) values (?,?,?)";
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return 2;
        }
    }
    
    public function LogarUsuario($email, $senha) {
        if (trim($email) == '' || trim($senha) == '') {
            return 0;
        }
        
        $conexao = parent::retornaConexao();
        
        $comando = "select id_usuario from tb_usuario where email = ? and senha = ?";
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        $user = $sql->fetchAll();
        
        if (count($user) == 0) {
            return 3;
        } else {
            $id_user = $user[0]['id_usuario'];
            UtilDAO::CriarSessao($id_user);
            header('location: painel.php');
        }
    }
    
}
