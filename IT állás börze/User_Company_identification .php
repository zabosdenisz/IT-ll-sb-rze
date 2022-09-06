<?php
session_start();

if(!$_SESSION['id']) {
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
    <a href="About%20us.html"> <img src="Log.png" id="HeaderLogo"/></a>
    <div id="HeaderButton">
         <div id="HeaderButton2">
            <div><a href="User_identification%20.php"><input id="b2" type="button" value="Saját adataim"></a></div>
            <div><a href="logout.php"><input id="b3" type="button" value="Kilépés"></a></div>
        </div></div></div>
<div id="szoveg">
    <hr>
    <p id="Header-p"><?php echo ucfirst($_SESSION['first_name']);?><?php echo " "?><?php echo ucfirst($_SESSION['last_name']); ?></p>
</div>
<div id="HeaderBody"><p id="HeaderBody-p">IT Állásajánlatok, álláskeresés</p></div>
<div>
    <div id="Body3"><br>
        <div id="Within3">
            <div id="Within3-left">
                <div id="Within3-left1"><div id="work">
                    </div></div>

                <div id="Within3-left2">
                    <?php
                    $generated_id = 2;
                    //echo $generated_id;

                    require_once 'config.php';

                    $sql = 'select * from company ';
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->execute();
                    $dates2 = $stmt2->fetchAll();
                    foreach ($dates2 as $dates):
                    if ($generated_id == $dates['company_id']) { ?>
                    <br><p class="money2" value="<?= $dates['company_name']; ?>"><?= $dates['company_name']; ?> </p>
                    <p class="information" value="<?= $dates['company_email']; ?>">
                        Email: <?= $dates['company_email']; ?> </p>
                    <p class="information"value="<?= $dates['company_phone']; ?>">
                        Telefon: <?= $dates['company_phone']; ?> </p>
                </div>
                <div id="Within3-left3">
                    <div class="Within3-left3-p">
                        <h2>Leírás:</h2>
                        <hr>
                        <p class="p" value="<?= $dates['company_description']; ?>"><?= $dates['company_description']; ?> </p>
                        <hr>
                    </div>
                    <div id="date">
                        <p class="information" value="<?= $dates['web']; ?>">
                            Weboldal:<?= $dates['web']; ?> </p>
                        <p class="information" value="<?= $dates['address']; ?>">
                            Helység:<?= $dates['address']; ?> </p>
                        <p class="information"value="<?= $dates['company_date']; ?>">Regisztrált: <?= $dates['company_date']; ?> </p>
                    </div></div>
            </div><br><?php }endforeach;?>
            <div id="Within3-right">
                <div id="Box-Address"><br>
                    <center><p id="Box-Address-Header"> Üzenet írása! </p></center>
                    <hr>
                    <a href="SendMessege.php"><input id="b42" type="button" value="Üzenet küldés!"></a>

                </div>
            </div>
        </div>
    </div>
</body>
</html>