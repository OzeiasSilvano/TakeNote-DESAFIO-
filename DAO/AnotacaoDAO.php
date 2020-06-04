<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class AnotacaoDAO extends Conexao{
    
    public function InserirAnotacao($titulo, $anotacao) {
        
        if (trim($titulo) == '' || trim($anotacao) == '') {
            return 0;
        } else {
        
        $conexao = parent::retornaConexao();
        
        $comando = "insert into tb_anotacao (titulo, anotacao, tb_usuario_id_usuario) values (?,?,?)";
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $titulo);
        $sql->bindValue(2, $anotacao);
        $sql->bindValue(3, UtilDAO::CodigoLogado());
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
//            throw $ex;
            return 2;
        }
        }
    }
    
    public function AlterarAnotação($titulo, $anotacao, $id) {
        
        if (trim($titulo) == '' || trim($anotacao) == '') {
            return 0;
        }
        
        $conexao = parent::retornaConexao();
        
        $comando = 'update tb_anotacao 
                       set titulo = ?, 
                           anotacao = ? 
                     where id_anotacao = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $titulo);
        $sql->bindValue(2, $anotacao);
        $sql->bindValue(3, $id);
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return 2;
        }
    }
    
    public function ConsultarAnotacao() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select
                        id_anotacao,
                        titulo,
                        anotacao
                    from tb_anotacao
                where tb_usuario_id_usuario = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, UtilDao::CodigoLogado());
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
    }
    
    public function DetalharAnotacao($id) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select
                        id_anotacao,
                        titulo,
                        anotacao
                    from tb_anotacao
                where id_anotacao = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
    }
    
    public function ExcluirAnotacao ($id) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'delete from tb_anotacao where id_anotacao = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id);
        
        try {
            $sql->execute();
            return 3;
        } catch (Exception $ex) {
            return 2;
        }
    }
    
    public function AlterarAnotacao($titulo, $anotacao, $id) {
        if (trim($titulo) == '' || trim($anotacao) == '') {
            return 0;
        }
        
        $conexao = parent::retornaConexao();
        
        $comando = 'update tb_anotacao
                       set titulo = ?,
                           anotacao = ?
                     where id_anotacao = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $titulo);
        $sql->bindValue(2, $anotacao);
        $sql->bindValue(3, $id);
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            throw $ex;
//            return 2;
        }
    }
        
    }
    

