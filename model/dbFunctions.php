<?php

const DB_SERVER = "proj-mysql.uopnet.plymouth.ac.uk";
const DB_USER = "ISAD251_CBlairRains";
const DB_PASSWORD = "ISAD251_22205293";
const DB_DATABASE = "ISAD251_CBlairRains";

function getConnect(){
    $dataSourceName = "mysql:dbname=".DB_DATABASE.";host=".DB_SERVER;
    $dbConnection = null;
    try {
        $dbConnection = new PDO($dataSourceName, DB_USER, DB_PASSWORD);
    } catch (PDOException $err) {
        echo "Connection Failed: ", $err->getMessage();
    }
    return $dbConnection;
}

function getUser($userId){
    $userData = getUserData($userId);
    $appointmentData = getAppointmentData($userId);
    $deadlineData = getDeadlineData($userId);

    $user = buildUser($userData, $appointmentData, $deadlineData);


    return $user;
}

function buildUser($userData, $appointmentData, $deadlineData){
    $appointmentDataArray = array();
    $deadlineDataArray = array();

    for ($i = 0; $i < count($userData); ++$i){
        $userId = $userData[$i]["userId"];
        $firstName = $userData[$i]["firstName"];
        $lastName = $userData[$i]["lastName"];
        $age = $userData[$i]["age"];
    }

    for ($i = 0; $i < count($appointmentData); ++$i){
        $appId = $appointmentData[$i]["appointmentId"];
        $userId = $appointmentData[$i]["userId"];
        $appDT = $appointmentData[$i]["appDT"];
        $appNotes = $appointmentData[$i]["appNotes"];
        $appDesc = $appointmentData[$i]["appDesc"];

        $appDataPoint = new appointmentData($appId, $userId, $appDT, $appNotes, $appDesc);

        array_push($appointmentDataArray, $appDataPoint);
    }

    for ($i = 0; $i < count($deadlineData); ++$i){
        $deadlineId = $deadlineData[$i]["deadlineId"];
        $userId = $deadlineData[$i]["userId"];
        $deadlineDT = $deadlineData[$i]["deadlineDT"];
        $deadlineDesc = $deadlineData[$i]["deadlineDesc"];
        $deadlineCheck = $deadlineData[$i]["deadlineCheck"];

        $deadlineDataPoint = new deadlineData($deadlineId, $userId, $deadlineDT, $deadlineDesc, $deadlineCheck);

        array_push($deadlineDataArray, $deadlineDataPoint);

    }

    return $user = new userData($userId, $firstName, $lastName, $age, $appointmentDataArray, $deadlineDataArray);

}

function getUserId($firstName){
    $statement = getConnect()->prepare("CALL GetUserId($firstName)");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function getUserData($userId){
    $statement = getConnect()->prepare("CALL GetUserData('" . $userId . "')");


    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);


    return $data;
}

function getAppointmentData($userId){
    $statement = getConnect()->prepare("CALL GetAppointmentData('" . $userId . "')");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function getDeadlineData($userId){
    $statement = getConnect()->prepare("CALL GetDeadlineData('" . $userId . "')");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function setAppointmentData($userId, $appDT, $appNotes, $appDesc){
    $statement = getConnect()->prepare("CALL SetAppointmentData('" . $userId . "', '" . $appDT . "', '" . $appNotes . "', '" . $appDesc . "')");
    $statement->execute();
}

function setDeadlineData($userId, $deadlineDT, $deadlineDesc, $deadlineCheck){
    $statement = getConnect()->prepare("CALL SetDeadlineData('" . $userId . "', '" . $deadlineDT . "', '" . $deadlineDesc . "', '" . $deadlineCheck . "')");
    $statement->execute();
}

function deleteAppointmentData($appId){
    $statement = getConnect()->prepare("CALL DeleteAppointmentData('" . $appId . "')");
    $statement->execute();
}

function deleteDeadlineData($deadlineId){
    $statement = getConnect()->prepare("CALL DeleteDeadlineData('" . $deadlineId . "')");
    $statement->execute();
}

function updateAppointmentData($appId, $appDT, $appNotes, $appDesc){
    $statement = getConnect()->prepare("CALL UpdateAppointmentData('" . $appId . "', '" . $appDT . "', '" . $appNotes . "', '" . $appDesc . "')");
    $statement->execute();
}

function updateDeadlineData($deadlineId, $deadlineDT, $deadlineDesc, $deadlineCheck){
    $statement = getConnect()->prepare("CALL UpdateDeadlineData('" . $deadlineId . "', '" . $deadlineDT . "', '" . $deadlineDesc . "', '" . $deadlineCheck . "')");
    $statement->execute();
}