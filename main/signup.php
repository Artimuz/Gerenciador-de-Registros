<?php
    require 'header.php';
 ?>

       <main>
         
         <?php
             $nome = "";
             $sobrenome = "";
             $ponto = "";
             $filial = "";

             if (isset($_GET['nome'])) {
                 $nome = $_GET['nome'];
             }
             if (isset($_GET['sobrenome'])) {
                 $sobrenome = $_GET['sobrenome'];
             }
             if (isset($_GET['ponto'])) {
                 $ponto = $_GET['ponto'];
             }
             if (isset($_GET['filial'])) {
                 $filial = $_GET['filial'];
             }
          ?>

        <h1>Cadastro de usuário</h1>

           <form action='includes/signup.inc.php' method='post'>
             <input type='text' name='c_nome' placeholder='Nome' value="<?php echo $nome;?>">
             <input type="text" name='c_sobrenome' placeholder='Sobrenome' value="<?php echo $sobrenome;?>">
             <input type='text' name='c_ponto' placeholder='Cartão ponto' value="<?php echo $ponto;?>">
             <input type='text' name='c_filial' placeholder='filial (opcional)' value="<?php echo $filial;?>">
             <input type='password' name='c_password' placeholder='Senha'>
             <input type='password' name='c_password2' placeholder='Verificação de senha'>
             <button type='submit' name='signup-submit'>signup</button>
           </form>

       </main>


<?php
   require 'footer.php';
?>
