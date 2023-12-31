
    <?php

  class Database {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pwd = '';
    private $db_name = 'ticket_manager';

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      // Set DSN
      $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try {
        $this->dbh = new PDO($dsn, $this->db_user, $this->db_pwd, $options);
        
        
      } catch(PDOException $e) {
          $this->error = $e->getMessage();
          die("Connection failed: " . $this->error);
      }
    }

    // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
      return $this->stmt->execute();
    }

    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function resultassoc(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    public function endTransaction()
    {
        return $this->dbh->commit();
    }

    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }

    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }
  }
  ?>