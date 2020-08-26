<?php
include $_SERVER['DOCUMENT_ROOT'] . '/model/dbFunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/userData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/deadlineData.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/appointmentData.php';

$user = getUser(2);

$deadlineArray = ($user->getDeadlineDataArray());

$deadlineDateError = "";
$deadlineDescError = "";
$deadlineNotesError= "";
$paraOutputDeadline= "";
$paraOutputDeadlineColour= "black";
$deadlineDTShow = "";
$deadlineDescShow= "";
$deadlineCheckShow ="";
$deadlineIdShow="";

if (isset($_POST['inputButton1'])){
    $userId = $user->getUserId();
    $deadlineDT = $_POST['deadlineDT'];
    $deadlineDesc = $_POST['deadlineDesc'];
    $deadlineCheck = $_POST['deadlineCheck'];

    if (empty($_POST['deadlineDT'])){
        $deadlineDateError = "Please enter a correct date.";
    }

    elseif (empty($_POST['deadlineDesc'])) {
        $deadlineDescError = "Please enter a correct description.";
    }

    elseif (empty($_POST['deadlineCheck'])){
        $deadlineNotesError = "Please enter valid notes.";
    }

    else{
        setDeadlineData($userId, $deadlineDT, $deadlineDesc, $deadlineCheck);

        $paraOutputDeadline = "Appointment Successfully Added";
    }
}

if (isset($_POST['inputButton2'])){
    $deadlineId = $_POST['deadlineId'];
    $deadlineIdShow = $deadlineId;
    $deadlineDTShow = $deadlineArray[$deadlineId]->getDeadlineDT();
    $deadlineDescShow = $deadlineArray[$deadlineId]->getDeadlineDesc();
    $deadlineCheckShow = $deadlineArray[$deadlineId]->getDeadlineCheck();
}

if (isset($_POST['inputButton3'])){
    $deadlineId = $_POST['deadlineId'];
    $deadlineDT = $_POST['deadlineDT2'];
    $deadlineDesc = $_POST['deadlineDesc2'];
    $deadlineCheck = $_POST['deadlineCheck2'];
    $deadlineId = $deadlineId;

    $deadlineIdShow = $deadlineId;
    $deadlineDTShow = $deadlineDT;
    $deadlineDescShow = $deadlineDesc;
    $deadlineCheckShow = $deadlineCheck;
    $deadlineId = $deadlineArray[$deadlineId]->getDeadlineId();
    updateDeadlineData($deadlineId, $deadlineDT, $deadlineDesc, $deadlineCheck);
}

if (isset($_POST['inputButton4'])){
    $deadlineId = $_POST['deadlineId'];
    $deadlineId = $deadlineArray[$deadlineId]->getDeadlineId();
    deleteDeadlineData($deadlineId);
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Child</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="background-color: #8e9294">

<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">

    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col-sm-12">
                <h1>Child Interface</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a child I wish to enter details of deadlines I need to meet</h2>
                <input name="deadlineDT" value="" type="datetime-local">
                <p style="color: red"> <?php echo $deadlineDateError;?> </p>
                <input name="deadlineDesc" value="" type="text">
                <p style="color: red"> <?php echo $deadlineDescError;?> </p>
                <input name="deadlineCheck" value="" type="text">
                <p style="color: red"> <?php echo $deadlineNotesError;?> </p>
                <input name="inputButton1" value="Input" type="submit">
                <p style="color: <?php echo $paraOutputDeadlineColour; ?>" > <?php echo $paraOutputDeadline;?> </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a child I wish to see what deadlines I have coming up</h2>
                <input name="deadlineId" value="<?php echo $deadlineIdShow;?>" type="text">
                <input name="inputButton2" value="Search" type="submit">
                <input name="deadlineDT2" value="<?php echo $deadlineDTShow;?>" type="text">
                <input name="deadlineDesc2" value="<?php echo $deadlineDescShow;?>" type="text">
                <input name="deadlineCheck2" value="<?php echo $deadlineCheckShow;?>" type="text">
                <input name="inputButton3" value="Update" type="submit">
                <input name="inputButton4" value="Delete" type="submit">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a child I wish to amend my deadline to show that I have met it</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a child I wish to amend my deadline to move it</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>As a child I wish to delete my deadline</h2>
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
