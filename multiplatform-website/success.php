<?php
session_start();
require "classes/components.php"

Components::pageHeader("Products", ["stylesheet"], ["button"]);
?>

<p>Purchase Made Successfully</p>

<?php
Components::pageFooter();