<?php

class Components {
    /**
     * Output a standard page header.
     * 
     * $pageTitle - string
     * $stylesheets - array
     * $scripts - array
     */
    public static function pageHeader($pageTitle, $stylesheets, $scripts) {
        require "components/header.php";
    }

    /**
     * Output a standard page footer.
     */
    public static function pageFooter() {
        require "components/footer.php";
    }

    /**
     * Output all gallery images in a grid.
     */
    public static function displayAllGalleryImages($images)
    {
        if (empty($images))
            return;

        foreach ($images as $image) {
            $filename = Utils::escape($image["file_name"]);
            $thumbnail = Utils::escape($image["thumb_name"]);

            $filepath = Utils::$uploadPath . "/" . $filename;
            $thumbpath = Utils::$uploadPath . "/" . $thumbnail;

            require "components/gallery-image.php";
        }
    }
}