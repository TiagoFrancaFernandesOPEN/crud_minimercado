<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/min.css" rel="stylesheet" type="text/css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css">  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- //TODO Remover ao final -->
  <script type="text/javascript" src="http://livejs.com/live.js"></script>
  <?php
    if(isset($include_header) && is_array($include_header)){
      foreach ($include_header as $file) {
        include_once "$file";
      }
    }
    if(isset($require_header) && is_array($require_header)){
      foreach ($require_header as $file) {
        require_once "$file";
      }
    }
  ?>
  <title><?=$pageTitle ?></title>
</head>

<body>