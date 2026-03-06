<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Home", ["stylesheet"], []);

?>

<p>test</p>

<button class="see-pricing-button"><a href="shop.php">See Pricing</a></button>

<?php

Components::pageFooter();

?>