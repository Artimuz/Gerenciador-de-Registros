<?php
  session_start();
  if(!isset($_SESSION["ponto"])){
    header("Location: ../");
      } else {

      $nome = $_POST['c_nome'];
      $sobrenome = $_POST['c_sobrenome'];
      $ponto = $_POST['c_ponto'];
      $filial = $_POST['c_filial'];
      $password = $_POST['c_password'];
      $password2 = $_POST['c_password2'];

      if (isset($_POST['signup-submit'])){

        require 'conn.php';

        if (empty($nome) || empty($sobrenome) || empty($ponto) || empty($password) || empty($password2)) {
          header("Location: ../signup.php?error=emptyfields&nome=$nome&sobrenome=$sobrenome&ponto=$ponto&filial=$filial");
          exit();

        } else
          if ($password !== $password2) {

            header("Location: ../signup.php?error=password&nome=$nome&sobrenome=$sobrenome&ponto=$ponto&filial=$filial");
            exit();

          }

        $sql = "SELECT nome FROM users WHERE ponto=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror1&nome=$nome&sobrenome=$sobrenome&ponto=$ponto&filial=$filial");
          exit();

          } else {
            mysqli_stmt_bind_param($stmt, "s", $ponto);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
              header("Location: ../signup.php?error=useralreadytaken&nome=$nome&sobrenome=$sobrenome&ponto=$ponto&filial=$filial");
            } else {

              $sql = "INSERT INTO users (nome, sobrenome, ponto, filial, senha) VALUES (?, ?, ?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror2&nome=$nome&sobrenome=$sobrenome&ponto=$ponto&filial=$filial");
                exit();


              } else {
                $hashedpass = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sssss", $nome, $sobrenome, $ponto, $filial, $hashedpass);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=sucess");
                exit();
            }
          }
        }
          mysqli_stmt_close($stmt);
          mysqli_close($conn);

      } else {

        header("Location: ../signup.php");
        exit();


      }
}
