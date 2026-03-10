
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

$queryParams = $paramsArray = [];
$queryParams["sortField"] = $_GET["sortField"] ?? "product_name";

if (isset($_GET["search"]) && $_GET["search"] != "") {
    $queryParams["searchTerm"] = $_GET["search"];
    // Add wildcards to search term to make it more flexible
    array_push($paramsArray, "%" . $_GET["search"] . "%");
}

$products = Products::getproducts(SQL::getProductsWithParams($queryParams), $paramsArray);

?>

<div class="grid">
    <?php Components::displayProducts($products); ?>
</div>

<?php

Components::pageFooter();

?>