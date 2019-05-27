<?php

class CsvReader
{
    // CONSTRUCTORS

    function __construct($filePath, $delimiter = "\t")
    {
        // open
        $this->file = fopen($filePath, "r");

        $this->delimiter = $delimiter;
    }

    // FIELDS & PROPERTIES

    private $file;
    private $delimiter;

    // METHODS

    public function Dispose()
    {
        fclose($this->file);
    }

    public function ReadAll()
    {
        $data = array();

        while (($line = $this->ReadLine()) != null)
            array_push($data, $line);

        return $data;
    }

    public function ReadLine()
    {
        // - feof(): True until EOF (end of file) is reached
        if (!feof($this->file))
            // fgetcsv(): read line from the position of file pointer and separate line to fields
            return fgetcsv($this->file, 1000, $this->delimiter);
    }

    public function Print($data)
    {
        foreach ($data as $row) {

            // print_r($row);
            // echo "<br>";

            foreach ($row as $value)
                echo $value . " | ";

            echo '<br>';
        }
    }
}
