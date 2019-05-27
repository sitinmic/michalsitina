<?php

class TableScheme
{
    // CONSTRUCTORS

    function __construct($columnNames, $pks)
    {
        if (count($columnNames) != count($pks))
            throw new Exception("Invalid column count.");

        $this->columnNames = $columnNames;
        $this->pks = $pks;
    }

    // FIELDS & PROPERTIES

    private $columnNames;
    private $pks;
    private $values;

    // METHODS

    public function SetValues($values)
    {
        if (count($this->columnNames) != count($values))
            throw new Exception("Invalid column count..");

        $this->values = $values;
    }

    public function GetWhere()
    {
        $result = null;

        for ($i = 0; $i < count($this->columnNames); $i++) {

            if ($this->pks[$i] == true) {

                if ($result != null)
                    $result = $result . ' and ';

                $result = $result . $this->columnNames[$i] . ' = ' . "'" . $this->values[$i] . "'";
            }
        }

        return $result;
    }

    public function GetSet()
    {
        $result = null;

        for ($i = 0; $i < count($this->columnNames); $i++) {

            if ($this->pks[$i] != true) {

                if ($result != null)
                    $result = $result . ',';

                $result = $result . $this->columnNames[$i] . ' = ' . "'" . $this->values[$i] . "'";
            }
        }

        return $result;
    }

    public function GetValues()
    {
        $result = null;

        for ($i = 0; $i < count($this->columnNames); $i++) {

            if ($i > 0)
                $result = $result . ',';

            $result = $result . "'" . $this->values[$i] . "'";
        }

        return $result;
    }
}
