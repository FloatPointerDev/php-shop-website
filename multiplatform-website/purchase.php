<?php

session_start();

require "classes/utils.php";

if (!isset($_GET["id"]) or !is_numeric($_GET["id"])) {
    header("Location: " . Utils::$projectFilePath . "/shop.php");
    exit;
}

require "classes/components.php";

Components::pageHeader("Products", ["stylesheet"], ["button"]);

?>
<form action="/action_page.php">
  <label for="banknum">Bank Number</label>
  <input type="text" id="banknum" name="banknum"><br><br>
  <label for="address">Address</label>
  <input type="text" id="address" name="address"><br><br>
  <label for="postcode">Postcode</label>
  <input type="text" id="postcode" name="postcode"><br><br>
  <input type="submit" value="Submit">
</form>

<?php

require "classes/products.php";

$product = Products::getSingleProduct($_GET["id"]);
Components::pageFooter();