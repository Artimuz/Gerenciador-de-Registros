<?php


      $host = "localhost";
      $user = "root";
      $passw  = "FFVxAtAsTfNDniD2";
      $datab = "buyback";


      $conn = mysqli_connect($host, $user, $passw, $datab);


      if (!$conn){
        die("Falha ao conectar-se ao banco de dados!" . mysqli_connect_error());
      }
