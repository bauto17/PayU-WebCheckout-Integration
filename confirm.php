<?php
$file = fopen("data.txt", "a");

fwrite($file, "#-------------------------------------------------------\n");
fwrite($file, "# Request\n");
fwrite($file, "#-------------------------------------------------------\n");
foreach($_POST as $id => $responseValue){
  fwrite($file, "/---".$id." => ".$responseValue."---/\n");
}
fclose($file);

?>
