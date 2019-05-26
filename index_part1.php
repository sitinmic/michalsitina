<!DOCTYPE html>
<html>
    
<head>
      <title> VISUALISATION Project </title>
      <link rel="stylesheet" href="resources/styles/styles.css" /> 
      <meta charset="utf-8"/>  
</head>

<body>

  <?php

  // =======================================================================
  // Preparing

  // Turn notices, warnings and errors into an ErrorException
  // - reset: restore_error_handler();
  set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($message, $severity, $severity, $file, $line);
  });

  $result = null; // Result of POST processing

  // Set the following configurations in php.ini file:
  //ini_set('max_execution_time', 300);
  //ini_set("upload_max_filesize" , "1000M");
  //ini_set("post_max_size","1000M");

  // =======================================================================
  // Parameters

  $serverName = 'localhost';
  $userName = 'root';
  $password = '';
  $dbName = 'visualisierung';

  // =======================================================================
  // POST request

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // wenn handleFile
    if ($_POST['action'] == 'handleFile') {
      require('resources/scripts/handleFile.php');
    }
    // wenn resetTable
    else if ($_POST['action'] == 'resetTable') {
      require('resources/scripts/resetTable.php');
    }
    // wenn refreshOverview
    else if ($_POST['action'] == 'refreshOverview') {
      require('resources/scripts/refreshOverview.php');
    }
      // wenn BackToQueryPage
      else if ($_POST['action'] == 'BackToQueryPage') {
            header("Location: resources/scripts/tables_plots.php"); 
           exit; 
      }
  }

  ?>
    
  <fieldset>
    <legend>Input</legend>

    <form action="index.php" method="post" enctype="multipart/form-data">
      <center>
           <input type="file" name="fileToUpload">
      </center>


      <br>
      <br>
        
      <center>
        <div style="width: 90%;  text-align: left;">

          <div style="width:25%; float: left;">
            <b>Database</b>
            <br>
            <input type="radio" name="green" value="forest" checked="checked">
            Forest
            <br>
            <input type="radio" name="green" value="grassland"> Grassland
            <br>
            <input type="radio" name="green" value="plots">
            Plots
            <br>
            <input type="radio" name="green" value="species"> Species
          </div>

          <div style="width: 25%;float: right;">
            <b>File</b>
            <br>
            <input type="checkbox" name="firstLine"> Ignore first line
            <br>
            Separator: <input type="text" name="delimiter" value="<?php echo (isset($delimiter) ? $delimiter : "\t"); ?>">
          </div>

          <div style="width: 25%;float: right;">
            <b>Primary key duplicates</b>
            <br>
            <input type="radio" name="reaction" value="ignore" checked="checked"> Ignore
            <br>
            <input type="radio" name="reaction" value="overwrite"> Overwrite
          
          </div>
            
             

          <div style="width: 25%;float: right;">
            <b>Errors</b>
            <br>
            <input type="radio" name="errors" value="display" checked="checked"> Display and stop after 100 errors
            <br>
            <input type="radio" name="errors" value="ignore"> Ignore and try to continue
          </div>

        </div>
      </center>

      <br>
    <center>
       <hr width="100%" size="7" color="lightblue" align="center" noshade>
       <div style="width: 80%;">
         <input type="submit" name="action" value="handleFile">

         <input type="submit" name="action" value="resetTable" class="button_all_delete"  onclick="return confirm('Are you sure to reset the entire table?')">

         <input type="submit" name="action" value="refreshOverview">
         <input type="submit" name="action" value="BackToQueryPage">
        </div>
      </center>
    </form>

  </fieldset>


  <hr width="100%" size="5" color="black" align="center" noshade>

  <fieldset>
    <legend>Results</legend>

    <div style="text-align: left;">
      <p><?php echo $result ?></p>
    </div>

  </fieldset>

</body>

</html>