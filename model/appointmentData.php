<?php


class appointmentData
{
    private $appId, $userId, $appDT, $appNotes, $appDesc;


    public function __construct($appId, $userId, $appDT, $appNotes, $appDesc)
    {
        $this->appId = $appId;
        $this->userId = $userId;
        $this->appDT = $appDT;
        $this->appNotes = $appNotes;
        $this->appDesc = $appDesc;
    }

    public function getAppId(){
        return $this->appId;
    }

    public function setAppId($appId){
        $this->appId = $appId;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getAppDT(){
        return $this->appDT;
    }

    public function setAppDT($appDT){
        $this->appDT = $appDT;
    }

    public function getAppNotes(){
        return $this->appNotes;
    }

    public function setAppNotes($appNotes){
        $this->appNotes = $appNotes;
    }

    public function getAppDesc(){
        return $this->appDesc;
    }

    public function setAppDesc($appDesc){
        $this->appDesc = $appDesc;
    }
}
?>