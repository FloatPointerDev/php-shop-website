<?php

class Utils
{
    public static $projectFilePath = "http://localhost/shop-wb";
    public static $uploadPath = "images";

    /**
     * Takes an array of $_POST[] keys and checks if any 
     * are empty and returns true if any values are missing.
     */
    public static function postValuesAreEmpty($arrayOfKeys)
    {
        foreach ($arrayOfKeys as $key) {
            if (!isset($_POST[$key]) || empty($_POST[$key])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Escape input string to prevent accidental evaluation of HTML 
     * or JavaScript
     */
    public static function escape($input)
    {
        return trim(htmlspecialchars($input));
    }

    public static function redirect($destination)
    {
        header("Location: " . self::$projectFilePath . "/$destination.php");
    }

    // Get the file extension of a given file
    public static function getFileExtension($filename)
    {
        $parts = explode(".", $filename);

        return end($parts);
    }
}