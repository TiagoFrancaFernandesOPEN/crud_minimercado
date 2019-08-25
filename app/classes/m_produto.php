<?php
require_once 'validacoes.php';

class ModelProdutos {
  
  public function Inserir(Produto $produto) {
       if(Validacoes::verificaSeExiste(
            'produtos',"cod_produto = '".$produto->getCod_produto()."'"
        )){
            echo "Já existe um produto com o cod_produto '".$produto->getCod_produto()."'.";
        }else
      try {
          $sql = "INSERT INTO produtos (
              cod_produto,
              nome,
              status,
              estoque,
              tipo) 
              VALUES (
                :cod_produto,
                :nome,
                :status,
                :estoque,
                :tipo
                )";

          $p_sql = DB::getInstance()->prepare($sql);

          $p_sql->bindValue(":cod_produto", $produto->getCod_produto());
          $p_sql->bindValue(":nome", $produto->getNome());
          $p_sql->bindValue(":status", $produto->getStatus());
          $p_sql->bindValue(":estoque", $produto->getEstoque());
          $p_sql->bindValue(":tipo", $produto->getTipo());


          return $p_sql->execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
          Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
      }
  }

  public function Editar(Produto $produto) {
          try {
              $sql = "UPDATE produtos set
                cod_produto = :cod_produto,
                nome        = :nome,
                status      = :status,
                estoque     = :estoque,
                tipo        = :tipo                
                WHERE ID = :ID";
  
              $p_sql = DB::getInstance()->prepare($sql);

          $p_sql->bindValue(":cod_produto", $produto->getCod_produto());
          $p_sql->bindValue(":nome", $produto->getNome());
          $p_sql->bindValue(":status", $produto->getStatus());
          $p_sql->bindValue(":estoque", $produto->getEstoque());
          $p_sql->bindValue(":tipo", $produto->getTipo());


          return $p_sql->execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
          Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
      }
  }
   public function Deletar($ID) {
        try {
            $sql = "DELETE FROM produtos WHERE ID = :ID";
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
            $sql = "SELECT * FROM produtos WHERE ID = :ID";
            $p_sql = DB::getInstance()->prepare($sql);
            $p_sql->bindValue(":ID", $ID);
            $p_sql->execute();
            return $this->showProduto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde. 
            Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    private function showProduto($row) {
        $prod = new Produto;
        $prod->setCod_produto((int)$row['cod_produto']);
        $prod->setNome($row['nome']);
        $prod->setStatus($row['status']);
        $prod->setEstoque((int)$row['estoque']);
        $prod->setTipo($row['tipo']);
        return $prod;
    }







}