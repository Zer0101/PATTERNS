<?

/**
 * Created by PhpStorm.
 * User: Sergiu
 * Date: 08.10.2016
 * Time: 12:51
 */
class MVC
{
	protected static $instance = null;
	public $controller = null;
	public $action = null;
	public $db = null;

	public static function app() {
		if (self::$instance === null)
			self::$instance = new self();

		return self::$instance;
	}

	public function run() {
		$this->controller = empty($_GET['module']) ? 'Main' : ucfirst($_GET['module']);
		$this->action = empty($_GET['action']) ? 'main' : $_GET['action'];

		$controllersPath = "app/controllers/{$this->controller}Controller.php";

		if (!is_file($controllersPath)) {
			$this->controller = "ErrorPage";
			$this->action = "e404";
		}
		$controllerName = "{$this->controller}Controller";
		if (!class_exists($controllerName)) {
			exit('Classa controller nu exista');
		}

		$controllerObject = new $controllerName;
		if (!method_exists($controllerObject, $this->action)) {
			$this->controller = "ErrorPage";
			$this->action = "e404";
			$controllerName = "{$this->controller}Controller";
			$controllerObject = new $controllerName;
		}
		$this->db = new DB();
		$this->db->connect();
		if(!$this->db->connection)
			die('DB ERROR');
		$controllerObject->{$this->action}();

		$viewPath = "views/{$this->controller}/{$this->action}.php";

		if (!is_file($viewPath)) {
			$viewPath = "views/{$this->controller}/main.php";
		}
		if(!empty($controllerObject->results))
			extract($controllerObject->results);
		require $viewPath;
	}

	public function __constructor() {



	}

	private function __clone() {

	}

	private function __wakeup() {

	}
}