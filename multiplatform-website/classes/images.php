<?php

require_once "classes/connection.php";
require_once "classes/sql.php";
require_once "classes/utils.php";

class Images
{
    public static function getAllImages()
    {
        $conn = Connection::create();

        // Prepare and execute the query
        $stmt = $conn->prepare(SQL::$getAllImages);
        $stmt->execute();

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;

        return $images;
    }

    public static function getSingleImage($filename)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$getSingleImage);

        // Replace each ? in the query from values in the array
        $stmt->execute([$filename]);
        $post = $stmt->fetch();

        $conn = null;

        return $post;
    }
}