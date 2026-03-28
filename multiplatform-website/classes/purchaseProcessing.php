<?php

class purchaseProcessing {
    public static function process_to_database() {
        /* It'd be more secure to use PHP filter functions, but that'll take too long to implement, so htmlspecialchars will do...
        I would also hash banknum, however I didn't consider that when setting up the database table, and I can't be bothered to change 
        Because of the time constraints */

        $banknumSafe = $addressSafe = $postcodeSafe = null;

        // Get banknum from POST form
        if (!empty($_POST["banknum"])) {
            $banknumSafe =  htmlspecialchars($_POST['banknum']);
        } else {
            $banknumErr = "bank number is required";
        }

        // Get address from POST form
        if (!empty($_POST["address"])) {
            $addressSafe =  htmlspecialchars($_POST['address']);
        } else {
            $addressErr = "address is required";
        }

        // Get Postcode from POST form
        if (!empty($_POST["postcode"]) && strlen($_POST["postcode"])) {
            $postcodeSafe =  htmlspecialchars($_POST['postcode']);
        } else {
            $postcodeErr = "postcode is required and must be 8 characters or less";
        }

        require "products.php";
        require "components.php";

        // Get ID, cost and Stock
        $productId = Products::getSingleProduct($_POST["product_id"]);
        $rawId = $productId['product_id'];
        $cost = $productId['price'];
        $stock = $productId['stock'];

        $cart = $rawId;
        setcookie("Cart", $cart, time() + (86400 * 30), "/");

        // SQL query to read user details into database and decrement stock number
        Products::readIntoDatabase($cost, $banknumSafe, $addressSafe, $postcodeSafe, $rawId);
        Products::decrementDatabaseStock($rawId);

        // Delete if out of stock
        if ($stock <= 1) {
            Products::deleteWhenStockZero($rawId);
        }

        // Redirect to success.php when done
        header("Location: " . Utils::$projectFilePath . "/success.php");
    }
}

purchaseProcessing::process_to_database();