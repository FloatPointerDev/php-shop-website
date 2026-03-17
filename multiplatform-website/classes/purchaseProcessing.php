<?php

class purchaseProcessing {
    public static function process_to_database() {
        // It'd be more secure to use PHP filter functions, but that'll take too long to implement, so htmlspecialchars will do...

        if (!empty($_POST["banknum"])) {
            $banknum =  htmlspecialchars($_POST['banknum']);
        } else {
            $banknumErr = "bank number is required";
        }

        if (!empty($_POST["address"])) {
            $address =  htmlspecialchars($_POST['address']);
        } else {
            $addressErr = "address is required";
        }

        if (!empty($_POST["postcode"]) < 8) {
            $postcode =  htmlspecialchars($_POST['postcode']);
        } else {
            $postcodeErr = "postcode is required and must be longer than 8 characters";
        }

        header("Location: " . Utils::$projectFilePath . "/success.php");
    }
}