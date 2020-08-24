<?php
include $_SERVER['DOCUMENT_ROOT'] . '/model/dbFunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/userData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/deadlineData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/appointmentData.php';

$user = getUser("John");

$paraOutputAppColour= "black";

if (isset($_POST['inputButton1'])){
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
        setAppointmentData($user->getUserId(), $appDate, $appDesc, $appNotes);

        $paraOutputApp = "Appointment Successfully Updated";
    }
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
                $appId, $userId, $appDT, $appNotes, $appDesc
                <h2>As a parent I wish to add details of dentist appointments for all in my family</h2>
                <input name="appDT" value="" type="date">
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
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a parent I wish to change the details of any appointments for all in my family </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a parent I wish to add notes to an appointment that has taken place</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a parent I wish to cancel appointments for any in my family</h2>
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