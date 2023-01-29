<?php
namespace db\SQLiteConnection;

use db\Config\Config;
use PDO;
use PDOException;

class SQLiteConnection {

#returns object which is new PDO connect
    public function Connect() {
        try {
            return new PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
        catch
        (PDOException $exception) {
            echo $exception->getMessage();
            die;
        }
    }
}
