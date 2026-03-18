<?php
session_start();
require "classes/components.php"

// If transaction works, user goes to this screen

Components::pageHeader("Products", ["stylesheet"], ["button"]);
?>

<p>Purchase Made Successfully</p>

<?php
Components::pageFooter();