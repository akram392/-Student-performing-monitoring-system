<?php

  ob_start();
  session_start();
  session_unset();
  session_destroy();

  header("Location: index.php");     // logout jonno sob somoy ai atu toko code use korbo.

  ob_end_flush();

?>