<?
class Singleton
{
	protected static $instance = null;

	protected function __construct()
	{
		//Constructorul nu este necesar!
	}

	protected function __clone()
	{
		//Interzicem crearea clonelor
	}

	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new Singleton();
		}
		return self::$instance;
	}
}

$o1 = Singleton::getInstance();
$o2 = Singleton::getInstance();


$o1->p1 = 2;
$o2->p1 = 5;

echo "<pre>";
var_dump($o1);
echo "</pre>";


echo "<pre>";
var_dump($o2);
echo "</pre>";