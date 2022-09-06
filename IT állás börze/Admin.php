<?php
session_start();

if(!$_SESSION['id'] ){
    header('location:User_login.php');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IT_állásbörze</title>
    <link type="text/css" rel="stylesheet" href="Working.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-dark">
<script src="Company_register.js"></script>
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1><center>Admin</center></h1><hr><hr>
            <?php
            if(isset($errors) && count($errors) > 0)
            {
                foreach($errors as $error_msg)
                {
                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
            }
            if(isset($success))
            {
                echo '<div class="alert alert-success">'.$success.'</div>';
            }
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

                    <center><p id="Box-Address-Header"><h2> Felrakot munkák! </h2></p></center>
                    <?php

                    require_once 'config.php';

                    $sql = 'select * from work ';
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->execute();
                    $dates3 = $stmt2->fetchAll();
                    foreach ($dates3 as $dates4):



                        $next = $dates4['work_id'];
                        $_SESSION['work_id'] = $next; ?>

                    <hr><div class="form-group" class="admin_color"><center>
                        <h5><?php echo $dates4['work_category'];?><br><?php echo $dates4['work_address'];?></h5><br>
                        <?php ?><br>
                        <a href="User_Working.php" >
                            <button type="submit" name="work_mail" class="btn btn-dark">Munkára</button></a>
                        <button type="submit" name="submit" class="btn btn-dark">Törlés</button>
                        <?php endforeach;?></div>
                    <hr><hr>
                <?php

                /*$work = $dates4['his'];

                $sql2 = "DELETE FROM work WHERE his='$work'";

                if(isset($_POST['work_mail'])){

                    if ($pdo->query($sql2) === false) {
                        echo "A rekord törlése nem sikerült: " . $pdo->error;
                    } else {
                        echo "Sikeres rekordtörlés.";echo $sql2;
                    } }
                //$pdo->query($sql2);*/

                ?>



                    <center><p id="Box-Address-Header"><h2> levelek! </h2></p></center>
                    <?php
                    require_once 'config.php';
                    $sql = 'select * from mail ';
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->execute();
                    $dates3 = $stmt2->fetchAll();
                    foreach ($dates3 as $dates4): ?><hr><center>
                            <h5><?php echo $dates4['mine'];?><br><?php echo $dates4['his']; ?><br><?php echo $dates4['title']; ?></h5></center></a>
                <br>
                        <a href="Message.php"><button type="submit" name="tt" class="btn btn-dark">Levélre</button></a>
                        <button type="submit" name="maildelete" class="btn btn-dark">Törlés</button>
                <?php endforeach; ?><hr><hr></center>
                <?php

                $email = $dates4['mine'];

                $sql = "DELETE FROM mail WHERE his='$email'";

                if(isset($_POST['maildelete'])){

                    if ($pdo->query($sql) === false) {
                        echo "A rekord törlése nem sikerült: " . $pdo->error;
                    } else {
                        echo "Sikeres rekordtörlés.";echo $sql;
                    } }
                $pdo->query($sql);

                ?>



                <center><p id="Box-Address-Header"><h2> Cégek! </h2></p></center>
                <?php
                require_once 'config.php';
                $sql = 'select * from company ';
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute();
                $dates3 = $stmt2->fetchAll();
                foreach ($dates3 as $dates4): ?><hr><center>
                    <h5><?php echo $dates4['company_name'];?><br><?php echo $dates4['company_email']; ?></h5></center></a>
                    <br>
                    <a href="User_Company_identification%20.php"><button type="submit" name="tt" class="btn btn-dark">Cégre</button></a>
                    <button type="submit" name="companydelete" class="btn btn-dark">Törlés</button>
                <?php endforeach;?>
                <?php

                $company = $dates4['company_email'];

                $sql3 = "DELETE FROM company WHERE company_email='$company'";

                if(isset($_POST['companydelete'])){

                    if ($pdo->query($sql3) === false) {
                        echo "A rekord törlése nem sikerült: " . $pdo->error;
                    } else {
                        echo "Sikeres rekordtörlés.";echo $sql3;
                    } }
                //$pdo->query($sql2);

                ?><hr><hr></center>


                <center><p id="Box-Address-Header"><h2> Felhasználók! </h2></p></center>
                <?php
                require_once 'config.php';
                $sql = 'select * from user ';
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute();
                $dates3 = $stmt2->fetchAll();
                foreach ($dates3 as $dates4): ?><hr><center>
                    <h5><?php echo $dates4['first_name'];?><?php echo " ".$dates4['last_name'];?><br><?php echo $dates4['email']; ?></h5></center></a>
                    <br>
                    <a href="User_identification%20.php"><button type="submit" name="tt" class="btn btn-dark">Felhasználóra</button></a>
                    <button type="submit" name="userdelete" class="btn btn-dark">Törlés</button>
                <?php endforeach;?>
                <?php

                $user = $dates4['email'];

                $sql4 = "DELETE FROM user WHERE email='$user'";

                if(isset($_POST['userdelete'])){

                    if ($pdo->query($sql4) === false) {
                        echo "A rekord törlése nem sikerült: " . $pdo->error;
                    } else {
                        echo "Sikeres rekordtörlés.";echo $sql4;
                    } }
                //$pdo->query($sql2);

                ?><hr></center>
                <a href="User_identification%20.php" class="btn btn-dark"> Vissza</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
