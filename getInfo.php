<?php
include 'SessionLogin.php';

$sql = ("SELECT * FROM personnel");
$result = $mysqli->query($sql) or die("The Website is broken :(");
//$result->fetch_array($sql);
$array_result = array();
while($row = $result->fetch_assoc()){
    $array_result[] = $row;
}
echo json_encode($array_result);
