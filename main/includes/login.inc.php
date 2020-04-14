<?php

  if (isset($_POST['login-submit'])){

    require 'conn.php';

    $ponto = $_POST["ponto"];
    $pass = $_POST["pass"];

    if (empty($ponto) || empty($pass)) {
      header("Location: ../../?empty=fields&user=$ponto");
      exit();
    } else {
      $sql = "SELECT * FROM users WHERE ponto=?";
      $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt, $sql))  {
        header("Location: ../../?errordb");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $ponto);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
      }
        if($row = mysqli_fetch_assoc($results)) {

          $passcheck = password_verify($pass, $row["senha"]);
          if ($passcheck == false){
            header("Location: ../../?pass=whong&user=$ponto");
            exit();
          } else if ($passcheck == true){
              session_start();
              $_SESSION["nome"] = $row["nome"];
              $_SESSION["sobrenome"] = $row["sobrenome"];
              $_SESSION["ponto"] = $row["ponto"];
              $_SESSION["filial"] = $row["filial"];
              $_SESSION['start'] = time();


              header("Location: ../?user=$ponto&logged_in");
              exit();
            }

        } else {
          header("Location: ../../?404&user=$ponto&_not_found");
          exit();
        }
      }
    } else {
        header("Location: ../../?error3");
        exit();
  }
