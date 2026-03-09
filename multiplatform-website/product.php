<?php

session_start();

require "classes/utils.php";

if (!isset($_GET["id"]) or !is_numeric($_GET["id"])) {
    header("Location: " . Utils::$projectFilePath . "/feed.php");
    exit;
}

require "classes/components.php";

Components::pageHeader("Products", ["stylesheet"], []);

require "classes/products.php";

$product = Products::getSingleProduct($_GET["id"]);
Components::displaySingleProduct($product);
Components::pageFooter();