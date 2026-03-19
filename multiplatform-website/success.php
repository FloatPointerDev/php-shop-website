<?php
session_start();
require "classes/components.php";

// If transaction works, user goes to this screen

Components::pageHeader("Purchase has been made successfully", ["stylesheet"], []);
?>

<p>Purchase Made Successfully</p>

<?php
Components::pageFooter();