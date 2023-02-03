<?php
namespace Sanyandr\Practice\Entity;

class Review implements \JsonSerializable {
    protected $ID;
    protected $text;
    protected $rate;
    protected $userID;

    public function __construct($ID, $text, $rate, $userID) {
        $this->ID = $ID;
        $this->text = $text;
        $this->rate = $rate;
        $this->userID = $userID;

    }


    public function jsonSerialize(): mixed {
        return [
            'ID' => $this->ID,
            'text' => $this->text,
            'rate' => $this->rate,
            'userID' => $this->userID,
        ];
    }
}