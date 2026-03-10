<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Home", ["stylesheet"], []);

?>

<h1>See our full range of offers here on our website</h1>

<button class="see-pricing-button"><a href="shop.php">See Pricing</a></button>

<?php

Components::pageFooter();

?>