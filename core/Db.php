<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 11:52
 */
class Db
{
    public $stat;
    private $settings;
    private $connect;
    private $defaults;
    public $query;
    public $table;

    function __construct($data = [])
    {
        $config = new Config();
        $this->defaults = $config->db();
        $this->settings = array_merge($this->defaults, $data);
        $this->connect = mysqli_connect($this->settings['host'], $this->settings['user'], $this->settings['pass'], $this->settings['db']);
        if (!$this->connect) {
            printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        } else {
            mysqli_set_charset($this->connect, "utf8");
        }
    }

    /**
     * @param string $query
     * @return array|bool
     */
    public function rawQuery($query)
    {
        $start = microtime(TRUE);
        $result = mysqli_query($this->connect, $query);
        $timer = microtime(TRUE) - $start;
        $this->stat[] = array(
            'query' => $query,
            'start' => $start,
            'timer' => $timer,
        );
        if ($result) {
            if (is_object($result)) {
                $arr = $this->getArray($result);
                $this->free($result);
            } else {
                $arr = true;
            }
            return $arr;
        } else {
            return false;
        }
    }

    /**
     * @param string $query
     * @return array|bool
     */
    public function getAll($query)
    {
        return $this->rawQuery($query);
    }

    /**
     * @param string $query
     * @return bool
     */
    public function getOne($query)
    {
        $res = $this->rawQuery($query);
        if (!empty($res)) {
            return $res[0];
        } else {
            return false;
        }
    }

    /**
     * @param int $id
     * @param string $table
     * @return bool
     */

    public function getFromId($id, $table)
    {
        $query = "SELECT * FROM `$table` WHERE id = $id";
        return $this->getOne($query);
    }

    /**
     * @param string $field
     * @param string|integer $value
     * @param string $table
     * @return array|bool
     */
    public function getByField($field, $value, $table)
    {
        $query = "SELECT * FROM `$table` WHERE ";
        if (is_int($value)) {
            $query .= "$field = $value";
        } else {
            $query .= "$field LIKE '%$value%'";
        }
        return $this->rawQuery($query);
    }

    /**
     * Проверяет существуют ли данные в таблице
     * @param array $data
     * @param string $table
     * @return bool|int|string
     */
    public function insert($data, $table)
    {
        if (!empty($data)) {
            $query = "INSERT INTO `$table` ";
            $key = "(";
            $value = "(";
            foreach ($data as $k => $v) {
                $key .= $k . ",";
                if (is_int($v)) {
                    $value .= $v . ",";
                } else {
                    $value .= "'" . $v . "',";
                }
            }
            $key = substr($key, 0, -1);
            $value = substr($value, 0, -1);
            $key .= ")";
            $value .= ")";
            $query .= $key . "VALUES" . $value;
            if ($this->rawQuery($query)) {
                return mysqli_insert_id($this->connect);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $data array данные которые необходимо обновить
     * @param $table string
     * @param $where array
     * @return array|bool
     */
    public function update($data, $table, $where)
    {
        if (!empty($data)) {
            $query = "UPDATE `$table` SET";
            foreach ($data as $k => $v) {
                if (is_int($v)) {
                    $query .= " $k = $v,";
                } else {
                    $query .= " $k = '$v',";
                }
            }
            $query = substr($query, 0, -1);
            $query .= " WHERE";
            foreach ($where as $k => $v) {
                if ($k == 'id') {
                    $query .= " $k = $v";
                } else {
                    if (is_int($v)) {
                        $query .= " $k = $v";
                    } else {
                        $query .= " $k LIKE '%$v%'";
                    }
                }
                $query .= " AND";
            }
            $query = substr($query, 0, -3);
            //var_dump($query);
            return $this->rawQuery($query);
        }
    }

    /**
     * @param object $result
     */
    public function free($result)
    {
        mysqli_free_result($result);
    }


    public function getRow()
    {
    }

    /**
     * @param object $res
     * @return array
     */
    private function getArray($res)
    {
        $arr = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        return $arr;
    }

    /**
     * @param string $table
     * @param int $id
     * @return array|bool
     */
    public function queryDelete($table, $id)
    {
        $query = "DELETE FROM `$table` WHERE id=$id";
        return $this->rawQuery($query);
    }

    /**
     * @param string $table
     * @param string $field
     * @param int|string $value
     * @return array|bool
     */
    public function queryDeleteByField($table, $field, $value)
    {
        $query = "DELETE FROM `$table` WHERE `$field` = '$value'";
        return $this->rawQuery($query);;
    }

    /**
     * @param array $where
     * @param string $table
     * @param bool $direct
     * @return mixed
     */
    public function _isset($where, $table, $direct = false)
    {
        $query = "SELECT COUNT(*) as count FROM `$table` ";
        $query .= " WHERE";
        foreach ($where as $k => $v) {
            if ($k == 'id') {
                $query .= " $k = $v";
            } else {
                if (is_int($v)) {
                    $query .= " $k = $v";
                } else {
                    if ($direct) {
                        $query .= " $k LIKE '$v'";
                    } else {
                        $query .= " $k LIKE '%$v%'";
                    }
                }
            }
            $query .= " AND";
        }
        //var_dump($query);
        $query = substr($query, 0, -3);
        //prn($query);
        $isset = $this->rawQuery($query);
        return $isset[0]['count'];
    }


    /**
     * @param array $data
     * @param string $table
     * @param bool $direct
     * @return array|bool
     * Поиск по БД
     */
    public function getWhere($data, $table, $direct = false)
    {
        $query = "SELECT * FROM `$table` ";
        $query .= " WHERE";
        foreach ($data as $k => $v) {
            if ($k == 'id') {
                $query .= " $k = $v";
            } else {
                if (is_int($v)) {
                    $query .= " $k = $v";
                } else {
                    if ($direct) {
                        $query .= " $k LIKE '$v'";
                    } else {
                        $query .= " $k LIKE '%$v%'";
                    }
                }
            }
            $query .= " AND";
        }
        //var_dump($query);
        $query = substr($query, 0, -3);
        $res = $this->rawQuery($query);
        //prn($res);
        return $res;
    }

    public function find($table, $select)
    {
        $this->table = $table;
        $this->query = "SELECT " . $select . " FROM `$table`";
        return $this;
    }

    public function where($data, $direct = false)
    {
        $this->query .= " WHERE";
        foreach ($data as $k => $v) {
            if ($k == 'id') {
                $this->query .= " $k = $v";
            } else {
                if (is_int($v)) {
                    $this->query .= " $k = $v";
                } else {
                    if ($direct) {
                        $this->query .= " $k LIKE '$v'";
                    } else {
                        $this->query .= " $k LIKE '%$v%'";
                    }
                }
            }
            $this->query .= " AND";
        }
        //var_dump($query);
        $this->query = substr($this->query, 0, -3);
        return $this;
    }

}