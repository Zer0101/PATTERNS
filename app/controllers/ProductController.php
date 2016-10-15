<?

class ProductController
{
	public $results = [];

	public function create()
	{
		$product = new Product();
		$this->results['product_creation'] = $product->create();
	}

	public function main() {

	}
}