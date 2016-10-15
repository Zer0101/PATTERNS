<?

class Product
{
	protected $db = null;

	/**
	 * Product constructor.
	 * @param DB $db
	 */
	public function __construct(DB $db)
	{
		$this->db = $db;
	}

	public function create(){

		return "PRODUCT_CREATED";
	}
}