<?php
require_once '../config/database.php';
require_once '../config/config.php';
require_once '../classes/produto.php';
require_once '../classes/m_produto.php';
require_once '../classes/imposto.php';
require_once '../classes/m_imposto.php';

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


$pagina = (!isset($_GET['p']) OR $_GET['p'] == '') ? 'start' : strtolower($_GET['p']);
//TODO Remover a linha abaixo ao terminar de desenvolver
$pagina = ($pagina =='start') ? 'template' : $pagina;//FIXME

$viewFile = (file_exists("views".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR.$pagina.".php")) 
? "views".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR.$pagina.".php" 
: "views".DIRECTORY_SEPARATOR."errors".DIRECTORY_SEPARATOR."404.php";

require_once $viewFile;

