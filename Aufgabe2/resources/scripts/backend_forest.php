
<?php
require "include/connection.php";

$request = $_REQUEST;

$table = $request['table'];

$col = array(
    '0'   =>  'usefulep_plot_Id',
    '1'   =>  'years',
    '2'   =>  'layer',
    '3'   =>  'species',
    '4'   =>  'cover',
    '5'   =>  'ep_plot_Id'
);  //create column like table in database

$sql = "SELECT * FROM $table WHERE 1=1 ";

   
    $sql .= " AND $col[0] > '" . $request['one_u'] . "' ";
    $sql .= " AND $col[0] < '" . $request['one_a'] . "' ";
    $sql .= " AND $col[1] > " . $request['two_u'];
    $sql .= " AND $col[1] < " . $request['two_a'];
    $sql .= " AND $col[2] > '" . $request['three_u'] . "' ";
    $sql .= " AND $col[2] < '" . $request['three_a'] . "' ";
    $sql .= " AND $col[3] > '" . $request['four_u'] . "' ";;
    $sql .= " AND $col[3] < '" . $request['four_a'] . "' ";;
    $sql .= " AND $col[4] > '" . $request['five_u'] . "' ";;
    $sql .= " AND $col[4] < '" . $request['five_a'] . "' ";;
    $sql .= " AND $col[5] > '" . $request['six_u'] . "' ";
    $sql .= " AND $col[5] < '" . $request['six_a'] . "' ";  
 
$query = mysqli_query($conn, $sql);

$totalData = mysqli_num_rows($query);

$totalFilter = $totalData;

$data = array();

while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    $subdata[] = $row[0]; //usefulep_plot_Id
    $subdata[] = $row[1]; //years
    $subdata[] = $row[2]; //layer
    $subdata[] = $row[3]; //species
    $subdata[] = $row[4]; //cover
    $subdata[] = $row[5]; //ep_plot_Id

    $data[] = $subdata;
}


$json_data=array(
    "data"  =>  $data
);

echo json_encode($json_data);


?>
