<script type="text/javascript" src="js/scripts.js"></script>
<?php
  if(isset($include_footer) && is_array($include_footer)){
    foreach ($include_footer as $file) {
      include "$file";
    }
  }
  if(isset($require_footer) && is_array($require_footer)){
    foreach ($require_footer as $file) {
      require_once "$file";
    }
  }
?>
</body>
</html>