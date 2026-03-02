<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($pageTitle))
        echo $pageTitle; ?></title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <?php

    // If a stylesheet array is supplied, create a link for each item.
    if (!empty($stylesheets)) {
        foreach ($stylesheets as $sheet) {
            echo "<link rel=\"stylesheet\" href=\"css/$sheet.css\">";
        }
    }

    // If a scripts array is supplied, create a script link for each item.
    if (!empty($scripts)) {
        foreach ($scripts as $script) {
            echo "<script src=\"js/$script.js\" defer></script>";
        }
    }

    ?>
</head>

<body>
    <div class="page-wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="about.php">About</a></li>
        </ul>

        <main>