<?

class DB{
	public function insert()
	{
		echo "MYSQL insert";
		//mysqli_query("Insert into ....");
	}

	public function update()
	{
		mysqli_query("update");
	}

	public function select()
	{
		mysqli_query("select");
	}

	public function delete()
	{
		mysqli_query("delete");
	}
}

class Catalog
{
	/**
	 * @property DB $db
	 */
	protected $db = null;


	public function __construct($db)
	{
		$this->db = $db;
	}

	public function create($data)
	{
		echo "Insert: " . $data;
		$this->db->insert($data);
	}

	public function read()
	{

	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}

$db = new DB();

$catalog = new Catalog($db);

$catalog->create("test");
$catalog->read();
$catalog->delete();