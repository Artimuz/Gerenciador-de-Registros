 ﻿<?php
 
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    if (isset($_SESSION["nome"])) {
        $minutes_timeout = 30;
        $seconds_timeout = $minutes_timeout*60;
        $timeout = $_SESSION["start"] + $seconds_timeout;
        if ($timeout < time()) {
            header ("Location: includes/logout.inc.php?timeout=error");
            } else {
                $_SESSION['start'] = time();
              }
          } else {
      header ("Location: ../");
    }
?>
<!DOCTYPE html>
<html lang='pt-br'>
<div class="banner">
<banner>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <meta charset='utf-8'>
        <?php
            if (isset($_GET['serialn'])) {
                $SN = $_GET["serialn"];
              echo "<title>-> ".$SN." <-</title>";
            } else {
              echo "<title>no title</title>";
            }
         ?>
        <title>no title</title>

        <header class="header">
            <nav>
                <ul class="menu">
                    <logo class="logo">
                        <img src="img/logo.png">
                    </logo>
                    <a href='/'><li>DOA</li></a>
                    <a href='#'><li>VENDAS</li></a>
                    <a href='#'><li>RESERVAS</li></a>
                    <a href='#'><li>LOG</li></a>
                    <a href='new.php'><li>NOVO REGISTRO</li></a>
                    <?php
                        if (empty($_SESSION["filial"])) {
                        echo "<a href='signup.php'><li>NOVO USUÁRIO</li></a>";
                      }
                    ?>

                </ul>
            </nav>
            <user class="user">
                <user class='logout'>Logado como: <?php echo $_SESSION['ponto'];; ?><a href='includes/logout.inc.php'><img src="img/logoff.png"></a>
                </user>
            </user>
        </header>
        </div>
    </head>
</banner>
</div>
<body>
<content class='corpo'>
