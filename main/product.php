<?php
  require 'header.php';
 ?>

       <main>
        <?php
          if (isset($_GET['serialn'])) {
            $SN = $_GET["serialn"];
            require 'product/productinfo.php';
          } else {
            header ("Location: ../");
          }
         ?>

       </main>

<?php
  require 'footer.php';
?>
