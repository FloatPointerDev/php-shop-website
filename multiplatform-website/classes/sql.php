<?php

class SQL
{
    public static $getAllImages = "SELECT * FROM images
        ORDER BY date_added DESC";
    public static $getSingleImage = "SELECT * FROM images WHERE file_name = ?";
    public static $addImage = "INSERT INTO images
        (file_name, thumb_name)
        VALUES (?, ?)";
    public static $deleteImage = "DELETE FROM images WHERE file_name = ?";
}