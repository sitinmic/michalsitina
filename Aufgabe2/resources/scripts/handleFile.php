<?php

require('resources/scripts/DBTable.php');
require('resources/scripts/TableScheme.php');
require('resources/scripts/CsvReader.php');

// =======================================================================
// Parameters

$filePath = $_FILES["fileToUpload"]["tmp_name"];
$updateExisting = $_POST['reaction'] == 'overwrite';
$displayError = $_POST['errors'] == 'display';
$ignoreFirstLine = isset($_POST['firstLine']);
$tableName = $_POST['green'];
$delimiter = $_POST['delimiter'];

try {
    // =======================================================================
    // Preparing

    // create csvReader
    $csvReader = new CsvReader($filePath, $delimiter);
    // $csvReader->Print($csvReader->ReadAll());

    // create dbTable
    $dbTable = new DBTable($serverName, $userName, $password, $dbName, $tableName);
    // $dbTable->Print($dbTable->Select());

    // create tableScheme
    // - set column headings and primary keys
    switch ($tableName) {
        case 'plots':

            $tableScheme = new TableScheme(
                array("plot_Id", "ep_plot_Id", "exploratory", "latitude", "longitude", "landuse"),
                array(false, true, false, false, false, false)
            );
            break;

        case 'species':

            $tableScheme = new TableScheme(
                array("lat_sci_name", "eng_name", "ger_name", "kinkdom", "phylum", "classes", "orders", "family", "genus"),
                array(true, false, false, false, false, false, false, false, false)
            );
            break;

        case 'forest':

            $tableScheme = new TableScheme(
                array("usefulep_plot_Id", "years", "layer", "species", "cover", "ep_plot_Id"),
                array(false, true, true, true, false, true)
            );
            break;

        case 'grassland':

            $tableScheme = new TableScheme(
                array("plot_Id", "years", "ep_plot_Id", "usefulep_plot_Id", "species", "cover"),
                array(false, true, true, false, true, false)
            );
            break;

        default:
            throw new Exception("Not handled table '$tableName'");
    }

    // =======================================================================
    // Handle file

    $existingCount = 0;
    $insertCount = 0;
    $errorCount = 0;
    $omittedCount = 0;

    // if ignoring first line
    if ($ignoreFirstLine) {
        $csvReader->ReadLine();
        $omittedCount++;
    }

    // enumerate lines
    while (true) {

        try {
            // read next line
            $line = $csvReader->ReadLine();

            // if end of file
            if ($line == null)
                break;

            // if many errors, then stop
            if ($displayError && $errorCount > 100) {
                $result = $result . "<br><br>MORE THAN 100 ERRORS. PROCESS STOPPED.";
                break;
            }

            // set values in TableScheme
            $tableScheme->SetValues($line);

            try {
                // try to insert
                $dbTable->Insert($tableScheme->GetValues());

                $insertCount++;
            } catch (Exception $ex) {
                // if existing
                if ($dbTable->Count($tableScheme->GetWhere()) > 0) {

                    // if update existing
                    if ($updateExisting)
                        // update
                        $dbTable->Update($tableScheme->GetSet(), $tableScheme->GetWhere());

                    $existingCount++;
                }
                // else error
                else
                    throw $ex;
            }
        } catch (Exception $ex) {
            $errorCount++;

            if ($displayError)
                $result = $result
                    . '<br><br>Error in line '
                    . ($existingCount + $insertCount + $errorCount + $omittedCount)
                    . " of file '"
                    . basename($_FILES["fileToUpload"]["name"])
                    . "': "
                    . $ex->getMessage();
        }
    }

    // =======================================================================
    // Postprocessing

    $csvReader->Dispose();
    $dbTable->Dispose();

    $result = $result . "<br><br>RESULT: $insertCount Inserted, $existingCount " . ($updateExisting ? "Updated" : "Ignored") . ", $errorCount Errors (Table: '$tableName').";
} catch (Exception $ex) {

    $result = '<br><br>ERROR: ' . $ex->getMessage();
}
