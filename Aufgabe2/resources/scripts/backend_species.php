
<?php
require "include/connection.php";

$request = $_REQUEST;

$table = $request['table'];

$col = array(
    '0'   =>  'lat_sci_name',
    '1'   =>  'eng_name',
    '2'   =>  'ger_name',
    '3'   =>  'kinkdom',
    '4'   =>  'phylum',
    '5'   =>  'classes',
    '6'   =>  'orders',
    '7'   =>  'family',
    '8'   =>  'genus'
    
);  //create column like table in database

$sql = "SELECT * FROM $table WHERE 1=1 ";

   
    $sql .= " AND $col[0] > '" . $request['one_u'] . "' ";
    $sql .= " AND $col[0] < '" . $request['one_a'] . "' ";
    $sql .= " AND $col[1] > '" . $request['two_u'] . "' ";
    $sql .= " AND $col[1] < '" . $request['two_a'] . "' ";
    $sql .= " AND $col[2] > '" . $request['three_u'] . "' ";
    $sql .= " AND $col[2] < '" . $request['three_a'] . "' ";
    $sql .= " AND $col[3] > '" . $request['four_u'] . "' ";
    $sql .= " AND $col[3] < '" . $request['four_a'] . "' ";
    $sql .= " AND $col[4] > '" . $request['five_u'] . "' ";
    $sql .= " AND $col[4] < '" . $request['five_a'] . "' ";
    $sql .= " AND $col[5] > '" . $request['six_u'] . "' ";
    $sql .= " AND $col[5] < '" . $request['six_a'] . "' ";  
    $sql .= " AND $col[6] > '" . $request['seven_u'] . "' ";
    $sql .= " AND $col[6] < '" . $request['seven_a'] . "' "; 
    $sql .= " AND $col[7] > '" . $request['eight_u'] . "' ";
    $sql .= " AND $col[7] < '" . $request['eight_a'] . "' "; 
    $sql .= " AND $col[8] > '" . $request['nine_u'] . "' ";
    $sql .= " AND $col[8] < '" . $request['nine_a'] . "' "; 
 
$query = mysqli_query($conn, $sql);

$totalData = mysqli_num_rows($query);

$totalFilter = $totalData;

$data = array();

while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    $subdata[] = $row[0]; //lat_sci_name
    $subdata[] = $row[1]; //eng_name
    $subdata[] = $row[2]; //ger_name
    $subdata[] = $row[3]; //kinkdom
    $subdata[] = $row[4]; //phylum
    $subdata[] = $row[5]; //classes
    $subdata[] = $row[6]; //orders
    $subdata[] = $row[7]; //family
    $subdata[] = $row[8]; //genus

    $data[] = $subdata;
}


$json_data=array(
    "data"  =>  $data
);

echo json_encode($json_data);


?>
