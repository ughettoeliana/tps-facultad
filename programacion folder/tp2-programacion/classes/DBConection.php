<?php

// use PDO;
// use Exception;

class DBConection
{

	public const DB_HOST = '127.0.0.1';
	public const DB_USER = 'root';
	public const DB_PASS = '';
	public const DB_BASE = 'dw3_degregorio_ughetto';
	public const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_BASE . ';charset=utf8mb4';

	protected PDO $db;

	public function __construct()
	{
		try {

			$this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e) {
			echo "¡Error! We couldn't connect to  MySQL";
			echo "Error: " . $e->getMessage();
			exit;
		}
	}

	public function getConection(): PDO
	{
		return $this->db;
	}
}
?>