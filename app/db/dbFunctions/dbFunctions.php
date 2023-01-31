<?php
namespace db\dbFunctions;
use db\Objects\ObjectReview;
use db\SQLiteConnection\SQLiteConnection;
use PDO;

class dbFunctions {
    public function deleteReview(int $ID) {
        $sql = "DELETE FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->Connect()->prepare($sql);
        $state->execute();
    }

    #returns object class ObjectReview
    public function getByID(int $ID) {
        $sql = "SELECT * FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->Connect()->prepare($sql);
        $state->execute();
        $state->setFetchMode(PDO::FETCH_INTO, new ObjectReview());
        return $state->fetch();
    }

    #not used yet, ID hardcoded
    public function getAll() {
        $sql = "SELECT * FROM review";
        $state = (new SQLiteConnection())->Connect()->prepare($sql);
        $state->execute();
        $state->setFetchMode(PDO::FETCH_CLASS, "db\Objects\ObjectReview");
        return $state->fetchALL();
    }

    public function getLimited($page) {
        $limit = 20;
        $offset = $limit * ($page - 1);
        $sql = "SELECT * FROM review LIMIT $limit OFFSET $offset";
        $state = (new SQLiteConnection())->Connect()->prepare($sql);
        $state->execute();
        $state->setFetchMode(PDO::FETCH_CLASS, "db\Objects\ObjectReview");
        return $state->fetchAll();
    }
}