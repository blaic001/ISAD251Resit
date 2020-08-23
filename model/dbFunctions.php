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
}
