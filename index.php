
<?php
    $user = "";
    $erro = "";
    if (isset($_GET['user'])) {
        $user = $_GET['user'];
    }
    if (isset($_GET['timeout'])) {
        $erro = "Sessão finalizada por inatividade";
    }
    if (isset($_GET['404'])) {
        $erro = "Este usuário nao existe";
    }
    if (isset($_GET['empty'])) {
        $erro = "Todos os campos são obrigatórios";
    }
    if (isset($_GET['errordb'])) {
        $erro = "Banco de dados indisponível";
    }
    if (isset($_GET['pass'])) {
        $erro = "Senha incorreta";
    }
    session_start();
    if (isset($_SESSION["nome"])) {
        header ("Location: ../main");
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" href="main/css/style.css">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <cont class="login">
            <div>
                <form action='main/includes/login.inc.php' method='post'>
                    <div><?php echo $erro; ?></div>
                    <input type='text' name='ponto' placeholder='Matrícula' value=<?php echo $user ?>>
                    <input type='password' name='pass' placeholder='Senha'>
                    <button type='submit' name='login-submit'>login</button>
                </form>
            </div>
        </cont>

    </body>
</html>
