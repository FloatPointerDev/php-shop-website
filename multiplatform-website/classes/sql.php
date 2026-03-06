<?php

class SQL
{
    public static $getAllProducts = "SELECT * FROM products
        ORDER BY product_name ASC";
    public static $getSingleProduct = "SELECT * FROM products WHERE product_id = ?";
}