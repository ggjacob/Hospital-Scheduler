<?php
include 'SessionLogin.php';

//$sql = ("SELECT * FROM personnel");
$sql = ("SELECT DISTINCT
b.EMPLOYEE_FNAME AS Name,
GROUP_CONCAT(a.SCHEDULE_DAY ORDER BY a.SCHEDULE_DAY ) AS Day,
GROUP_CONCAT(CONCAT_WS(' - ', c.SHIFT_START, c.SHIFT_END)) AS Shift



FROM `schedule`a
INNER JOIN
employee b ON  a.SCHEDULE_EMPLOYEE_ID = b.EMPLOYEE_ID
INNER JOIN
shift c ON a.SCHEDULE_SHIFT_ID = c.SHIFT_ID
group by b.EMPLOYEE_FNAME
order by b.EMPLOYEE_FNAME
;
            ");

$result = $mysqli->query($sql) or die($mysqli->error);
$result->fetch_array(MYSQLI_ASSOC);
$array_result = array();
$array = [];
while($row = $result->fetch_assoc()){


   // $row['Day'] = '['.$row['Day'].']';
//    foreach($row['Day'] as $rowData){
//        $rowData = '"'.$rowData.'"';
//    }

    //    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['FULL_NAME'];
 //   $row_array['Full_name'] = array('val' => $row['Full_name']);
   // $row_array['Shift'] = array('val' =>$row['Shift']);
//    $row_array[$row['Full_name']][] = $row['Full_name'];
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['SCHEDULE_DAY'];
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['SHIFT_START'];
//    $array_result[$row['SCHEDULE_EMPLOYEE_ID']][] = $row['SHIFT_END'];
   // echo $row;
    array_push($array_result, $row);

}
echo json_encode($array_result);
