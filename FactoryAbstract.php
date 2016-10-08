<?

abstract class Shape{
	public function draw(){
		echo "Start draw figure";
	}
}

class Circle extends Shape{
	public function draw()
	{
		parent::draw();
		echo "This is a circle";
	}
}

class Square extends Shape{
	public function draw()
	{
		parent::draw();
		echo "This is a square";
	}
}

abstract class ShapeFactory
{
	public static function getShape($shapeName){
		$className = ucfirst($shapeName);
		if(class_exists($className))
			return new $className;
		else
			return null;

	}
}

$circle = ShapeFactory::getShape("circle");
$circle->draw();

$circle = ShapeFactory::getShape("square");
$circle->draw();