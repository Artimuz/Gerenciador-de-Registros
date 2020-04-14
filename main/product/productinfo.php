<main class="page">
  <div>


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





      echo "<content class='info'>";

      echo "<table>
              <tr><td></td></tr>
              <tr><th>".$row['cod']." - ".$row['modelo']."</th></tr>
              <tr><td></td></tr>
              <tr><td>Avaliação inical: ".$row['dataregistro']."</td></tr>
              <tr><td>Técnico inicial: ".$row['ponto']."</td></tr>
              <tr><td>Loja origem:".$row['loja']."</td></tr>
              <tr><td>Nota de transf:".$row['notaf']."</td></tr>
              <tr><td>N° de Série:".$row['SN']."</td></tr>
              <tr><td>Valor da NF:".$row['valorloja']."</td></tr>
              <tr><td>Valor avaliação CD:".$row['valorat']."</td></tr>
              <tr><td>Peças de terceiros: ".$row['adulteracao']."</td></tr>
              <tr><td></td></tr>
              <tr><td><b>Estado físico:</b></td></tr>
              <tr><td><box>".$row['aparencia']."</box></td></tr>
              <tr><td><b>Descrição do defeito</b></td></tr>
              <tr><td><box>".$row['problema']."</box></td></tr>
              <tr><td><b>Observações:</b></td></tr>
              <tr><td><boxf>".$row['coments']."</boxf></td></tr>

            </table>";
        echo "</content><content class='gallery'>";

          echo "<div>' fotos '</div>";

        echo "</content>";
    ?>
  </div>
</main>
