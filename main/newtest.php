<?php require 'header.php'; ?>
<main class="page">
  <div>
    <?php
      if (!empty($_SESSION["filial"])) {
        header ("Location: index.php");
      } else

      {
      echo "<form action='includes/register.inc.php' method='post'>
                        <b>Número de série:</b><br>
                        <input type='checkbox' id='estado1' name='estado1' value='APARELHO EM BOAS CONDICOES, '>
                        <input type='text' name='serialn' value=''><br>

                        <b>Código do item:</b></td><br>
                        <input type='text' name='cod' value=''><br>

                        <b>Descrição:</b></td></tr><br>
                        <input type='text' name='desc' value=''><br>

                        <b>Nota de transferência:</b><br>
                        <input type='text' name='notaf' value=''><br>

                        <b>Data da nota:</b><br>
                        <input type='text' name='datanota' value=''><br>

                        <b>Loja origem:</b><br>
                        <input type='text' name='loja' value=''><br>

                        <b>Avaliação / Loja</b><br>
                        <input type='text' name='valorloja' value=''><br>

                        <b>Avaliação / AT</b><br>
                        <input type='text' name='valorat' value=''><br>

                        <b>Capacidade da bateria (%)</b><br>
                        <input type='text' name='capacidadebateria' value=''><br>

                        <b>Observações:</b><br>
                        <textarea name='obs'></textarea>

                              <b>Estado Físico do Produto</b><br><br>

                              <label for='estado1' name='estado1'>APARELHO EM BOAS CONDICOES</label><br>
                              <input type='checkbox' id='estado2' name='estado2' value='POUCAS MARCAS DE USO, '>
                              <label for='estado2'>POUCAS MARCAS DE USO</label><br>
                              <input type='checkbox' id='estado3' name='estado3' value='EXCESSIVAS MARCAS DE USO, '>
                              <label for='estado3'>EXCESSIVAS MARCAS DE USO</label><br>
                              <input type='checkbox' id='estado4' name='estado4' value='PONTOS DE IMPACTO NO GABINETE, '>
                              <label for='estado4'>PONTOS DE IMPACTO NO GABINETE</label><br>
                              <input type='checkbox' id='estado5' name='estado5' value='TELA QUEBRADA, '>
                              <label for='estado5'>TELA QUEBRADA</label><br>
                              <input type='checkbox' id='estado6' name='estado6' value='TELA COM ARRANHOES LEVES, '>
                              <label for='estado6'>TELA COM ARRANHOES LEVES</label><br>
                              <input type='checkbox' id='estado7' name='estado7' value='TELA COM ARRANHOES PROFUNDOS, '>
                              <label for='estado7'>TELA COM ARRANHOES PROFUNDOS</label><br>
                              <input type='checkbox' id='estado8' name='estado8' value='GABINETE AMASSADO, '>
                              <label for='estado8'>GABINETE AMASSADO</label><br>
                              <input type='checkbox' id='estado9' name='estado9' value='GABINETE EMPENADO, '>
                              <label for='estado9'>GABINETE EMPENADO</label><br>
                              <input type='checkbox' id='estado10' name='estado10' value='SEPARACAO DO GABINETE, '>
                              <label for='estado10'>SEPARACAO DO GABINETE</label><br>
                              <input type='checkbox' id='estado11' name='estado11' value='BATERIA DILATADA, '>
                              <label for='estado11'>BATERIA DILATADA</label><br>
                              <input type='checkbox' id='estado12' name='estado12' value='GABINETE RACHADO, '>
                              <label for='estado12'>GABINETE RACHADO</label><br>
                              <input type='checkbox' id='estado13' name='estado13' value='CONTATO COM LIQUIDO, '>
                              <label for='estado13'>CONTATO COM LIQUIDO</label><br>
                              <input type='checkbox' id='estado14' name='estado14' value='PARAFUSO ESPANADO/IMPOSSIVEL ABRIR, '>
                              <label for='estado14'>PARAFUSO ESPANADO/IMPOSSIVEL ABRIR</label><br><br><br>

                              <b>Peças de terceiros:</b><br><br>
                              <input type='checkbox' id='bateria'name='falsabateria' value='BATERIA, '>
                              <label for='bateria'>BATERIA</label><br>
                              <input type='checkbox' id='tela' name='falsatela' value='TELA, '>
                              <label for='tela'>TELA</label><br>
                              <input type='checkbox' id='gabinete'name='falsogabinete' value='GABINETE, '>
                              <label for='gabinete'>GABINETE</label><br>
                              <input type='checkbox' id='outros'name='falsooutros' value='outras peças, '>
                              <label for='outros'>OUTROS</label><br>
                                <b>Descrição do defeito:</b><br><br>
                                <input type='checkbox' id='prob1' name='prob1' value='MULTIPLAS FISSURAS NA TELA, '>
                                <label for='prob1'> MULTIPLAS FISSURAS NA TELA</label><br>
                                <input type='checkbox' id='prob2'name='prob2' value='FALHA NO DISPLAY, '>
                                <label for='prob2'>FALHA NO DISPLAY</label><br>
                                <input type='checkbox' id='prob3'name='prob3' value='FALHA NO BOTÃO HOME, '>
                                <label for='prob3'>FALHA NO BOTÃO HOME</label><br>
                                <input type='checkbox' id='prob4'name='prob4' value='PROBLEMAS DE PIXEL OU LUZ DE FUNDO, '>
                                <label for='prob4'>PROBLEMAS DE PIXEL OU LUZ DE FUNDO</label><br>
                                <input type='checkbox' id='prob5'name='prob5' value='BATERIA CONSUMIDA, '>
                                <label for='prob5'>BATERIA CONSUMIDA</label><br>
                                <input type='checkbox' id='prob6'name='prob6' value='FALHA NO MICROFONE (FRONTAL), '>
                                <label for='prob6'>FALHA NO MICROFONE (FRONTAL)</label><br>
                                <input type='checkbox' id='prob7' name='prob7' value='FALHA NO RECEIVER/SPEAKER (SUPERIOR), '>
                                <label for='prob7'> FALHA NO RECEIVER/SPEAKER (SUPERIOR)</label><br>
                                <input type='checkbox' id='prob8'name='prob8' value='FALHA NO SPEAKER (INFERIOR), '>
                                <label for='prob8'>FALHA NO SPEAKER (INFERIOR)</label><br>
                                <input type='checkbox' id='prob9'name='prob9' value='FALHA DE AUDIO (NAO RECONHECE A DOCK - OP2124), '>
                                <label for='prob9'>NAO RECONHECE A DOCK - OP2124</label><br>
                                <input type='checkbox' id='prob10'name='prob10' value='FALHA NO MICROFONE (INFERIOR/TRASEIRO), '>
                                <label for='prob10'>FALHA NO MICROFONE (INFERIOR/TRASEIRO)</label><br>
                                <input type='checkbox' id='prob11'name='prob11' value='CONTATO COM LIQUIDO, '>
                                <label for='prob11'>CONTATO COM LIQUIDO</label><br>
                                <input type='checkbox' id='prob12'name='prob12' value='GABINETE EMPENADO/RACHADO, '>
                                <label for='prob12'>GABINETE EMPENADO/RACHADO</label><br>
                                <input type='checkbox' id='prob13' name='prob13' value='NAO LIGARA/NAO CARREGA, '>
                                <label for='prob13'>NAO LIGARA/NAO CARREGA</label><br>
                                <input type='checkbox' id='prob14'name='prob14' value='BATERIA DILATADA, '>
                                <label for='prob14'>BATERIA DILATADA</label><br>
                                <input type='checkbox' id='prob15'name='prob15' value='PROBLEMAS DE PLACA LOGICA/WIFI/SEM SERVICO, '>
                                <label for='prob15'>PROBLEMAS DE PLACA LOGICA/WIFI/SEM SERVICO</label><br>
                                <input type='checkbox' id='prob16'name='prob16' value='PROBLEMAS NOS BOTOES LATERAIS, '>
                                <label for='prob16'>PROBLEMAS NOS BOTOES LATERAIS</label><br>
                                <input type='checkbox' id='prob17'name='prob17' value='FALHA NA CAMERA FRONTAL, '>
                                <label for='prob17'>FALHA NA CAMERA FRONTAL</label><br>
                                <input type='checkbox' id='prob18'name='prob18' value='FALHA NA CAMERA TRASEIRA, '>
                                <label for='prob18'>FALHA NA CAMERA TRASEIRA</label><br>
                                <input type='checkbox' id='prob19' name='prob19' value='TAPTIC ENGINE COM DEFEITO, '>
                                <label for='prob19'>TAPTIC ENGINE COM DEFEITO</label><br>
                                <input type='checkbox' id='prob20'name='prob20' value='FALHA NO FACE ID, '>
                                <label for='prob20'>FALHA NO FACE ID</label><br>
                                <input type='checkbox' id='prob21'name='prob21' value='PEÇAS/PARTES AUSENTES, '>
                                <label for='prob21'>PEÇAS/PARTES AUSENTES, </label><br>
                      <send><button type='submit' name='register_save'>SALVAR</button></send><br><br><br><br><br><br>
               </form>
            ";

        }
?>

  </div>
</main>
<?php require 'footer.php'; ?>
