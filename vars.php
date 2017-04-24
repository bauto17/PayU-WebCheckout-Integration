<?php
include 'Conf.php';
//======================================================================
// General Data
//======================================================================
$postUrl="https://sandbox.gateway.payulatam.com/ppp-web-gateway/";
$apiKey=$API_KEY;
$merchantId = $MERCHANTID;
$accountId = $ACCOUNTID;
$tax="0";
$taxReturnBase="0";
$currency="COP";
$test="1";
$buyerEmail="test@test.com";
$responseUrl = $RESPONSEUrl;
$confirmationUrl = $CONFIRMATIONUrl;
//======================================================================
// Init
//======================================================================
$items = array();
$cantidad = 4;
loadItems();
$description="Venta de implementos deportivos";

//======================================================================
// functions
//======================================================================
function getRoundToHash($valor){
  return number_format(round($valor, 1, PHP_ROUND_HALF_EVEN), 1, '.', '');
}
function saveDataByReference($reference){
  return array('error' => 0);
}
function getDataByReference($reference){
  return 1;
}
function getUniqueID($data){
  $UUID=uniqid();
  return "SBPrueba".$UUID.hash('crc32', $data)."TestPayU";
}
function getItemById($id){
  global $items;
  return $items[$id];
}
function loadItems(){
  global $items,$cantidad;
  $disponible = array(1,1,1,1);
  $articulos = array("camiseta el primer campeón manga corta", "camiseta el primer campeón manga larga", "gorra soy del leon", "reloj edición campeón copa suramericana");
  $precios = array(100000,120000,60000,150000);
  $imagenUrl = array("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAICMejIcH8cWfG2uNViOLTZmZ1kPxTXW2lwyAexMyjqaX_aME","http://casacardenal.com/716-large_default/camiseta-oficial-manga-larga-roja-2017.jpg","http://static.wixstatic.com/media/af4172_286af6dba1e945de9caee80b9ba0d86d.jpg_256","http://dimayor.com.co/wp-content/uploads/2015/11/Reloj2.png");
  $texto = "un item de colección del mejor equipo de Colombia, el primer y el último campeón";
  for ($i=0; $i < $cantidad; $i++) {
    $ite = array('name' => $articulos[$i],'precio' => $precios[$i],'image' => $imagenUrl[$i],'disponible' => $disponible[$i],'texto' => $texto);
    array_push($items,$ite);
  }
}
?>
