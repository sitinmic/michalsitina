<?php

require('resources/scripts/DBTable.php');

// =======================================================================
// Parameters

$tableNames = array('plots','species','forest','grassland');

try {
    foreach ($tableNames as $tableName) {
        // =======================================================================
        // Preparing

        $dbTable = new DBTable($serverName, $userName, $password, $dbName, $tableName);

        // =======================================================================
        // Handle file

        $count = $dbTable->Count();

        $updateTime = $dbTable->Query(
            "SELECT UPDATE_TIME
            FROM information_schema.tables
            WHERE TABLE_SCHEMA = '$dbName'
            AND TABLE_NAME = '$tableName'"
        )->fetch()[0]; // (UPDATE_TIME is not always exact)

        // =======================================================================
        // Postprocessing

        $dbTable->Dispose();

        $result = $result . "<br><br>'$tableName': Count $count, UpdateTime $updateTime.";
    }
} catch (Exception $ex) {

    $result = '<br><br>ERROR: ' . $ex->getMessage();
}
