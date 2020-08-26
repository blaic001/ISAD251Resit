<?php ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="background-color: #8e9294">
<div class="container" style="text-align: center">
    <div class="row">
        <div class="col-sm-12">
            <h1>Choose Your User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <input type="button" name="linkChild" value="Child" onclick="goToChildView()">
        </div>
        <div class="col-sm-6">
            <input type="button" name="moodData" value="Parent" onclick="goToParentView()">
        </div>
    </div>
</div>


</body>

<script language="JavaScript">
    function goToChildView(){
        location.href = "childView.php";
    }

    function goToParentView(){
        location.href = "parentView.php";
    }
</script>
</html>
