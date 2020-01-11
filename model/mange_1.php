<?php

/**
 * Description of manage
 *
 * @author mimo
 */
class manage {

    private $tablename;
    public $link;

    // setting the defult table name .
    function __construct($table) {
        $connect = new db_connect;
        $this->link = $connect->connect();
        $this->tablename = $table;
    }

    // to change the defult table name .
    public function SetTable($value_data) {
        try {
            $this->tablename = $value_data;
        } catch (Exception $exc) {
            return $exc->getMessage('failed');
        }
    }

    // test function returns the current table name which in usage .
    public function CallTable() {
        return $this->tablename;
    }

    // to insert any data any where in database use insert function :: returns a Bollen T/F.
    public function insert($data_array) {

        $link = $this->link;
        $table_name = $this->tablename;
        $k = implode(',', array_keys($data_array));
        $v = "'" . implode("','", array_values($data_array)) . "'";
        try {
            $data = "INSERT INTO $table_name ($k) VALUES($v)";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

    //counting any selected data from database :: returns an Integer number .
    public function count($cols_array, $ids = NULL) {
        $link = $this->link;
        $table_name = $this->tablename;
        $cols = implode(',', $cols_array);
        if ($ids != NULL) {
            try {
                $ids = "id='" . implode("' || id='", $ids) . "'";
                $data = "SELECT $cols FROM $table_name WHERE $ids";
                $sql = mysqli_query($link, $data);
                return mysqli_affected_rows($link);
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        } else {
            try {
                $data = "SELECT $cols FROM $table_name";
                $sql = mysqli_query($link, $data);
                return mysqli_affected_rows($link);
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        }
    }

    // just a private nested function helping search function .
    private function callsearch($data_array) {
        $k = array_keys($data_array);
        $v = array_values($data_array);
        $n = count($data_array);
        $u = array();
        for ($i = 0; $i < $n; $i++) {
            if (($n - $i) > 1) {
                $u[$i] = "$k[$i] LIKE '%$v[$i]%' ||";
            } else {
                $u[$i] = "$k[$i] LIKE '%$v[$i]%'";
            }
        }
        $result = implode(" ", $u);
        return $result;
    }

    // search any where in datababe :: retruns mta if print is activated and count results and returns an Integer if deactivated  .
    public function search($select_array, $data_array, $print = FALSE) {
        $link = $this->link;
        $table_name = $this->tablename;
        $s = $this->callsearch($data_array);
        $k = implode(',', $select_array);
        if ($print != FALSE) {
            try {
                $data = "SELECT $k FROM $table_name WHERE $s";
                $sql = mysqli_query($link, $data);
                $n = mysqli_affected_rows($link);
                for ($i = 0; $i < $n; $i++) {
                    $row[$i] = mysqli_fetch_array($sql);
                }
                return $row;
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        } else {
            try {
                $data = "SELECT $k FROM $table_name WHERE $s";
                $sql = mysqli_query($link, $data);
                return mysqli_affected_rows($link);
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        }
    }

    // fetching any data from any where in database and makes them ready to use and print :: returns mta.
    public function fetch($cols_array, $ids = NULL) {
        $link = $this->link;
        $table_name = $this->tablename;
        $cols = implode(',', $cols_array);
        if ($ids != NULL) {
            try {
                $ids = "id='" . implode("' || id='", $ids) . "'";
                $data = "SELECT $cols FROM $table_name WHERE $ids";
                $sql = mysqli_query($link, $data);
                $n = mysqli_affected_rows($link);
                for ($i = 0; $i < $n; $i++) {
                    $row[$i] = mysqli_fetch_array($sql);
                }
                return $row;
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        } else {
            try {
                $data = "SELECT $cols FROM $table_name";
                $sql = mysqli_query($link, $data);
                $n = mysqli_affected_rows($link);
                for ($i = 0; $i < $n; $i++) {
                    $row[$i] = mysqli_fetch_array($sql);
                }
                return $row;
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        }
    }

    // just a private nested function.
    private function callupdate($data_array) {
        $k = array_keys($data_array);
        $v = array_values($data_array);
        $n = count($data_array);
        $u = array();
        for ($i = 0; $i < $n; $i++) {
            $u[$i] = "$k[$i]='$v[$i]'";
        }
        $result = implode(" ", $u);
        return $result;
    }

    // updateing any data any where in database .
    public function update($data_array, $ids = NULL) {
        $link = $this->link;
        $table_name = $this->tablename;
        if ($ids != NULL) {
            try {
                $ids = "id='" . implode("' || id='", $ids) . "'";
                $up = $this->callupdate($data_array);
                $data = "UPDATE $table_name SET $up WHERE $ids";
                $sql = mysqli_query($link, $data);
                return mysqli_affected_rows($link);
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        } else {
            try {
                $up = $this->callupdate($data_array);
                $data = "UPDATE $table_name SET $up";
                $sql = mysqli_query($link, $data);
                return mysqli_affected_rows($link);
            } catch (Exception $exc) {
                return $exc->mysqli_errno($link);
            }
        }
    }

    //deleting data from anywhere in database
    public function delete($ids) {
        $link = $this->link;
        $table_name = $this->tablename;
        try {
            $ids = "id='" . implode("' || id='", $ids) . "'";
            $data = "DELETE FROM $table_name WHERE $ids";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

}
