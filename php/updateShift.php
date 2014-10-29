<?php
include 'SessionLogin.php';

/*TODO: Add in PHP statement to update the database with the shift. */
$sql = ("SELECT DISTINCT
SHIFT_ID as ID,
SHIFT_START as Start,
SHIFT_END as End
FROM shift;");

$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);