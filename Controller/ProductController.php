<?php
require(__DIR__ . '/../Config/init.php');
class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    /**
     * Index: this method allows users to  view all products in the database.
     */
    public function index() {}

    /**
     * Create: this method allows user to create a new product
     */
    public function create($data) {}
    /**
     * Show: This method is used to show one specific product by its id.
     *   @param int $id - The id of the product that needs to be shown.
     *   @return array $product - An associative array containing information about the selected product.
     *   If no product with the given id exists, an empty array will be returned.
     */
    public function show($id) {}

    public function  update($id, $data) {}

    public function destroy($id) {}

    public function restore() {}
}
