<?php
session_start();

require "classes/utils.php";
require "classes/purchaseProcessing.php";

if (!isset($_GET["id"]) or !is_numeric($_GET["id"])) {
    header("Location: " . Utils::$projectFilePath . "/shop.php");
    exit;
}

require "classes/components.php";
$banknumErr = $addressErr = $addressErr = "";
$banknum = $address = $address = "";

Components::pageHeader("Products", ["stylesheet"], ["button"]);

?>

<p class="mandatory">* Field is mandatory</p>

<form action="classes/purchaseProcessing.php" method="post">
  <label for="banknum">Bank Number*</label><br>
  <input type="text" name="banknum"><br>
  <label for="address">Address*</label><br>
  <input type="text" name="address"><br>
  <label for="postcode">Postcode*</label><br>
  <input type="text" name="postcode"><br>
  <input type="submit" value="Submit">
</form>

<p class="mandatory"><?php echo $banknumErr ?></p>
<p class="mandatory"><?php echo $addressErr ?></p>
<p class="mandatory"><?php echo $addressErr ?></p>

<?php

require "classes/products.php";

$product = Products::getSingleProduct($_GET["id"]);
Components::pageFooter();

session_destroy();