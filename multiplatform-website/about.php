<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("About", ["stylesheet"], []);

?>

<p>test</p>

<?php

Components::pageFooter();

?>