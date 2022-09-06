<?php
session_start();

if(!$_SESSION['id'] ){
    header('location:User_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="Working.css">
    <title>IT_állásbörze</title>
</head>
<body>
<div id="Header">
    <img src="Log.png" id="HeaderLogo"/>
    <div id="HeaderButton">
        <div id="HeaderButton2">
            <div><a href="User_Works.php"><input id="b2" type="button" value="Munkák"></a></div>
            <div><a href="Logout.php"><input id="b3" type="button" value="Kilépés"></a></div>
        </div></div></div>
<div id="szoveg">
    <hr>
    <p id="Header-p"><?php echo ucfirst($_SESSION['first_name']);?><?php echo " "?><?php echo ucfirst($_SESSION['last_name']); ?></p>
</div>
<div id="HeaderBody"><p id="HeaderBody-p">IT Állásajánlatok, álláskeresés</p></div>
<div>
    <div id="Body3">
        <div id="Within3"><br>
            <div id="Within3-left">
                <div id="Within3-left1"><div id="work">
                    </div></div>
                <div id="Within3-left2">
                    <?php
                    $id = $_SESSION['id'];

                    require_once 'config.php';

                    $sql = 'select * from user ';
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->execute();
                    $dates2 = $stmt2->fetchAll();
                    foreach ($dates2 as $dates):
                    if ($id == $dates['id']) {
                    ?>
                    <br><br><a class="money2" value="<?= $dates['first_name']; ?>"><?= $dates['first_name']; ?> </a>
                    <a class="money2" value="<?= $dates['last_name']; ?>"><?= $dates['last_name']; ?> </a>
                    <p class="information" value="<?= $dates['email']; ?>"> Email: <?= $dates['email']; ?> </p>
                    <p class="information" value="<?= $dates['phone']; ?>">Telefon: <?= $dates['phone']; ?> </p>
                </div>
                <div id="Within3-left3">
                    <div class="Within3-left3-p">
                        <h2>Leírás:</h2>
                        <hr>
                        <p class="p" value="<?= $dates['biography']; ?>"> <?= $dates['biography']; ?> </p>
                        <hr>
                    </div>
                    <div id="date">
                        <p class="information"value="<?= $dates['date']; ?>">Regisztrált: <?= $dates['date']; ?> </p>
                        </div></div>
            </div><br>
            <div id="Within3-right">
                <div id="Box-Address"><br>
                    <?php $value = $dates['id'];
                    if($value == 1){?>
                    <center><p id="Box-Address-Header"> Admin! </p></center>
                    <hr>
                    <a href="Admin.php"><input id="b42" type="button" value="Admin"></a>
                    <br><br><hr><hr><?php } ?>
                    <center><p id="Box-Address-Header"> Adatváltoztatás! </p></center>
                    <hr>
                    <a href="User_Newidentification.php"><input id="b42" type="button" value="Adatváltoztatás"></a>
                    <br><br><hr><hr>

                    <center><p id="Box-Address-Header"> Kapott leveleim! </p></center>
                    <hr>
                        <a href="Message.php"><input id="b42" type="button" value="Kapott leveleim"></a>
                    <?php }endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>