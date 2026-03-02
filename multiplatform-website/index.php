<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Home", ["stylesheet"], []);

?>

<p>test</p>

<?php

Components::pageFooter();

?>