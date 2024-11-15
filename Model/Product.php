<?php

require(__DIR__ . '/../Config/init.php');

class Product extends Model
{
    /**
     * Constructor that calls the parent constructor and sets the table name for this class.
     * $this->tableName is refers to the table name in the database which will be used by this model.
     * $this->setTableName is a method from the parent class that sets the table name.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('products');
    }

    /**
     * Method  to get all products from the database and return the result as an associative array.
     */
    public function getAllProducts()
    {
        // call database selectData
        // return fetched data
    }


    public function getProductById($id)
    {
        // call database selectData with id
        // return fetched data
    }

    public function createProduct($data)
    {
        // construct data as array association
        // call database insertData and pass the constructed data
        // return boolean
    }

    public function updateProduct($id, $data)
    {
        // call updateData
        //return boolean
    }

    public function deleteProduct($id)
    {
        // call deteleRecord
    }

    public function restoreProduct()
    {
        // call restoreRecord
    }
}
