<?php

session_start();

require "classes/utils.php";
require "classes/components.php";
require "classes/sql.php";


Components::pageHeader("Shop", ["stylesheet"]);
?>



<?php

require "classes/products.php";

$products = Products::getProducts(SQL::$getAllProducts);

?>

<div class="grid">
    <?php Components::displayProduct($products); ?>
</div>



<?php 

Components::pageFooter();

?>