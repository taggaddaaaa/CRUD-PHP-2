<?php
//class Database
//{
//	private static $dbName = 'arnallight';
//	private static $dbHost = 'localhost';
//	private static $dbUsername = 'root';
//	private static $dbUserPassword = 'root';
//
//	private static $cont = null;
//
//	public function __construct() {
//		die('Fonction Init non autorisée');
//	}
//
//	public static function connect() {
//		// Autoriser une seule connexion pour toute la durée de l’accès
//		if ( null == self::$cont )
//		{
//			try
//			{
//				self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
//			}
//			catch(PDOException $e)
//			{
//				die($e->getMessage());
//			}
//		}
//		return self::$cont;
//	}
//
//	public static function disconnect()
//	{
//		self::$cont = null;
//	}
//}


// used to connect to the database
$host = "localhost";
$db_name = "arnallight";
$username = "root";
$password = "root";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}

// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
