<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Shop", ["stylesheet"], []);

?>

<p>test</p>

<?php

Components::pageFooter();

?>