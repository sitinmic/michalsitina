<?php

class DBTable
{
    // CONSTRUCTORS

    function __construct($serverName, $userName, $password, $dbName, $tableName)
    {
        // connect to MySQL (PDO)
        // - PHP-Extension php_pdo_mysql.dll necessary
        $this->conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        //$this->conn = mysqli_connect("localhost", "root", "", "VISUALISIERUNG");
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->tableName = $tableName;
    }

    // FIELDS & PROPERTIES

    private $conn;
    private $tableName;

    // METHODS

    function Dispose()
    {
        $conn = null;
    }

    public function Print($result)
    {
        if ($result->rowCount() > 0) {
            // output data of each row
            while ($row = $result->fetch()) {
                foreach ($row as $value)
                    echo $value . " | ";
                echo '<br>';
            }
        } else {
            echo "0 results";
        }
    }

    public function Select($where = null)
    {
        $sql = "SELECT * FROM $this->tableName" . ($where ? " where $where" : null);

        return $this->conn->query($sql);
    }

    function Count($where = null)
    {
        return $this->Select($where)->rowCount();
    }

    function Delete($where = null)
    {
        $sql = "DELETE FROM $this->tableName" . ($where ? " where $where" : null);

        return $this->conn->exec($sql);
    }

    function Insert($values)
    {
        $sql = "INSERT INTO $this->tableName VALUES($values)";

        return $this->conn->exec($sql);
    }

    function Update($set, $where = null)
    {
        $sql = "UPDATE $this->tableName SET $set" . ($where ? " where $where" : null);

        return $this->conn->exec($sql);
    }

    function Query($sql)
    {
        return $this->conn->query($sql);
    }
}
