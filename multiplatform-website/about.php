<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("About", ["stylesheet"], []);

?>

<h1>About us</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<h2>Contact Us</h2>
<h3>Email: help@shopname.com</h3>
<h3>Telephone: 07 123456789</h3>

<?php

Components::pageFooter();

?>