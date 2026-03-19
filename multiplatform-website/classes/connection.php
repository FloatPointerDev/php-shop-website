<?php

class Connection
{
    /**
     * Return a new PDO database connection object so we can carry out 
     * database transactions.
     */
    public static function create()
    {
        // Include the credentials for DB connection
        require __DIR__ . "/../includes/credentials.php";

        try {
            $server = $credentials["server"];
            $dbName = $credentials["dbName"];

            // Create a new PDO connection object
            $conn = new PDO(
                "mysql:host=$server;dbname=$dbName;",
                $credentials["user"],
                $credentials["pass"]
            );

            // Throw PDOExceptions instead of failing silently
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Stop script execution and output error
            exit("Error: " . $e->getMessage());
        }

        return $conn;
    }
}