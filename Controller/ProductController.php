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
    public function index() {
        $products = $this->productModel->getAllProducts();
        return $products;
    }

    /**
     * Create: This method allows users to create a new product.
     * @param array $data - The data for the new product.
     * @return bool - True if product creation was successful, false otherwise.
     */
    public function create($data) {
        return $this->productModel->createProduct($data);
    }
    /**
     * Show: This method is used to show one specific product by its id.
     * @param int $id - The id of the product that needs to be shown.
     * @return array - An associative array containing information about the selected product.
     */
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        return $product ?: [];
    }
    /**
     * Update: This method allows users to update a product.
     * @param int $id - The id of the product to be updated.
     * @param array $data - The data to update in the product.
     * @return bool - True if update was successful, false otherwise.
     */

    public function  update($id, $data) {
        return $this->productModel->updateProduct($id, $data);
    }
    /**
     * Destroy: This method allows users to delete a product by its id.
     * @param int $id - The id of the product to be deleted.
     * @return bool - True if deletion was successful, false otherwise.
     */

     public function destroy($id) {
        return $this->productModel->destroy($id);
    }

    /**
     * Restore: This method allows users to restore a deleted product.
     * @param int $id - The id of the product to be restored.
     * @return bool - True if restore was successful, false otherwise.
     */

    public function restore($id) {
        return $this->productModel->restoreProduct($id);
    }
}
