<?php

class DB
{

    public $pdo;

    public function __construct()
    {
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASSW);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql)
    {
        $q = $this->pdo->query($sql);
        if (!$q) {
            return;
        }
        $data = $q->fetchAll();
        return $data;
    }

    public function execute($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function select_all($tableName, $columns = [], $perPage = null, $page = null)
    {
        $query = 'SELECT ';
        $strCol = implode(',', $columns);
        $query .= $strCol . ' FROM ' . $tableName;

        if ($perPage !== null && $page !== null) {
            $offset = ($page - 1) * $perPage;
            $query .= ' LIMIT ' . $perPage . ' OFFSET ' . $offset;
        }

        $stmt = $this->pdo->query($query);
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultArray;
    }

    public function select_one(string $tableName, int $id, array $columns = [])
    {
        $strCol = implode(',', $columns);
        $query = "SELECT $strCol FROM $tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultArray;
    }

    public function delete_one($tableName, $id)
    {
        $query = "DELETE FROM $tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $rowsAffected = $stmt->rowCount();

        return $rowsAffected;
    }

    public function update_one(string $tableName, int $id, array $columns = [])
    {
        $setStr = '';
        foreach ($columns as $colName => $colValue) {
            $setStr .= "$colName = :$colName,";
        }
        $setStr = rtrim($setStr, ',');

        $query = "UPDATE $tableName SET $setStr WHERE id = :id";
        $columns['id'] = $id;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($columns);
        $rowsAffected = $stmt->rowCount();

        return $rowsAffected;
    }

    public function insert_one($tableName, $columns = [])
    {
        $colNames = implode(',', array_keys($columns));
        $colPlaceholders = implode(',', array_fill(0, count($columns), '?'));

        $query = "INSERT INTO $tableName ($colNames) VALUES ($colPlaceholders)";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array_values($columns));
        $lastId = $this->pdo->lastInsertId();

        return $lastId;
    }
}


class DBManager
{
    protected $db;
    protected $columns;
    protected $tableName;
    protected $pdo;

    public function __construct()
    {
        $this->db = new DB();
        $this->pdo = $this->db->pdo;
    }

    public function get($id)
    {
        $resultArr = $this->db->select_one($this->tableName, (int)$id, $this->columns);
        return (object) $resultArr;
    }

    public function getAll($perPage = null, $page = null)
    {
        $results = $this->db->select_all($this->tableName, $this->columns, $perPage, $page);
        $objects = array();
        foreach ($results as $result) {
            array_push($objects, (object)$result);
        }
        return $objects;
    }

    public function filter($search)
{
    $query = "SELECT * FROM {$this->tableName} WHERE name LIKE :search";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $objects = array();
    foreach ($results as $result) {
        array_push($objects, (object)$result);
    }
    return $objects;
}


    public function create($obj)
    {
        $newId = $this->db->insert_one($this->tableName, (array)$obj);
        return $newId;
    }

    public function delete($id)
    {
        $rowsDeleted = $this->db->delete_one($this->tableName, (int)$id);
        return (int) $rowsDeleted;
    }

    public function update($obj, $id)
    {
        $rowsUpdated = $this->db->update_one($this->tableName, (int)$id, (array)$obj);
        return (int) $rowsUpdated;
    }
}
