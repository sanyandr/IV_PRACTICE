<?php
namespace db\dbFunctions;
use db\Objects\ObjectReview;
use db\SQLiteConnection\SQLiteConnection;
use PDO;

class dbFunctions {

    public function getByID(int $ID) {
        $sql = "SELECT * FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->Connect()->query($sql);
        $state->setFetchMode(PDO::FETCH_INTO, new ObjectReview());
        return $state->fetch();
    }

    public function getAll() {
        $reviewArray = array();
        for ($ID = 0; $ID < 20; $ID++) {
            $sql = "SELECT * FROM review WHERE review.ID == $ID";
            $state = (new SQLiteConnection())->Connect()->query($sql);
            $state->setFetchMode(PDO::FETCH_INTO, new ObjectReview());
            $obj = $state->fetch();
            $reviewArray[$ID] = $obj;
        }
        return $reviewArray;

    }
}