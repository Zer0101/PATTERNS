<?

interface Shape{
	public function draw();
}

class Circle implements Shape{
	public function draw()
	{
		echo "Start draw figure";
		echo "This is a circle";
	}
}

class Square implements Shape{
	public function draw()
	{
		echo "Start draw figure";
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

//Insarcinare: de restrictionat crearea obiectelor din acest context. Sa fie posibil de creat instantele clasei doar prin intermediul fabricii
$circle = new Circle();//ShapeFactory::getShape("circle");
$circle->draw();

$circle = ShapeFactory::getShape("square");
$circle->draw();