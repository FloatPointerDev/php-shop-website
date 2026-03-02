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

    public static function deleteImage($filename)
    {
        $conn = Connection::create();

        $stmt = $conn->prepare(SQL::$deleteImage);
        $stmt->execute([$filename]);

        $conn = null;

        $filepath = Utils::$uploadPath . "/$filename";

        // Consruct the thumbnail path
        $parts = explode(".", $filename);
        $thumbpath = Utils::$uploadPath . "/" . $parts[0] . "-thumb" . $parts[1];

        // Removing the images from the uploads directory
        if (unlink($filepath) && unlink($thumbpath)) {
            return true;
        }

        return false;
    }

    public static function uploadImage()
    {
        if (empty($_FILES["image"]["name"])) {
            return "<p class='error'>ERROR: No image</p>";
        }
        //get the files's original file name
        $filetype = Utils::getFileExtension($_FILES["image"]["name"]);
        $isValidImage = in_array($filetype, ["jpg", "jpeg", "png", "gif"]);
        
        // Validate image file size is less than or equal to 1 megabyte
        $isValidSize = $_FILES["image"]["size"] <= 1000000;

        if (!$isValidImage || !$isValidSize) {
            return "<p class='error'>ERROR: Invalid file size/format</p>";
        }

        $timestamp = strval(time());

        // Create New File Name
        $filename = "$timestamp.$filetype";
        $thumbFilename = "$timestamp-thumb.$filetype";

        // Create Thumbnail
        self::createThumbnail($thumbFilename);

        // Create filepath for convenience
        $filePath = Utils::$uploadPath . "/$filename";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath)) {
            $conn = Connection::create();

            // prepare and execute the query
            $stmt = $conn->prepare(SQL::$addImage);
            $stmt->execute([$filename, $thumbFilename]);

            $conn = null;

            return "<p>File uploaded successfully</p>";
        }

        return "<p class='error'>ERROR: File was not uploaded</p>";
    }

    public static function createThumbnail($thumbFilename) {
        $imgData = file_get_contents($_FILES["image"]["tmp_name"]);
        $sourceImage = imagecreatefromstring($imgData);
        $width = imagesx($sourceImage);
        $height = imagesy($sourceImage);
        $desiredWidth = 250;
        $desiredHeight = floor($height * ($desiredWidth / $width));

        $virtualImage = imagecreatetruecolor($desiredWidth, $desiredHeight);
        imagecopyresampled(
            $virtualImage,
            $sourceImage,
            0,
            0,
            0,
            0,
            $desiredWidth,
            $desiredHeight,
            $width,
            $height
        );

        // Create the thumbnail image in the uploads directory
        if (imagejpeg($virtualImage, Utils::$uploadPath . "/$thumbFilename")) {
            return true;
        }

        return false;
    }
}