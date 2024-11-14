<?php

class DatabaseConnection {
	private static $pdo = null;
	public static function connect() {
		if (self::$pdo === null) {
			try {
				self::$pdo = new PDO('sqlite:' . DATABASE_DIR);
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				error_log("Could not connect to the database: " . $e->getMessage());
				throw new Exception("Database connection failed: " . $e->getMessage());
			}
		}
		return self::$pdo;
	}
}

class DatabaseStatement {
	public $statement;
	private $pdo;
	
	public function __construct($statement){
		$this->statement = $statement;
		$this->pdo = DatabaseConnection::connect();
	}

	public function Operation($parameters) {
		$this->pdo = DatabaseConnection::connect();
		$stmt = $this->pdo->prepare($this->statement);
		
		if (str_starts_with(trim($this->statement), 'SELECT')) {
			$stmt->execute($parameters);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} elseif (
			str_starts_with(trim($this->statement), 'INSERT') || 
			str_starts_with(trim($this->statement), 'UPDATE') || 
			str_starts_with(trim($this->statement), 'DELETE') ||
			str_starts_with(trim($this->statement), 'BEGIN')) {
			return $stmt->execute($parameters);
		} else {
			throw new Exception("Unsupported query Type.");
		}
	}
	public function lastInsertId() {
        return $this->pdo->lastInsertId();  // Use PDO's built-in lastInsertId method
    }
}
/*
// SELECT example
$query = new DatabaseStatement("SELECT * FROM user WHERE id = :id");
$result = $query->Operation([':id' => 1]);
print_r($result);

// INSERT example
$query = new DatabaseStatement("INSERT INTO user (username, password) VALUES (:username, :password)");
$query->Operation([':username' => 'May', ':password' => 'password']);

// DELETE example
$query = new DatabaseStatement("DELETE FROM user WHERE id = :id");
$query->Operation([':id' => 1]);
*/