<?php
namespace Sanyandr\Practice\DBFunctions;
use Sanyandr\Practice\Entity\Review;
use Sanyandr\Practice\SQLiteConnection\SQLiteConnection;
use PDO;

class DBFunctions {


    public function deleteReview(int $ID) {
        $sql = "DELETE FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
    }

    #returns object class Review
    public function getByID(int $ID) {
        $sql = "SELECT * FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
        $state->setFetchMode(PDO::FETCH_INTO, new Review());
        return $state->fetch();
    }

    #not used yet, ID hardcoded
    public function getAll() {
        $sql = "SELECT * FROM review";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
        $state->setFetchMode(PDO::FETCH_CLASS, "Sanyandr\Practice\Entity\Review");
        return $state->fetchALL();
    }

    public function getLimited($page) {
        $limit = 20;
        $offset = $limit * ($page - 1);
        $sql = "SELECT * FROM review LIMIT $limit OFFSET $offset";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
        $state->setFetchMode(PDO::FETCH_CLASS, "Sanyandr\Practice\Entity\Review");
        return $state->fetchAll();
    }
}