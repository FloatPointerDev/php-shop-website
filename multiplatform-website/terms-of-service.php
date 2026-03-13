<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Home", ["stylesheet"], []);

?>

<h1>By using this website, You agree to the following:</h1>

<ol type="1">
  <li>Allow us to collect data on your address</li>
  <li>Allow us to collect data on your postcode</li>
  <li>Allow us to collect data on your ip address</li>
  <li>Allow us to collect data on your bank details</li>
</ol>

<?php

Components::pageFooter();

?>