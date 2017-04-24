<?php
include 'vars.php';
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="hola.css" />
  <script type="text/javascript" src="codigo.js"></script>
</head>
<body>
  <section class="SBposts">
    <?php

    for ($i = 0; $i < $cantidad; $i++){
      $product=getItemById($i);
      if ($product['disponible']==1) {
        $d="disponible";
      }else {
        $d="no disponible";
      }
      ?>
      <article class="SBpost">
        <div class="SBdescripcion">
          <figure class="SBimagen">
            <img src="<?php print($product['image']);?>"/>
          </figure>
          <div class="SBdetalles">
            <h2 class="SBtitulo">
              <?php
              print($product['name']);
              ?>
            </h2>
            <a class="SBa SBtag" href="#"><?php print($d) ?></a>
            <p class="SBdireccion">
              <?php
              print($product['precio']);
              ?>
            </p>
            <p class="SBdes"><?php print($product['texto']); ?></p>
            <button class="SBadd" onclick="<?php print("addToCar('".$product['name']."',".$product['precio'].",".$i.")");?>" >añadir al carro</button>
          </div>
        </div>
      </article>
      <?php
    }
    ?>
  </section>
  <table id="tabla">
    <tr>
      <th>Artículo</th>
      <th>valor</th>
    </tr>
  </table>
  <table>
    <tr>
      <th class="total">TOTAL</th>
      <th class="total" id="total"></th>
    </tr>
  </table>
  <form method="post" action="compra.php" >
    <input name="items" id="items"    type="hidden"  value="0">
    <input name="Submit"   type="submit"  value="Enviar">
  </form>

</body>

</html>
