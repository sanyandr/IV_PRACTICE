<?php
namespace Sanyandr\Practice;
use Sanyandr\Practice\Entity\Review;
use PDO;
class BaseRepository {
//    protected SQLiteConnection $sqlite;
//
//    public function __construct(SQLiteConnection $sqlite) {
//        $this->sqlite = $sqlite;
//    }
    public static function deleteReview(int $ID) {
        $sql = "DELETE FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
    }

    #returns object class Review
    public static function getByID(int $ID) {
        $sql = "SELECT * FROM review WHERE review.ID == $ID";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
        $assign = ['ID', 'text', 'rate', 'userID'];
        return $state->fetchObject("Sanyandr\Practice\Entity\Review", [...$assign]);
    }
//, ['ID', 'text', 'rate', 'userID']
    #not used yet, ID hardcoded
    public static function getAll() {
        $sql = "SELECT * FROM review";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
        $assign = ['ID', 'text', 'rate', 'userID'];
        return $state->fetchALL(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
                    "Sanyandr\Practice\Entity\Review", [...$assign]);
    }

    public static function getLimited($page) {
        $limit = 20;
        $offset = $limit * ($page - 1);
        $sql = "SELECT * FROM review LIMIT $limit OFFSET $offset";
        $state = (new SQLiteConnection())->connect()->prepare($sql);
        $state->execute();
        $assign = ['ID', 'text', 'rate', 'userID'];
        return $state->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
                    "Sanyandr\Practice\Entity\Review", [...$assign]);
    }
}