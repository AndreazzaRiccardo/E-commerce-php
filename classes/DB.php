<?php

/**
 * Classe principale del database
 */
class DB
{
    public $pdo;

    public function __construct()
    {
        // Configura il Dsn su variabili globali
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASSW);
        // Modalità errori
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Esegue una query SQL generica
     *
     * @param string $sql Query SQL
     * @return array|null Dati risultanti dalla query, o null se la query fallisce
     */
    public function query($sql)
    {
        $q = $this->pdo->query($sql);
        if (!$q) {
            return null;
        }
        $data = $q->fetchAll();
        return $data;
    }

    /**
     * Esegue una query SQL preparata
     *
     * @param string $sql La query SQL da eseguire
     */
    public function execute($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    /**
     * Seleziona tutti i record da una tabella con paginazione opzionale
     *
     * @param string $tableName Nome della tabella
     * @param array $columns Colonne selezionate
     * @param int|null $perPage Numero record per pagina (opzionale)
     * @param int|null $page Numero pagina corrente (opzionale)
     * @return array Dati risultanti
     */
    public function select_all($tableName, $columns = [], $perPage = null, $page = null)
    {
        $query = 'SELECT ';
        $strCol = implode(',', $columns);
        $query .= $strCol . ' FROM ' . $tableName;

        // Aggiunge paginazione se specificata
        if ($perPage !== null && $page !== null) {
            $offset = ($page - 1) * $perPage;
            $query .= ' LIMIT ' . $perPage . ' OFFSET ' . $offset;
        }

        $stmt = $this->pdo->query($query);
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultArray;
    }

    /**
     * Seleziona un singolo record per ID
     *
     * @param string $tableName Nome della tabella
     * @param int $id ID record
     * @param array $columns Colonne selezionate
     * @return array Record selezionato
     */
    public function select_one(string $tableName, int $id, array $columns = [])
    {
        $strCol = implode(',', $columns);
        $query = "SELECT $strCol FROM $tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        
        // Fetch di un singolo risultato
        $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultArray;
    }

    /**
     * Elimina un singolo record per ID
     *
     * @param string $tableName Nome della tabella
     * @param int $id ID record
     * @return int Numero righe eliminate
     */
    public function delete_one($tableName, $id)
    {
        $query = "DELETE FROM $tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        $rowsAffected = $stmt->rowCount();

        return $rowsAffected;
    }

    /**
     * Aggiorna un singolo record per ID
     *
     * @param string $tableName Nome della tabella
     * @param int $id ID record
     * @param array $columns Dati da aggiornare (colonna => valore)
     * @return int Numero righe aggiornate
     */
    public function update_one(string $tableName, int $id, array $columns = [])
    {
        $setStr = '';
        foreach ($columns as $colName) {
            $setStr .= "$colName = :$colName,";
        }
        // Rimuove la virgola finale
        $setStr = rtrim($setStr, ',');

        $query = "UPDATE $tableName SET $setStr WHERE id = :id";
        $columns['id'] = $id;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($columns);

        $rowsAffected = $stmt->rowCount();

        return $rowsAffected;
    }

    /**
     * Inserisce un nuovo record in una tabella
     *
     * @param string $tableName Nome tabella
     * @param array $columns Dati da inserire (colonna => valore)
     * @return int ID record inserito
     */
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

    /**
     * Filtra i record in base a una ricerca
     *
     * @param string $tableName Nome della tabella
     * @param string $search Termine di ricerca
     * @param array $columns Colonne selezionate (opzionale)
     * @return array Risultati filtrati
     */
    public function filter($tableName, $search, $columns = [])
    {
        $strCol = $columns ? implode(',', $columns) : '*';
        $query = "SELECT $strCol FROM $tableName WHERE name LIKE :search";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':search', "%$search%");
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}

// Gestore operazioni database

/**
 * Classe DBManager per gestire le operazioni sul database
 */
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

    /**
     * Recupera un singolo record per ID
     *
     * @param int $id ID del record
     * @return object Il record selezionato come oggetto
     */
    public function get($id)
    {
        $resultArr = $this->db->select_one($this->tableName, (int)$id, $this->columns);
        return (object) $resultArr;
    }

    /**
     * Recupera tutti i record con paginazione (opzionale)
     *
     * @param int|null $perPage Numero record per pagina (opzionale)
     * @param int|null $page Numero pagina corrente (opzionale)
     * @return array Gli oggetti risultanti dalla query
     */
    public function getAll($perPage = null, $page = null)
    {
        $results = $this->db->select_all($this->tableName, $this->columns, $perPage, $page);
        $objects = array();
        foreach ($results as $result) {
            array_push($objects, (object)$result);
        }
        return $objects;
    }

    /**
     * Filtra i record in base a una ricerca
     *
     * @param string $search Termine di ricerca
     * @return array Risultato query
     */
    public function filter($search)
    {
        $results = $this->db->filter($this->tableName, $search, $this->columns);
        $objects = array();
        foreach ($results as $result) {
            array_push($objects, (object)$result);
        }
        return $objects;
    }

    /**
     * Crea un nuovo record
     *
     * @param object $obj L'oggetto con i dati da inserire
     * @return int ID record creato
     */
    public function create($obj)
    {
        $newId = $this->db->insert_one($this->tableName, (array)$obj);
        return $newId;
    }

    /**
     * Elimina un record per ID
     *
     * @param int $id ID del record da eliminare
     * @return int Numero righe eliminate
     */
    public function delete($id)
    {
        $rowsDeleted = $this->db->delete_one($this->tableName, (int)$id);
        return (int) $rowsDeleted;
    }

    /**
     * Aggiorna un record per ID
     *
     * @param object $obj L'oggetto con i dati da aggiornare
     * @param int $id ID del record da aggiornare
     * @return int Numero di righe aggiorante
     */
    public function update($obj, $id)
    {
        $rowsUpdated = $this->db->update_one($this->tableName, (int)$id, (array)$obj);
        return (int) $rowsUpdated;
    }
}
