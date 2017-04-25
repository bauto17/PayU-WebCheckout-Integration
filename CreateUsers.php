<?php
include 'vars.php';
$con = mysqli_connect($BD_host, $BD_user, $BD_clave, $BD_name);
if ($con->connect_error){
    //print($con->connect_error);
    die("Conection Failed");
}


$disponible = array(20,20,20,20);
$articulos = array("camiseta el primer campeón manga corta", "camiseta el primer campeón manga larga", "gorra soy del leon", "reloj edición campeón copa suramericana");
$precios = array(100000,120000,60000,150000);
$imagenUrl = array("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAICMejIcH8cWfG2uNViOLTZmZ1kPxTXW2lwyAexMyjqaX_aME","http://casacardenal.com/716-large_default/camiseta-oficial-manga-larga-roja-2017.jpg","http://static.wixstatic.com/media/af4172_286af6dba1e945de9caee80b9ba0d86d.jpg_256","http://dimayor.com.co/wp-content/uploads/2015/11/Reloj2.png");
$texto = "un item de colección del mejor equipo de Colombia, el primer y el último campeón";

for ($index = 0; $index < 4; $index++) {
    $sql = "INSERT INTO productos(id,name,precio,cantidad,image,texto) VALUES (".$index.",'".$articulos[$index]."',".$precios[$index].",".$disponible[$index].",'".$imagenUrl[$index]."','".$texto."');";
    //print("error en ".$sql);
    print("<br>");
        
    if($con->query($sql)===TRUE){
        print("se creo correctamente");
        print("<br>");
        
    }else{
        print("error en ".$index);
        print("<br>");
        //print($con->error);
        print("<br>");
    
    }
    
}

$con->close();


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
