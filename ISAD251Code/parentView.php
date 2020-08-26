<?php
include $_SERVER['DOCUMENT_ROOT'] . '/model/dbFunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/userData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/deadlineData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/appointmentData.php';



$user1 = getUser(1);
$user2 = getUser(2);

$appointmentArray1 = ($user1->getAppointmentDataArray());
$appointmentArray2 = ($user2->getAppointmentDataArray());

$appDateError = "";
$appDescError = "";
$appNotesError= "";
$paraOutputApp= "";
$appDTShow = "";
$appDescShow= "";
$appNotesShow ="";
$userIdShow="";
$noDataError="";
$appIdShow="";
$updateDelete="";

$paraOutputAppColour= "black";

if (isset($_POST['inputButton1'])){
    $userId = $_POST['userId'];
    $appDate = $_POST['appDT'];
    $appDesc = $_POST['appDesc'];
    $appNotes = $_POST['appNotes'];

    if (empty($_POST['appDT'])){
        $appDateError = "Please enter a correct date.";
    }

    elseif (empty($_POST['appDesc'])) {
        $appDescError = "Please enter a correct description.";
    }

    elseif (empty($_POST['appNotes'])){
        $appNotesError = "Please enter valid notes.";
    }

    else{
        setAppointmentData($userId, $appDate, $appDesc, $appNotes);

        $paraOutputApp = "Appointment Successfully Added";
    }
}

if (isset($_POST['inputButton2'])){
    $userId = $_POST['userId2'];
    $appId = $_POST['appId'];

    if ($userId == "1"){
        $userIdShow="1";
        if ($appId >= (count($appointmentArray1)) or ($appId < 0) or ($appId == null)){
            $noDataError = "No Data Found";
        }
        else {
            $chosenArray = ($user1->getAppointmentDataArray());
            if ($appId <= (count($chosenArray))) {
                $appDTShow = $chosenArray[$appId]->getAppDT();
                $appNotesShow = $chosenArray[$appId]->getAppNotes();
                $appDescShow = $chosenArray[$appId]->getAppDesc();
            }
            else {
                $noDataError = "No Data Found";
            }
        }
    }
    elseif ($userId == "2"){
        $userIdShow="2";
        if ($appId >= (count($appointmentArray2)) or ($appId < 0) or ($appId == null)){
            $noDataError = "No Data Found";
        }
        else {
                $chosenArray = ($user2->getAppointmentDataArray());
                if ($appId <= (count($chosenArray))) {
                    $appDTShow = $chosenArray[$appId]->getAppDT();
                    $appNotesShow = $chosenArray[$appId]->getAppNotes();
                    $appDescShow = $chosenArray[$appId]->getAppDesc();
                }
                else {
                    $noDataError = "No Data Found";
            }
            }
        }
    else {
        $noDataError = "No User Found";
        }
    $appIdShow = $appId;

}

if (isset($_POST['inputButton3'])){
    $userId = $_POST['userId2'];
    $appId = $_POST['appId'];
    $appDT = $_POST['appDT2'];
    $appNotes = $_POST['appNotes2'];
    $appDesc = $_POST['appDesc2'];

    if ($userId == 1){
        $appId = $appointmentArray1[$appId]->getAppId();
    }

    if ($userId == 2){
        $appId = $appointmentArray2[$appId]->getAppId();
    }

    updateAppointmentData($appId, $appDT, $appNotes, $appDesc);
    $updateDelete = "Data Successfully Updated";
}

if (isset($_POST['inputButton4'])){
    $appId = $_POST['appId'];
    $userId = $_POST['userId2'];

    if (empty($_POST['appId'])){
        $updateDelete = "Data failed to delete";
    }
    else{
        if ($userId == 1){
            $appId = $appointmentArray1[$appId]->getAppId();
            deleteAppointmentData($appId);
            $updateDelete = "Data Successfully Deleted";
        }

        elseif ($userId == 2){
            $appId = $appointmentArray2[$appId]->getAppId();
            deleteAppointmentData($appId);
            $updateDelete = "Data Successfully Deleted";
        }
        else {
            $updateDelete = "Data failed to delete";
        }
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body style="background-color: #8e9294">
<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">

    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col-sm-12">
                <h1>Parent Interface</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Add Appointment</h2>
                <p>Choose a Person Id: (1-2)</p>
                <input name="userId" value="" type="text">
                <p></p>
                <p>Enter the Date:</p>
                <input name="appDT" value="" type="datetime-local">
                <p style="color: red"> <?php echo $appDateError;?> </p>
                <p>Describe the appointment:</p>
                <input name="appDesc" value="" type="text">
                <p style="color: red"> <?php echo $appDescError;?> </p>
                <p>Any Notes?</p>
                <input name="appNotes" value="" type="text">
                <p style="color: red"> <?php echo $appNotesError;?> </p>
                <input name="inputButton1" value="Add" type="submit" onclick="inputData_onClick">
                <p style="color: <?php echo $paraOutputAppColour; ?>" > <?php echo $paraOutputApp;?> </p>
            </div>
            <div class="col-sm-6">
                <h2>Edit, View and Delete Appointments</h2>
                <p>Enter User Id</p>
                <input name="userId2" value ="<?php echo $userIdShow?>" type="text">
                <p>Enter Appointment Number</p>
                <input name="appId" value="<?php echo $appIdShow; ?>" type="text">
                <p></p>
                <input name="inputButton2" value="Search" type="submit">
                <p style="color: red"> <?php echo $noDataError; ?></p>
                <p>Date</p>
                <input name="appDT2" value="<?php echo $appDTShow; ?>" type="text">
                <p>Description</p>
                <input name="appDesc2" value="<?php echo $appDescShow; ?>" type="text">
                <p>Notes</p>
                <input name="appNotes2" value="<?php echo $appNotesShow; ?>" type="text">
                <p></p>
                <input name="inputButton3" value="Update" type="submit">
                <p></p>
                <input name="inputButton4" value="Delete" type="submit">
                <p><?php echo $updateDelete?></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <input name="backButton" value="Back" type="button" onclick="goBack()">
            </div>
        </div>

    </div>

    <input type="hidden" name="moodChoiceFinal" value="">

</form>
</body>

<script language="javascript">
    function goBack(){
        location.href="index.php";
    }
</script>

</html>