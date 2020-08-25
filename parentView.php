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
        $chosenArray = ($user1->getAppointmentDataArray());
        $userIdShow="1";
    }
    elseif ($userId == "2"){
        $chosenArray = ($user2->getAppointmentDataArray());
        $userIdShow="2";
    }
    if ($appId <= (count($chosenArray))) {
        $appDTShow = $chosenArray[$appId]->getAppDT();
        $appNotesShow = $chosenArray[$appId]->getAppNotes();
        $appDescShow = $chosenArray[$appId]->getAppDesc();
    }
    if ($appId > (count($chosenArray))) {
        $noDataError = "No Data Found";
    }
    $appIdShow = $appId;

}

if (isset($_POST['inputButton3'])){
    $userId = $_POST['userId2'];
    $appId = $_POST['appId'];
    $appDT = $_POST['appDT2'];
    $appNotes = $_POST['appNotes2'];
    $appDesc = $_POST['appDesc2'];
    $appId = $appId + 1;

    if ($userId == 1){
        $appId = $appointmentArray1[$appId]->getAppId();
    }

    if ($userId == 2){
        $appId = $appointmentArray2[$appId]->getAppId();
    }


    var_dump($appId);
    var_dump($appDT);
    var_dump($appNotes);
    var_dump($appDesc);

    updateAppointmentData($appId, $appDT, $appNotes, $appDesc);
}

if (isset($_POST['inputButton4'])){
    $appId = $_POST['appId'];
    var_dump($appId);
    deleteAppointmentData($appId);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">

    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col-sm-12">
                <h1>Parent</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>Add details of dentist appointments for all</h2>
                <label>Choose a Person Id: (1-2)</label>
                <input name="userId" value="" type="text">

                <input name="appDT" value="" type="datetime-local">
                <p style="color: red"> <?php echo $appDateError;?> </p>
                <input name="appDesc" value="" type="text">
                <p style="color: red"> <?php echo $appDescError;?> </p>
                <input name="appNotes" value="" type="text">
                <p style="color: red"> <?php echo $appNotesError;?> </p>
                <input name="inputButton1" value="Input" type="submit" onclick="inputData_onClick">
                <p style="color: <?php echo $paraOutputAppColour; ?>" > <?php echo $paraOutputApp;?> </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a parent I wish to see details of upcoming appointments for all in my family</h2>
                Enter User Id
                <br>
                <input name="userId2" value ="<?php echo $userIdShow?>" type="text">
                <br>
                Enter Appointment Number
                <br>
                <input name="appId" value="<?php echo $appIdShow; ?>" type="text">
                <br>
                <input name="inputButton2" value="Search" type="submit">
                <br>
                <input name="appDT2" value="<?php echo $appDTShow; ?>" type="text">
                <br>
                <input name="appDesc2" value="<?php echo $appDescShow; ?>" type="text">
                <br>
                <input name="appNotes2" value="<?php echo $appNotesShow; ?>" type="text">
                <br>
                <input name="inputButton3" value="Update" type="submit">
                <br>
                <input name="inputButton4" value="Delete" type="submit">
                <p style="color: red" <?php echo $noDataError; ?>
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

<script language="javascript">
    function goBack(){
        location.href="index.php";
    }
</script>

</html>