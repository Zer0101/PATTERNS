<?
class DB
{
	public $connection = null;
	/**
	 *
	 */
	public function insert()
	{
		return '*insert***';
	}

	/**
	 *
	 */
	public function connect()
	{
		return $this->connection = 'connected';

	}
}