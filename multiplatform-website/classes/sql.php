<?php

class SQL
{
    public static $getAllProducts = "SELECT * FROM products
        ORDER BY product_name ASC;";
    public static $getSingleProduct = "SELECT * FROM products WHERE product_id = ?;";
    public static $decrementStockNumber = "UPDATE products SET stock = stock - 1 WHERE product_id = ?;";

    public static function getProductsWithParams($params)
    {
        $sql = self::$getAllProducts;

        $sql .= "WHERE product_name LIKE ?";

        // Assumes that these fields are always set in $params
        $sql .= $params["sortField"] == "title" ? " ORDER BY title;" : " ORDER BY price;";

        return $sql;
    }
}