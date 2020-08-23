<?php


class deadlineData
{
    private $deadlineId, $userId, $deadlineDT, $deadlineDesc, $deadlineCheck;

    public function __construct($deadlineId, $userId, $deadlineDT, $deadlineDesc, $deadlineCheck)
    {
        $this->deadlineId = $deadlineId;
        $this->userId = $userId;
        $this->deadlineDT = $deadlineDT;
        $this->deadlineDesc = $deadlineDesc;
        $this->deadlineCheck = $deadlineCheck;
    }

    public function getDeadlineId(){
        return $this->deadlineId;
    }

    public function setDeadlineId($deadlineId){
        $this->deadlineId = $deadlineId;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getDeadlineDT(){
        return $this->deadlineDT;
    }

    public function setDeadlineDT($deadlineDT){
        $this->deadlineDT = $deadlineDT;
    }

    public function getDeadlineDesc(){
        return $this->deadlineDesc;
    }

    public function setDeadlineDesc($deadlineDesc){
        $this->deadlineDesc = $deadlineDesc;
    }

    public function getDeadlineCheck(){
        return $this->deadlineCheck;
    }

    public function setDeadlineNotes($deadlineCheck){
        $this->deadlineCheck = $deadlineCheck;
    }
}
?>