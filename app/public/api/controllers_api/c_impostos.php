<?php
require_once '../../config/database.php';
require_once '../../config/config.php';
require_once '../../classes/produto.php';
require_once '../../classes/m_produto.php';
require_once '../../classes/imposto.php';
require_once '../../classes/m_imposto.php';

class ImpostosController{

public function __construct () {
}

public function buscarPorCodigo($COD) {
    try {
        $sql = "SELECT * FROM impostos WHERE cod_produto = :cod_produto";
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->bindValue(":cod_produto", $COD);
        $p_sql->execute();
        print_r(json_encode($p_sql->fetch(PDO::FETCH_ASSOC)));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
        Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
    }
}

public function listarImpostos($inArray=false) {
    try {
    $sql = "SELECT * FROM impostos";
    $p_sql = DB::getInstance()->prepare($sql);
    $p_sql->execute();
    if($inArray){
        $result = $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $result = $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }
    print_r(json_encode($result));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
        Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
    }
}

public function buscarPorNome($nome) {
    try {
    $sql = "SELECT * FROM impostos WHERE nome like :nome";
    $p_sql = DB::getInstance()->prepare($sql);
    $p_sql->bindValue(":nome", "%".$nome."%");
    $p_sql->execute();
    print_r(json_encode($p_sql->fetchAll(PDO::FETCH_ASSOC)));
    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
        Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
    }
}

public function getDeducao($deduzir) {
    if(is_array($deduzir)){
        $_produto_tipo = $deduzir['produto_tipo'].'s';
        $_imposto_model = new ModelImpostos;
        $_imposto_regra = $_imposto_model->BuscarPorRegra($_produto_tipo);
        
        $impostoTipo_calculo  = $_imposto_regra->getTipo_calculo();
        $impostoValor = $_imposto_regra->getValor();
        $dinheiro = $deduzir['do_total'];
        switch ($impostoTipo_calculo) {
            case 'percentual':
            $result = $dinheiro / 100 * $impostoValor;
            return (float) number_format($result, 3, '.', '');
                break;

            case 'fixo':
            $result = $dinheiro - ($dinheiro - $impostoValor);
            return (float) number_format($result, 3, '.', '');
                break;

            default:
            return NULL;
        }
    }
}

public function getRestante($deduzir) {
    if(is_array($deduzir)){
        $dinheiro = $deduzir['do_total'];
        $_imposto = $this->getDeducao($deduzir);
        $result = (float) $dinheiro - $_imposto;
        return (float) number_format($result, 3, '.', '');
    }
}

}