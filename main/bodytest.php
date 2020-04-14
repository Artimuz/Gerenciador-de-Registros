
    <?php
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
                            <th>S/N</th>
                          </tr>
                      <form action='includes/booking.inc.php' method='post' id='booking'>
                      ";
            while ($row = mysqli_fetch_assoc($result)) {
                $SN = $row['SN'];
                $num = "id=".$row['id'];
                echo "
                        <tr>
                          <td><input type='checkbox' name='num[]' value='$num'></td>
                          <td><a href='product.php?serialn=$SN'>".$row['SN']."</a></td>
                          <td><a href='product.php?serialn=$SN'></a></td>
                      </tr>
                ";
                $nume++;
          }
                echo "<tr><td></td></tr>
              </form>";
        } else {
          echo "<div class='nada'>
                  <div><img src='img/nada.png'></div>
                </div>";
        }
    ?>
  </table>
  <button type='submit' name='test' form='booking'>test</button>
