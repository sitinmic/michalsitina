<?php

require('resources/scripts/DBTable.php');

// =======================================================================
// Parameters

$tableName = $_POST['green'];

try {
    // =======================================================================
    // Preparing

    $dbTable = new DBTable($serverName, $userName, $password, $dbName, $tableName);

    // =======================================================================
    // Reset table

    $result = $dbTable->Delete();

    // =======================================================================
    // Postprocessing

    $dbTable->Dispose();

    $result = "<br><br>RESULT: $result rows removed from table '$tableName'.";
} catch (Exception $ex) {

    $result = '<br><br>ERROR: ' . $ex->getMessage();
}
