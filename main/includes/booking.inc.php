<?php
  session_start();
  if(!isset($_SESSION["ponto"])){
    header("Location: ../");
    } else {
      if (isset($_POST['num'])){
         if (isset($_POST['test'])) {
            $id = ($_POST['num']);
            $sqlid =  implode($id, " AND ");
            echo $sqlid;
          }
      } else {
      header("Location: ../");
    }
  }
