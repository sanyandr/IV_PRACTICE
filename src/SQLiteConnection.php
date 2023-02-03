<?php
namespace Sanyandr\Practice;

use PDO;
use PDOException;
use Sanyandr\Practice\Config\Config;

class SQLiteConnection {
//    protected Config $configInstance;
//
//    public function __construct($configInstance) {
//        $this->configInstance = $configInstance;
//    }

#returns object which is new PDO connect
    public function connect() {
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
