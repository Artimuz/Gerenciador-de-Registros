<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  $NTF = $_POST['NTF'];
  $datanota = $_POST['datanota'];
  $loja = $_POST['loja'];
  $serial = $_POST['serial'];
  $cod = $_POST['cod'];
  $dataregistro = date("d/m/y - G:i");
  $tecnicoinicial = $_SESSION["ponto"];
  $filialtecnico = $_SESSION["filial"];

  if (isset($_POST['register-submit'])){

    require 'conn.php';

    if (empty($serial) || empty($NTF) || empty($datanota) || empty($loja) || empty($cod)) {
      header("Location: ../new.php?emptyfields=error&serial=$serial&NTF=$NTF&datanota=$datanota&loja=$loja&cod=$cod");
      exit();

    }
      $sql = "SELECT * FROM registro WHERE SN=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../new.php?error=sqlerror1&serial=$serial&NTF=$NTF&datanota=$datanota&loja=$loja&cod=$cod");
        exit();

      } else {
        mysqli_stmt_bind_param($stmt, "s", $serial);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
          header("Location: ../new.php?took=sn&serial=$serial&NTF=$NTF&datanota=$datanota&loja=$loja&cod=$cod");
        } else{

          $sql = "INSERT INTO registro (notaf, datanota, loja, SN, cod, dataregistro, ponto, filial) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../new.php?error=sqlerror");
            exit();


          } else {
            mysqli_stmt_bind_param($stmt, "ssssssss",   $NTF, $datanota, $loja, $serial, $cod, $dataregistro, $tecnicoinicial, $filialtecnico);
            mysqli_stmt_execute($stmt);
            header("Location: ../product.php?serialn=$serial&done&$coluns");
            exit();
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  } else {

    header("Location: ../new.php");
    exit();


  }
