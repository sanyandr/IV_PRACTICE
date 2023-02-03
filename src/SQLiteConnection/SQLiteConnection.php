<?php
namespace Sanyandr\Practice\SQLiteConnection;

use Sanyandr\Practice\Config\Config;
use PDO;
use PDOException;

class SQLiteConnection {
//    protected Config $configInstance;
//
//    public function __construct($configInstance) {
//        $this->configInstance = $configInstance;
//    }

#returns object which is new PDO connect
    public function Connect() {
        try {
            return new PDO("sqlite:" . Config::pathToDB);
        }
        catch
        (PDOException $exception) {
            echo $exception->getMessage();
            die;
        }
    }
}
