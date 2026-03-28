<?php

class Components {
    /**
     * Output a standard page header.
     * 
     * $pageTitle - string
     * $stylesheets - array
     * $scripts - array
     */
    public static function pageHeader($pageTitle, $stylesheets, $scripts) {
        require "components/header.php";
    }

    /**
     * Output a standard page footer.
     */
    public static function pageFooter() {
        require "components/footer.php";
    }

    // Get and display product
    public static function displayProduct($products)
    {
        if (empty($products)) {
            require "components/no-single-product-found.php";
            return;
        }

        foreach ($products as $product) {
            $productId = Utils::escape($product["product_id"]);
            $productName = Utils::escape($product["product_name"]);
            $stock = Utils::escape($product["stock"]);
            $price = Utils::escape($product["price"]);
            $filename = Utils::escape($product["filename"]);

            require "components/product-preview.php";
        }
    }

    // Get and display single product
    public static function displaySingleProduct($product)
    {
        if (empty($product)) {
            require "components/no-single-product-found.php";
            return;
        }

        $productId = Utils::escape($product["product_id"]);
        $productName = Utils::escape($product["product_name"]);
        $stock = Utils::escape($product["stock"]);
        $price = Utils::escape($product["price"]);
        $filename = Utils::escape($product["filename"]);

        require "components/single-product.php";
    }

    public static function displayCart($products) {
        if (empty($products)) {
            require "components/empty-cart.php";
            return;
        }

        foreach ($products as $product) {
            $productId = Utils::escape($product["product_id"]);
            $productName = Utils::escape($product["product_name"]);
            $stock = Utils::escape($product["stock"]);
            $price = Utils::escape($product["price"]);
            $filename = Utils::escape($product["filename"]);

            require "components/product-preview.php";
        }
    }
}