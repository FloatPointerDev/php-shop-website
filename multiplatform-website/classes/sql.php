<?php

class SQL
{
    // SQL queriea for read, insert, delete and update
    public static $getAllProducts = "SELECT * FROM products";
    public static $getSingleProduct = "SELECT * FROM products WHERE product_id = ?";
    public static $decrementStockNumber = "UPDATE products SET stock = stock - 1 WHERE product_id = ?";
    public static $placeOrder = "INSERT INTO purchases (purchase_cost, bank_number, user_address, postcode, product_id) VALUES
    (?, ?, ?, ?, ?)";
    public static $deleteFromProducts = "DELETE FROM products WHERE product_id = ?";

    // Get products from the parameters
    public static function getProductsWithParams($params)
    {
        $sql = self::$getAllProducts;

        if (!empty($params["searchTerm"])) {
            $sql .= " WHERE product_name LIKE ?";
        }

        // Assumes that these fields are always set in $params
        $sql .= $params["sortField"] == "product_name" ? " ORDER BY product_name" : " ORDER BY price";

        return $sql;
    }
}