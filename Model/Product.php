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
     * Method  to get all categories from the database and return the result as an associative array.
     */
    public function getAllProducts()
    {
        // call database selectData
        // return fetched data
        return $this->db->selectData($this->tableName, null);
    }


    public function getProductById($id)
    {
        // call database selectData with id
        // return fetched data
        $conditions = ['id' => $id];
        return $this->db->selectData($this->tableName, $id);
    }

    public function createProduct($data)
    {
        // construct data as array association
        // call database insertData and pass the constructed data
        // return boolean
        $productData = ['product_name' => $data['product_name']];
        return $this->db->insertData($this->tableName, $productData);
    }

    public function updateProduct($id, $data)
    {
        // call updateData
        //return boolean
        $productData = ['product_name' => $data['product_name']];
        return $this->db->updateData($this->tableName, $id, $productData);
    }


    public function destroy($id)
    {
        // Use deleteRecord from the Database class to mark the product as deleted
        return $this->db->deleteRecord($this->tableName, $id);
    }

    public function restoreCategory($id)
    {
        // call restoreRecord
        return $this->db->restoreRecord($this->tableName);
    }
}
