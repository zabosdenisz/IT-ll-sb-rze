<?php
session_start();
require_once('config.php');

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>IT_állásbörze</title>
</head>
<body class="bg-dark">

<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
            <h1><center>Bejelentkezés</center></h1>
                <br><br><center>
                <a href="Company_login.php" class="btn btn-dark">    cégként    </a>
                <a href="User_login.php" class="btn btn-dark">felhasználóként</a>
                </center><br>
                <center><a href="Works2.php" class="btn btn-dark">Vissza</a></center>
            </form>
        </div>
    </div>
</div>
</body>
</html>
