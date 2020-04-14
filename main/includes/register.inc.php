<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  if (isset($_POST['register'])) {
    if(!isset($_SESSION["ponto"])){
      header("Location: ../../");
      } else {

        $filial = $_SESSION["filial"];
        $ponto = $_SESSION["ponto"];
        $nome = $_SESSION["nome"];
        $datapost = date("d/m/y - G:i");
        $estoque = "DOA";

        $serialn = $_POST['serialn'];
        $cod = $_POST['cod'];
        $desc = $_POST['desc'];
        $notaf = $_POST['notaf'];
        $datanota = $_POST['datanota'];
        $loja = $_POST['loja'];
        $valorloja = $_POST['valorloja'];
        $valorat = $_POST['valorat'];
        $capacidadebateria = $_POST['capacidadebateria'];
        $obs = $_POST['obs'];

        if(isset($_POST["estado1"])){$estado1 = $_POST["estado1"];} else {$estado1 = "";}
        if(isset($_POST['estado2'])){$estado2 = $_POST['estado2'];} else {$estado2 = "";}
        if(isset($_POST['estado3'])){$estado3 = $_POST['estado3'];} else {$estado3 = "";}
        if(isset($_POST['estado4'])){$estado4 = $_POST['estado4'];} else {$estado4 = "";}
        if(isset($_POST['estado5'])){$estado5 = $_POST['estado5'];} else {$estado5 = "";}
        if(isset($_POST['estado6'])){$estado6 = $_POST['estado6'];} else {$estado6 = "";}
        if(isset($_POST['estado7'])){$estado7 = $_POST['estado7'];} else {$estado7 = "";}
        if(isset($_POST['estado8'])){$estado8 = $_POST['estado8'];} else {$estado8 = "";}
        if(isset($_POST['estado9'])){$estado9 = $_POST['estado9'];} else {$estado9 = "";}
        if(isset($_POST['estado10'])){$estado10 = $_POST['estado10'];} else {$estado10 = "";}
        if(isset($_POST['estado11'])){$estado11 = $_POST['estado11'];} else {$estado11 = "";}
        if(isset($_POST['estado12'])){$estado12 = $_POST['estado12'];} else {$estado12 = "";}
        if(isset($_POST['estado13'])){$estado13 = $_POST['estado13'];} else {$estado13 = "";}
        if(isset($_POST['estado14'])){$estado14 = $_POST['estado14'];} else {$estado14 = "";}

        $estado = $estado1.$estado2.$estado3.$estado4.$estado5.$estado6.$estado7.$estado8.$estado9.$estado10.$estado11.$estado12.$estado13.$estado14;

       if(isset($_POST['falsabateria'])){ $falsabateria = $_POST['falsabateria'];} else{ $falsabateria = "";}
       if(isset($_POST['falsatela'])){ $falsatela = $_POST['falsatela'];} else{$falsatela = "";}
       if(isset($_POST['falsogabinete'])){ $falsogabinete = $_POST['falsogabinete'];} else{ $falsogabinete = "";}
       if(isset($_POST['falsooutros'])){ $falsooutros = $_POST['falsooutros'];} else{$falsooutros = "";}

      $falso = $falsabateria.$falsatela.$falsogabinete.$falsooutros;
      if (empty($falso)) {
        $falso = "NAO POSSUI ";
      }

      if(isset($_POST['prob1'])){$prob01 = $_POST['prob1'];}else{$prob01 = "";}
      if(isset($_POST['prob2'])){$prob02 = $_POST['prob2'];}else{$prob02 = "";}
      if(isset($_POST['prob3'])){$prob03 = $_POST['prob3'];}else{$prob03 = "";}
      if(isset($_POST['prob4'])){$prob04 = $_POST['prob4'];}else{$prob04 = "";}
      if(isset($_POST['prob5'])){$prob05 = $_POST['prob5'];}else{$prob05 = "";}
      if(isset($_POST['prob6'])){$prob06 = $_POST['prob6'];}else{$prob06 = "";}
      if(isset($_POST['prob7'])){$prob07 = $_POST['prob7'];}else{$prob07 = "";}
      if(isset($_POST['prob8'])){$prob08 = $_POST['prob8'];}else{$prob08 = "";}
      if(isset($_POST['prob9'])){$prob09 = $_POST['prob9'];}else{$prob09 = "";}
      if(isset($_POST['prob10'])){$prob10 = $_POST['prob10'];}else{$prob10 = "";}
      if(isset($_POST['prob11'])){$prob11 = $_POST['prob11'];}else{$prob11 = "";}
      if(isset($_POST['prob12'])){$prob12 = $_POST['prob12'];}else{$prob12 = "";}
      if(isset($_POST['prob13'])){$prob13 = $_POST['prob13'];}else{$prob13 = "";}
      if(isset($_POST['prob14'])){$prob14 = $_POST['prob14'];}else{$prob14 = "";}
      if(isset($_POST['prob15'])){$prob15 = $_POST['prob15'];}else{$prob15 = "";}
      if(isset($_POST['prob16'])){$prob16 = $_POST['prob16'];}else{$prob16 = "";}
      if(isset($_POST['prob17'])){$prob17 = $_POST['prob17'];}else{$prob17 = "";}
      if(isset($_POST['prob18'])){$prob18 = $_POST['prob18'];}else{$prob18 = "";}
      if(isset($_POST['prob19'])){$prob19 = $_POST['prob19'];}else{$prob19 = "";}
      if(isset($_POST['prob20'])){$prob20 = $_POST['prob20'];}else{$prob20 = "";}
      if(isset($_POST['prob21'])){$prob21 = $_POST['prob21'];}else{$prob21 = "";}

      $prob = $prob01.$prob02.$prob03.$prob04.$prob05.$prob06.$prob07.$prob08.$prob09.$prob10.$prob11.$prob12.$prob13.$prob14.$prob15.$prob16.$prob17.$prob18.$prob19.$prob20.$prob21;
      if (empty($prob)) {
        $prob = "NENHUM PROBLEMA ENCONTRADO";
      }

        if (empty($_POST['serialn']) || empty($_POST['cod']) || empty($_POST['desc']) || empty($_POST['notaf']) || empty($_POST['datanota']) || empty($_POST['valorloja']) || empty($_POST['loja']) || empty($estado)) {
          header ("Location: ../new.php?sn=$serialn&cod=$cod&desc=$desc&nota=$notaf&data=$datanota&loja=$loja&vloja=$valorloja&vat=$valorat&bat=$capacidadebateria&empty");


          } else {

          require 'conn.php';
          $sql = "SELECT SN FROM registro WHERE SN=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../new.php?sn=$serialn&cod=$cod&desc=$desc&nota=$notaf&data=$datanota&loja=$loja&vloja=$valorloja&vat=$valorat&bat=$capacidadebateria&sqlerror");
            exit();

            } else {
              mysqli_stmt_bind_param($stmt, "s", $serialn);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              $resultCheck = mysqli_stmt_num_rows($stmt);
              if ($resultCheck > 0) {
                header("Location: ../new.php?sn=$serialn&cod=$cod&desc=$desc&nota=$notaf&data=$datanota&loja=$loja&vloja=$valorloja&vat=$valorat&bat=$capacidadebateria&taken");
                exit();
              } else {
                $sql2 = "INSERT INTO registro (estoque, filial, ponto, dataregistro, cod, SN, notaf, loja, valorloja, valorat, datanota, modelo, aparencia, problema, bateria, adulteracao, coments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt2 = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt2, $sql2);
                mysqli_stmt_bind_param($stmt2, "sssssssssssssssss", $estoque, $filial, $ponto, $datapost, $cod, $serialn, $notaf, $loja, $valorloja, $valorat, $datanota, $desc, $estado, $prob, $capacidadebateria, $falso, $obs);
                mysqli_stmt_execute($stmt2);
                header("Location: ../product.php?serialn=$serialn");

        }
      }
    }
  }

}else {
    header("Location: ../new.php");
}
