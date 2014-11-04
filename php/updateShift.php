<?php
include 'SessionLogin.php';

echo $_POST['startTime'];

/*TODO: Add in PHP statement to update the database with the shift. */
$sql = ("UPDATE shift SET  SHIFT_START = '".$_POST['shiftStart']."', SHIFT_END = '".$_POST['shiftEnd']."' WHERE SHIFT_ID =1;");

$result = $mysqli->query($sql) or die($mysqli->error);
/*$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}*/
echo json_encode($result);
