<?php

session_start();
require "classes/components.php";

// This displays the cart

Components::pageHeader("Your Cart", ["stylesheet"], []);

$cartId = isset($_COOKIE['Cart']) ? $_COOKIE['Cart'] : null;
?>

<p>Your Cart:</p>

<?php

require "classes/products.php";

$products = Products::getProducts(SQL::getCart($cartId), [$cartId]);

?>

<div class="grid">
    <?php Components::displayCart($products); ?>
</div>


<?php
Components::pageFooter();