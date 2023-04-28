<?php
// let's say you have already made a reusable database configuration function from another folder/file.

include_once "../Folder/file.php";
$con = config();

$specialQuery = $con->query("SELECT * from `tableName`") or die ($con->error);
$data = $specialQuery->fetch_assoc();
$numData = $specialQuery->num_rows;

if($numData > 0){ // if database has one or more data...
  do{
      $allNumData = $data['primaryKey']; // get all unique data
  } while($data = $specialQuery->fetch_assoc());

  do{
      $numData += 1;
  } while($numData == $allNumData);
}

else{
    $numData += 1;
}
?>
