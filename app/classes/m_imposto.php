<?php
require_once 'validacoes.php';

class ModelImpostos {

  public function Inserir(Imposto $imposto) {
        if(Validacoes::verificaSeExiste(
            'impostos',"imposto_regra = '".$imposto->getImposto_regra()."'"
        )){
            echo "Já existe um imposto com a regra '".$imposto->getImposto_regra()."'.";
        }else
      try {
          $sql = "INSERT INTO impostos (
                imposto_nome,
                imposto_regra,
                tipo_calculo,
                valor) 
              VALUES (
                :imposto_nome,
                :imposto_regra,
                :tipo_calculo,
                :valor
                )";

          $p_sql = DB::getInstance()->prepare($sql);

          $p_sql->bindValue(":imposto_nome", $imposto->getImposto_nome());
          $p_sql->bindValue(":imposto_regra", $imposto->getImposto_regra());
          $p_sql->bindValue(":tipo_calculo", $imposto->getTipo_calculo());
          $p_sql->bindValue(":valor", $imposto->getValor());

          return $p_sql->execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
          Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
      }
  }

  public function Editar(Imposto $imposto) {
          try {
              $sql = "UPDATE impostos set
                imposto_nome  = :imposto_nome,
                imposto_regra   = :imposto_regra,
                tipo_calculo       = :tipo_calculo,
                valor         = :valor
                WHERE ID = :ID";
  
              $p_sql = DB::getInstance()->prepare($sql);

          $p_sql->bindValue(":imposto_nome", $imposto->getImposto_nome());
          $p_sql->bindValue(":imposto_regra", $imposto->getImposto_regra());
          $p_sql->bindValue(":tipo_calculo", $imposto->getTipo_calculo());
          $p_sql->bindValue(":valor", $imposto->getValor());


          return $p_sql->execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
          Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
      }
  }
   public function Deletar($ID) {
        try {
            $sql = "DELETE FROM impostos WHERE ID = :ID";
            $p_sql = DB::getInstance()->prepare($sql);
            $p_sql->bindValue(":ID", $ID);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
            Erro: Código: "
            . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function BuscarPorID($ID) {
        try {
            $sql = "SELECT * FROM impostos WHERE ID = :ID";
            $p_sql = DB::getInstance()->prepare($sql);
            $p_sql->bindValue(":ID", $ID);
            $p_sql->execute();
            return $this->showImposto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
            Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    private function showImposto($row) {
        $prod = new Imposto;
        $prod->setImposto_nome((int)$row['imposto_nome']);
        $prod->setImposto_regra($row['imposto_regra']);
        $prod->setTipo_calculo($row['tipo_calculo']);
        $prod->setValor((int)$row['valor']);
        return $prod;
    }








}