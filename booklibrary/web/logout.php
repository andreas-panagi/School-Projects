<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
      exit();   //is suggested to used after the header("location:....")
   }
?>