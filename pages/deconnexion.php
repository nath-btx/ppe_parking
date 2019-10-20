<?php
session_start();
echo $_SESSION['login'];
session_destroy();

echo '<script language="Javascript">
      <!--
      document.location.replace("../index.html");
      // -->
      </script>';

?>