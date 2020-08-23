<?php

const DB_SERVER = "";
const DB_USER = "";
const DB_PASSWORD = "";
const DB_DATABASE = "";

function getConnect(){
    $dataSourceName = "mysql:dbname=" . DB_DATABASE . ";host=" . DB_SERVER;
    $dbConnection = null;
    try {
        $dbConnection = new PDO($dataSourceName, DB_USER, DB_PASSWORD);

    } catch (PDOException $err) {
        echo "Connection Failed: ", $err->getMessage();
    }
    return $dbConnection;
}

function getUser($firstName){
    $userData = getUserData($firstName);

    $userId = getUserId($firstName);
    $appointmentData = getAppointmentData($userId);
    $deadlineData = getDeadlineData($userId);

    $user = buildUser($userData, $appointmentData, $deadlineData);
    return $user;
}

function buildUser($userData, $appointmentData, $deadlineData){
    $appointmentDataArray = array();
    $deadlineDataArray = array();

    for ($i = 0; $i < count($userData); ++$i){
        $userId = $userData[$i]["UserId"];
        $firstName = $userData[$i]["firstName"];
        $lastName = $userData[$i]["lastName"];
        $age = $userData[$i]["age"];
    }

    for ($i = 0; $i < count($appointmentData); ++$i){
        $appId = $appointmentData[$i]["userId"];
        $userId = $appointmentData[$i]["appId"];
        $appDT = $appointmentData[$i]["appDT"];
        $appNotes = $appointmentData[$i]["appNotes"];
        $appDesc = $appointmentData[$i]["appDesc"];

        $appDataPoint = new appData($appId, $userId, $appDT, $appNotes, $appDesc);

        array_push($appointmentDataArray, $appDataPoint);
    }

    for ($i = 0; $i < count($deadlineData); ++$i){
        $deadlineId = $deadlineData[$i]["deadlineId"];
        $userId = $deadlineData[$i]["userId"];
        $deadlineDT = $deadlineData[$i]["deadlineDT"];
        $deadlineDesc = $deadlineData[$i]["deadlineDesc"];
        $deadlineCheck = $deadlineData[$i]["deadlineCheck"];

        $deadlineDataPoint = new deadData($deadlineId, $userId, $deadlineDT, $deadlineDesc, $deadlineCheck);

        array_push($deadlineDataArray, $deadlineDataPoint);

    }

    return $user = new userData($userId, $firstName, $lastName, $age, $appointmentDataArray, $deadlineDataArray);

}

function getUserData($firstName){
    $statement = getConnect()->prepare("CALL GetUserId('" . $firstName . "')");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < count($data); ++$i) {
        $userId = $data[$i]["userId"];
        return $userId;
    }

    return 1;
}