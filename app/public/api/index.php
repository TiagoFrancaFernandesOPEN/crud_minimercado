<?php
require_once './controllers_api/c_produtos.php';

$db = DB::getInstance();


// $produto = new Produto;
// $produto->setAllInLine(11113,'produto','ativo',1002,'importado');
// $m = new ModelProdutos();
// $m->Inserir($produto);
// $produto = $m->BuscarPorID(1);
// var_dump($produto);
// $m->Deletar(17);
// $m->BuscarPorID(1);

// $imposto = new Imposto();
// $imposto->setAllInLine('nome','usados','percentual',10);
// $m = new ModelImpostos();
// $m->Inserir($imposto);

// $desconto = $imposto->getDeducao(701.00);
// var_dump($desconto);

// $restante = $imposto->getRestante(701.00);
// var_dump($restante);
// var_dump($restante+$desconto);

$_ProdutosController = new ProdutosController();

$action = (!isset($_GET['api_action']) OR $_GET['api_action'] == '')
? 'listar_produtos' 
: strtolower($_GET['api_action']);

$query = (isset($_GET['query']) AND $_GET['query'] != '')?$_GET['query']:false;
switch ($action) {
  default:
  case 'listar_produtos':
  $inArray = (isset($_GET['array']) AND $_GET['array'] == 'true')?true:false;
  return $_ProdutosController->listarProdutos($inArray);
    break;
  case 'produto_codigo':
  if($query){
    return $_ProdutosController->buscarPorCodigo($query);
  }
    break;
  case 'nome':
  if($query){
    return $_ProdutosController->buscarPorNome($query);
  }
    break;  
}

