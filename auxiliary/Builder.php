<?

class Phone
{
	private $_name;
	private $_os;

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function setOs($os)
	{
		$this->_os = $os;
	}


}

abstract class BuilderPhone
{
	protected $_phone;

	public function getPhone()
	{
		return $this->_phone;
	}

	public function createPhone()
	{
		$this->_phone = new Phone();
	}

	abstract public function buildName();

	abstract public function buildOs();
}

class BuilderNexus6 extends BuilderPhone
{
	public function buildName()
	{
		$this->_phone->setName('Nexus6');
	}

	public function buildOs()
	{
		$this->_phone->setOs("Android");
	}
}

class BuilderIphone7 extends BuilderPhone
{
	public function buildName()
	{
		$this->_phone->setName('Iphone7');
	}

	public function buildOs()
	{
		$this->_phone->setOs("iOs");
	}
}

class Chooser
{
	private $_builderPhone;

	public function setBuilderPhone(BuilderPhone $mp)
	{
		$this->_builderPhone = $mp;
	}

	public function getPhone()
	{
		return $this->_builderPhone->getPhone();
	}

	public function constructPhone()
	{
		$this->_builderPhone->createPhone();
		$this->_builderPhone->buildName();
		$this->_builderPhone->buildOs();
	}
}

$chooser = new Chooser();
$google = new BuilderNexus6();
$apple = new BuilderIphone7();
$chooser->setBuilderPhone($google);
$chooser->constructPhone();
$realPhone = $chooser->getPhone();
echo "<pre>";
var_dump($realPhone);
echo "</pre>";