<?php
include 'SessionLogin.php';

//$sql = ("SELECT * FROM personnel");
$sql = ("SELECT DISTINCT
            a.SCHEDULE_EMPLOYEE_ID,
            CONCAT_WS(' ', b.EMPLOYEE_FNAME, b.EMPLOYEE_LNAME) AS Full_name ,
            a.SCHEDULE_DAY,
            CONCAT_WS(' - ', c.SHIFT_START, c.SHIFT_END) AS Shift
            FROM schedule a
            INNER JOIN
            employee b ON  a.SCHEDULE_EMPLOYEE_ID = b.EMPLOYEE_ID
            INNER JOIN
            shift c ON a.SCHEDULE_SHIFT_ID = c.SHIFT_ID
            GROUP BY
            a.SCHEDULE_EMPLOYEE_ID,
            a.SCHEDULE_DAY
            ;
            ");

$result = $mysqli->query($sql) or die($mysqli->error);
$result->fetch_array(MYSQLI_ASSOC);
$array_result = array();
while($row = $result->fetch_assoc()){
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['FULL_NAME'];
    $row_array['Full_name'] = array('val' => $row['Full_name']);
    $row_array['Shift'] = array('val' =>$row['Shift']);
//    $row_array[$row['Full_name']][] = $row['Full_name'];
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['SCHEDULE_DAY'];
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['SHIFT_START'];
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['SHIFT_END'];
    array_push($array_result, $row_array);

}
echo json_encode($array_result);
