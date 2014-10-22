<?php
include 'SessionLogin.php';

/*TODO: Input the MySQL query to pull all of the shift data. The code below should take care of the rest for you. */
$sql = ("     ");

$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);
