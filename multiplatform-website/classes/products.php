<?php

require_once "classes/connection.php";
require_once "classes/sql.php";
require_once "classes/utils.php";

class Products
{
    public static function getproducts($sql, $params = [])
    {
        $conn = Connection::create();

        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;

        return $products;
    }

    public static function getSingleProduct($productId)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$getSingleProduct);
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        return $product;
    }
}