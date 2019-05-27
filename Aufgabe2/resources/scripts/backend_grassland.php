
<?php
require "include/connection.php";

$request = $_REQUEST;

$table = $request['table'];

$col = array(
    '0'   =>  'plot_Id',
    '1'   =>  'years',
    '2'   =>  'ep_plot_Id',
    '3'   =>  'usefulep_plot_Id',
    '4'   =>  'species',
    '5'   =>  'cover'
);  //create column like table in database

$sql = "SELECT * FROM $table WHERE 1=1 ";

   
    $sql .= " AND $col[0] > '" . $request['one_u'] . "' ";
    $sql .= " AND $col[0] < '" . $request['one_a'] . "' ";
    $sql .= " AND $col[1] > " . $request['two_u'];
    $sql .= " AND $col[1] < " . $request['two_a'];
    $sql .= " AND $col[2] > '" . $request['three_u'] . "' ";
    $sql .= " AND $col[2] < '" . $request['three_a'] . "' ";
    $sql .= " AND $col[3] > '" . $request['four_u'] . "' ";
    $sql .= " AND $col[3] < '" . $request['four_a'] . "' ";
    $sql .= " AND $col[4] > '" . $request['five_u'] . "' ";
    $sql .= " AND $col[4] < '" . $request['five_a'] . "' ";
    $sql .= " AND $col[5] > " . $request['six_u'];
    $sql .= " AND $col[5] < " . $request['six_a'];  
 
$query = mysqli_query($conn, $sql);

$totalData = mysqli_num_rows($query);

$totalFilter = $totalData;

$data = array();

while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    $subdata[] = $row[0]; //plot_Id
    $subdata[] = $row[1]; //years
    $subdata[] = $row[2]; //ep_plot_Id
    $subdata[] = $row[3]; //usefulep_plot_Id
    $subdata[] = $row[4]; //species
    $subdata[] = $row[5]; //cover

    $data[] = $subdata;
}


$json_data=array(
    "data"  =>  $data
);

echo json_encode($json_data);


?>
