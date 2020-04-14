
    <?php
        $listing = "";
        if(!isset($_SESSION["nome"])) {
            header ("Location: ../");
        exit();
        }
        require 'includes/conn.php';

        if (empty($_SESSION["filial"])) {
              $sql = "SELECT * FROM registro;";
        } else {
              $local = $_SESSION["filial"];
              $sql = "SELECT * FROM registro WHERE filial='$local';";
        }
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        $nume = 1;
        if ($resultcheck > 0) {
            echo "
                      <table class='maintable'>
                          <tr>
                            <th>num</th>
                            <th>COD. ITEM</th>
                            <th>S/N</th>
                            <th>NF.<br>TRANF.</th>
                            <th>LOJA</th>
                            <th>VALOR<BR>LOJA</th>
                            <th>VALOR<BR>AT</th>
                            <th>MODELO</th>
                            <th>APARENCIA</th>
                            <th>PROBLEMA</th>
                            <th>%</th>
                          </tr>
                          <form action='includes/booking.inc.php' method='post'>
              ";
            while ($row = mysqli_fetch_assoc($result)) {
                $SN = $row['SN'];
                echo "
                        <tr>

                          <td>".$nume."</td>
                          <td>".$row['cod']."</td>
                          <td><a href='product.php?serialn=$SN'>".$row['SN']."</a></td>
                          <td>".$row['notaf']."</td>
                          <td>".$row['loja']."</td>
                          <td>".$row['valorloja']."</td>
                          <td>".$row['valorat']."</td>
                          <td>".$row['modelo']."</td>
                          <td class='adjust'>".$row['aparencia']."</td>
                          <td class='adjust'>".$row['problema']."</td>
                          <td>".$row['bateria']."%</td>

                      </tr>
                ";

          }
        } else {
          echo "<div class='nada'>
                  <div><img src='img/nada.png'></div>
                </div>";
        }
    ?>
  </table>
