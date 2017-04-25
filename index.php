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
<body class="ltr">
  <div id="logo">
      <a href="index.php">
        <img class="" src="https://i0.wp.com/independientesantafe.com/wp-content/uploads/2016/02/cropped-Santa-Fe-escudo-2016.png?fit=240%2C240">
        <span>Tienda del león</span>
      </a>
    </div>

    <div id="menu">
      <a class="home-link" href="index.php">Inicio</a>
    </div>
  <section class="SBposts">
    <?php

    for ($i = 0; $i < $cantidad; $i++){
      $product=getItemById($i);
      if ($product['disponible']>0) {
        $d=" unidades ".$product['disponible'];
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
  <p></p>
  <table>
    <tr>
      <th>TOTAL</th>
      <th id="total">0</th>
    </tr>
  </table>
  <form method="post" action="compra.php" >
    <input name="items" id="items"    type="hidden"  value="0">
    <input class="button" name="Submit"   type="submit"  value="Enviar">
  </form>

</body>

</html>
