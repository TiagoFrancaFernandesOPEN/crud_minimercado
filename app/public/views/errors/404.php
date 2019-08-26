<?php
$pagina = (isset($pagina))?$pagina:'';
$pageTitle = APP_NAME.' | '.'Erro, Página '.$pagina.' não encontrada';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$pageTitle ?></title>
  <link href="css/min.css" rel="stylesheet" type="text/css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css">  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
<div class="container_produtos">
    <div class="mercado_quadro cl_plan">
      <h1><?=$pageTitle ?></h1>
      <p>You can view the source of this page and copy it to get a quick start on a project with Min!</p>
      <p>You can view the source of this page and copy it to get a quick start on a project with Min!</p>
      <a class="btn btn-b btnGoToStart go">Painel</a>
    </div>
</div>
</body>
</html>