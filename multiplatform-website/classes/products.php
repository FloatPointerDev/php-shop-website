<?php

require_once "connection.php";
require_once "sql.php";
require_once "utils.php";

class Products
{
    // Get product
    public static function getProducts($sql, $params = [])
    {
        $conn = Connection::create();

        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;

        return $products;
    }

    // Get only 1 product
    public static function getSingleProduct($productId)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$getSingleProduct);
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        return $product;
    }

    // Read buyer details into database purchases table
    public static function readIntoDatabase($cost, $banknum, $address, $postcode, $productId)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$placeOrder);
        $stmt->execute([$cost, $banknum, $address, $postcode, $productId]);
        $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        return $product;
    }

    // Decrement stock number by 1 when something is purchased
    public static function decrementDatabaseStock($productId)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$decrementStockNumber);
        $stmt->execute([$productId]);
        $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        return $product;
    }

    // If stock number reaches 0, then delete from table as its no longer purchaseable
    public static function deleteWhenStockZero($productId)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$deleteFromProducts);
        $stmt->execute([$productId]);
        $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        return $product;
    }
}