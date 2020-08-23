<?php ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="background-color: #8e9294">

<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">

    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col-sm-12">
                <h1>Enter Your Mood (1 Sad - 5 Happy)</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">

                <input name="moodData" value="" type="text">
                <p style="color: red"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input name="dateMood" value="" type="date">
                <p style="color: red">  </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <input name="backButton" value="Back" type="button">
            </div>
        </div>

    </div>

    <input type="hidden" name="moodChoiceFinal" value="">

</form>


</body>



</html>
