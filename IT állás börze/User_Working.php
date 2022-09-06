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
    <div id="Body3">
        <br>
        <div id="Within3">
            <div id="Within3-left">
                <div id="Within3-left1"><div id="work">
                    </div></div>
                <div id="Within3-left2">
                    <?php
                    $generated_id = $_SESSION['work_id'];
                    /*echo $generated_id;*/

                    require_once 'config.php';

                    $sql = 'select * from work ';
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->execute();
                    $dates2 = $stmt2->fetchAll();

                    foreach ($dates2 as $dates):
                    if ($generated_id == $dates['work_id']) {


                    ?>

                    <br><p class="money2" value="<?= $dates['work_money']; ?>"><?= $dates['work_money']; ?> </p>

                    <p class="information"><br> Helység: <p class="information2" value="<?= $dates['work_address']; ?>"><?= $dates['work_address']; ?></p>
                </div>
                <div id="Within3-left3"><div class="Within3-left3-p"><p class="p">Leírás:</p><hr><br>
                        <p class="p"
                           value="<?= $dates['work_category']; ?>"><?= $dates['work_category']; ?>
                        </p>
                        <p class="p" value="<?= $dates['work_description']; ?>"><?= $dates['work_description']; ?>
                        </p>
                        <hr>
                        <a href="User_Company_identification%20.php" class="within-href">
                            <?php
                            $next = $generated_id;
                            $_SESSION['company_view_id'] = $next; ?>
                            <input id="Select" type="button" value="Cégröl"></a>
                        <a href="SendMessege.php"  class="within-href"><input id="Select" type="button" value="Üzenet írása"></a>
                    </div>
                    <div id="date">Feladás dátuma: <p class="p" value="<?= $dates['work_date']; ?>"><?= $dates['work_date']; ?></p>
                    </div></div>
            </div><br>
            <div id="Within3-right">
                <div id="Box-Address"><br>
                    <?php
                    require_once 'config.php';

                    $sql = 'select * from company ';
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->execute();
                    $dates4 = $stmt2->fetchAll();

                    foreach ($dates4 as $dates3):
                        if ($dates3['company_id'] == $dates['company_id']) { ?>
                            <p id="Box-Address-Header" > Kapcsolatfelvétel</p>
                            <hr>
                            <p class="Box-Address-p">Email</p>
                            <p class="Box-Address-pp" value="<?= $dates3['company_email']; ?>"><?= $dates3['company_email']; ?></p>
                            <br>
                            <p class="Box-Address-p" >Telefon</p>
                            <p class="Box-Address-pp" value="<?= $dates3['company_phone']; ?>"><?= $dates3['company_phone']; ?></p>
                        <?php }endforeach;?>
                    <?php }endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>