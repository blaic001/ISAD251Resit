<?php


class userData
{
    private $userId, $firstName, $lastName, $age;

    private $appointmentDataArray = array();
    private $deadlineDataArray = array();

    public function __construct($userId, $firstName, $lastName, $age, array $appointmentDataArray, array $deadlineDataArray)
    {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->appointmentDataArray = $appointmentDataArray;
        $this->deadlineDataArray = $deadlineDataArray;
    }

    public function getAppointmentDataArray(){
        return $this->appointmentDataArray;
    }

    public function setAppointmentDataArray($appointmentDataArray){
        $this->appointmentDataArray = $appointmentDataArray;
    }

    public function getDeadlineDataArray(){
        return $this->deadlineDataArray;
    }

    public function setDeadlineDataArray($deadlineDataArray){
        $this->deadlineDataArray = $deadlineDataArray;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }
}