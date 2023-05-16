<?php
// let's say you have already made a reusable database configuration function from another folder/file.

include_once "../Folder/file.php";
$con = config();

$specialQuery = $con->query("SELECT * from `tableName`") or die ($con->error);
$data = $specialQuery->fetch_assoc();
$num_data = $specialQuery->num_rows;

if($num_data > 0){ // if database has one or more row/s...
  // generate num
  $checknum_data = $con->query("SELECT `uniqueID` FROM `tableName` WHERE `uniqueID`='$num_data'");
  $count_numdata = $checknum_data->num_rows; // count duplicates
  do{
      // continously generate a number while it has duplicate
      $num_data += 1; // this will be the unique key
      $checknum_data = $con->query("SELECT `uniqueID` FROM `tableName` WHERE `uniqueID`='$num_data'");
      $count_numdata = $checknum_data->num_rows; // count duplicates
      if($count_numdata == 0){
          break;
        }
  } while($count_numdata >= 1); // 1 or more duplicate/s
}

else{
    $num_data += 1;
}
?>
