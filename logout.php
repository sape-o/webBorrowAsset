<?php
@session_start();
include("pathfile.php");
?>
<!DOCTYPE html>
<html>
  <body>

    <?php
      // remove all session variables
      session_unset();
      
      // destroy the session
      session_destroy();
      header("Location: $host");
    ?>

  </body>
</html>
