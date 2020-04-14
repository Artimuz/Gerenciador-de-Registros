<?php
  if (!isset($SN)) {
    header ("Location: index.php");
  }

  require 'includes/conn.php';

  $sql = "SELECT * FROM registro WHERE SN='$SN';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
     header ("Location: index.php?404&$SN");
     exit();
  }

?>

    <main>

        <form action='includes/new.inc.php' method='post'>
          <h1><?php echo $SN ?></h1>
          <input type='text' name='serial' placeholder='SERIAL' value='<?php echo $row['SN'];?>'><br><br>
          <input type='text' name='NTF' placeholder='NOTA DE TRNSFERÊNCIA' value='<?php echo $row['notaf'];?>'><br><br>
          <input type='date' name='datanota' placeholder='DATA DA NOTA' value='<?php echo $row['datanota'];?>'><br><br>
          <input type='text' name='loja' placeholder='LOJA' value='<?php echo $row['loja'];?>'><br><br>
          <input type='text' name='cod' placeholder='CÓDIGO ITEM' value='<?php echo $row['cod'];?>'><br><br>
          <button type='submit' name='register-submit'>Próximo</button>
        </form>

    </main>
