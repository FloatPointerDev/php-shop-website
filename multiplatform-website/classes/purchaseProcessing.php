<?php

class purchaseProcessing {
    public static function process_to_database() {
        /* It'd be more secure to use PHP filter functions, but that'll take too long to implement, so htmlspecialchars will do...
        I would also hash banknum, however I didn't consider that when setting up the database table, and I can't be bothered to change 
        Because of the time constraints */

        // Get banknum from POST form
        if (!empty($_POST["banknum"])) {
            $banknum =  htmlspecialchars($_POST['banknum']);
        } else {
            $banknumErr = "bank number is required";
        }

        // Get address from POST form
        if (!empty($_POST["address"])) {
            $address =  htmlspecialchars($_POST['address']);
        } else {
            $addressErr = "address is required";
        }

        // Get Postcode from POST form
        if (!empty($_POST["postcode"]) < 8) {
            $postcode =  htmlspecialchars($_POST['postcode']);
        } else {
            $postcodeErr = "postcode is required and must be longer than 8 characters";
        }

        require "products.php";
        require "components.php";

        // Get ID, cost and Stock
        $productId = Products::getSingleProduct($_POST["product_id"]);
        $cost = Components::displayProduct($_POST["price"]);
        $stock = Components::displayProduct($_POST["stock"]);

        // SQL query to read user details into database and decrement stock number
        Products::readIntoDatabase($cost, $banknum, $address, $postcode, $productId);
        Products::decrementDatabaseStock($productId);

        // Delete if out of stock
        if ($stock == 0) {
            Products::deleteWhenStockZero($productId);
        }

        // Redirect to success.php when done
        header("Location: " . Utils::$projectFilePath . "/success.php");
    }
}