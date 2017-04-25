<?php

use Exception;

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
$buyerEmail="test2x@test2x.com";
$responseUrl = $RESPONSEUrl;
$confirmationUrl = $CONFIRMATIONUrl;
//======================================================================
// bd conection
//======================================================================
$con = mysqli_connect($BD_host, $BD_user, $BD_clave, $BD_name);
if ($con->connect_error){
    //print($con->connect_error);
    die("Conection Failed");
}
//======================================================================
// Init
//======================================================================
$items = array();
$cantidad = 0;
loadItems();
$description="Venta de implementos deportivos";

//======================================================================
// functions
//======================================================================
function getRoundToHash($valor){
  return number_format(round($valor, 1, PHP_ROUND_HALF_EVEN), 1, '.', '');
}



function saveDataByReference($reference, $data){
  global $items,$cantidad,$con;
  $res=0;
  $con->autocommit(FALSE);
  try{
    $sql = "INSERT INTO pagos(referenceCode,estado) VALUES ('".$reference."',10);";
    if($con->query($sql)){
        foreach($data as $id => $unidades){
            $sql2 = "INSERT INTO pagoproducto(id,reference,unidades) VALUES (".$id.",'".$reference."',".$unidades.");";
            if(!$con->query($sql2)){throw new Exception("error");}
        }
    }else{
        throw new Exception("error");
    }
    $con->commit();
  }catch (Exception $e){
      $con->rollback();
      $res=1;
  }
  $con->autocommit(TRUE);
  return array('error' => $res);
}



function getDataByReference($reference){
  global $cantidad,$con;
  $items = array();
  $sql = "Select id, unidades FROM pagoproducto WHERE reference='".$reference."'";
  $resultQuery = $con->query($sql);
  $cantidad = $resultQuery->num_rows;
  if($cantidad > 0){
      while ($row = $resultQuery->fetch_assoc()){
          $items[$row["id"]] = $row["unidades"];
        }
  }
  return $items;
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
  global $items,$cantidad,$con;

  $sql = "Select id, name, precio, cantidad, image, texto FROM productos";
  $resultQuery = $con->query($sql);
  $cantidad = $resultQuery->num_rows;
  if($cantidad > 0){
      while ($row = $resultQuery->fetch_assoc()){
          $ite = array('name' => $row["name"],'precio' => $row["precio"],'image' => $row["image"],'disponible' => $row["cantidad"],'texto' => $row["texto"]);
          array_push($items,$ite);
      }
  }
}
?>
