<?
class Database {

	private static $instances = array();

	private function __construct() { }

	public static function getInstance($key) {

		if(!array_key_exists($key, self::$instances)) {
			self::$instances[$key] = new self();
		}

		return self::$instances[$key];
	}

	private function __clone() { }

}

$master = Database::getInstance('master');
var_dump($master); // object(Database)#1 (0) { }

$slave = Database::getInstance('slave');
var_dump($slave); // object(Database)#2 (0) { }

