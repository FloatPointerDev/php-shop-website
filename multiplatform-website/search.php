<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Search", ["stylesheet"], []);

?>

<form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form">
    <input type="search" name="search" placeholder="Search" class="centred-input" value="<?php

    if (isset($_GET["search"]) && $_GET["search"] != "") {
        echo Utils::escape($_GET["search"]);
    }

    ?>">
</form>

<?php 

require "classes/products.php";
require_once "classes/sql.php";

$queryParams = $paramsArray = [];
$queryParams["sortField"] = $_GET["sortField"] ?? "product_name";

if (isset($_GET["search"]) && $_GET["search"] != "") {
    $queryParams["searchTerm"] = $_GET["search"];
    array_push($paramsArray, "%" . $_GET["search"] . "%");
}

// Pass the $queryParams so the SQL builder knows if it needs to add "WHERE"
$products = Products::getProducts(SQL::getProductsWithParams($queryParams), $paramsArray);

?>

<div class="grid">
    <?php Components::displayProduct($products); ?>
</div>

<?php

Components::pageFooter();

?>