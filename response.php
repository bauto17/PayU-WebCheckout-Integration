<?php //print_r($_GET); // -1.6
include 'vars.php';
//-----------------------------------------------------
// generate validation hash
//-----------------------------------------------------
$valRound = getRoundToHash($_GET['TX_VALUE']);
$textToHash=$apiKey."~".$merchantId."~".$_GET['referenceCode']."~".$valRound."~".$currency."~".$_GET['transactionState'];
$hash= md5($textToHash);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="hola.css" />
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
  <?php if ($hash==$_GET['signature']){
    ?>
    <p>gracias por comprar en nuestra pagina</p>
    <?php
    if(($_GET['transactionState']==6) || ($_GET['transactionState']==5)){
      ?>
      <p>Hola, ha ocurrido un problema con tu  pago, te invitamos a intentarlo de nuevo</p>
      <form method="post" action="Compra.php">
        <input name="referenceCode" type="hidden"  value="<?php print($_GET['referenceCode'])?>" >
        <input name="Submit"  class="button"  type="submit"  value="Enviar" >
      </form>
      <?php
    }else if ($_GET['transactionState']==7) {
      ?>
      <p>debes verificar si usaste una cuenta de ahorro o tarjeta de crédito.</p>
      <?php
    }else if ($_GET['transactionState']==104){
      ?>
      <p>hubo un error, por favor intenta mas tarde, recuerda usar computadores de tu confianza para realizar las transacciones</p>

      <?php
    }?>
    <h3>datos de la transaccion</h3>
    <table>
      <tr>
        <th>parametro</th>
        <th>valor</th>
      </tr>
      <?php
      foreach($_GET as $id => $responseValue){
        ?>
        <tr>
          <td><?php print($id);?></td>
          <td><?php print($responseValue); ?></td>
        </tr>
        <?php
      }
      ?>
    </table>
    <?php
  }else {
    print("<p>tenemos problemas con la confirmación asegurate de usar un computador de tu confianza</p>");
  }
  ?>
</body>
</html>
