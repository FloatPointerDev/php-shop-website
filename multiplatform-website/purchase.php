<?php
session_start();

require "classes/utils.php";

if (!isset($_GET["id"]) or !is_numeric($_GET["id"])) {
    header("Location: " . Utils::$projectFilePath . "/shop.php");
    exit;
}

require "classes/components.php";
$banknumErr = $addressErr = $postcodeErr = null;
$banknum = $address = $postcode = null;

Components::pageHeader("Products", ["stylesheet"], ["button"]);

?>

<p class="mandatory">* Field is mandatory</p>

<form action="classes/purchaseProcessing.php" method="post">
  <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
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
<p class="mandatory"><?php echo $postcodeErr ?></p>

<?php

Components::pageFooter();

session_destroy();