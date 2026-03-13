<?php

class purchaseProcessing {
    public static function process_to_database() {

        // It'd be more secure to use PHP filter functions, but that'll take too long to implement, so htmlspecialchars will do...

        if (empty($_POST["banknum"])) {
            $banknumErr = "bank number is required";
        } else {
            $banknum =  htmlspecialchars($_POST['banknum']);
        }

        if (empty($_POST["address"])) {
            $addressErr = "address is required";
        } else {
            $address =  htmlspecialchars($_POST['address']);
        }

        if (empty($_POST["postcode"])) {
            $postcodeErr = "postcode is required";
        } else {
            $postcode =  htmlspecialchars($_POST['postcode']);
        }
    }
}