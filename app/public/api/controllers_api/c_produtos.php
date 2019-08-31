<?php
require_once '../../config/database.php';
require_once '../../config/config.php';
require_once '../../classes/produto.php';
require_once '../../classes/m_produto.php';
require_once '../../classes/imposto.php';
require_once '../../classes/m_imposto.php';

class ProdutosController{

public function __construct () {
}

public function buscarPorCodigo($COD) {
    try {
        $sql = "SELECT * FROM produtos WHERE cod_produto = :cod_produto";
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->bindValue(":cod_produto", $COD);
        $p_sql->execute();
        print_r(json_encode($p_sql->fetch(PDO::FETCH_ASSOC)));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
        Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
    }
}

public function listarProdutos($inArray=false) {
    try {
    $sql = "SELECT * FROM produtos";
    $p_sql = DB::getInstance()->prepare($sql);
    $p_sql->execute();
    if($inArray){
        $result = $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $result = $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    print_r(json_encode($result));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
        Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
    }
}

public function buscarPorNome($nome) {
    try {
    $sql = "SELECT * FROM produtos WHERE nome like :nome";
    $p_sql = DB::getInstance()->prepare($sql);
    $p_sql->bindValue(":nome", "%".$nome."%");
    $p_sql->execute();
    print_r(json_encode($p_sql->fetchAll(PDO::FETCH_ASSOC)));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
        Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
    }
}




}