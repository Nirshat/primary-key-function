<?php
// let's say you have already made a reusable database configuration function from another folder/file.

include_once "../Folder/file.php";
$con = config();

$specialQuery = $con->query("SELECT * from `tableName`") or die ($con->error);
$data = $specialQuery->fetch_assoc();
$numData = $specialQuery->num_rows;

if($num_data > 0){ // if database has one or more row/s...

  // generate num
  $num_data += 1; // count num of rows and add 1
  // check if the generated num has duplicate
  $checknum_data = $con->query("SELECT `columnName` FROM `tableName` WHERE `columnName`='$num_data'");
  // count the duplicates
  $count_numdata = $checknum_data->num_rows;

  do{
      // continously generate a number while it has duplicate
      $num_data += 1;
  } while($count_numdata >= 1); // 1 or more duplicate/s
}

else{
    $num_data += 1;
}
?>
