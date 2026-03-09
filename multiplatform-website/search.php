
<?php

session_start();

require "classes/utils.php";
require "classes/components.php";

Components::pageHeader("Search", ["stylesheet"], []);

?>

<form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form form-row">
    <input type="search" name="search" placeholder="Search" class="centred-input" value="<?php

    if (isset($_GET["search"]) && $_GET["search"] != "") {
        echo Utils::escape($_GET["search"]);
    }

    ?>">
</form>

<?php

Components::pageFooter();

?>