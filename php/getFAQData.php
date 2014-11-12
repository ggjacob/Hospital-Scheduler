<?php
include 'SessionLogin.php';

$sql = ('SELECT * FROM faq');
$result = $mysqli->query($sql) or die($mysqli->error);

$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);

