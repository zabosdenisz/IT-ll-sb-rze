<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="works.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>IT_állásbörze</title>
</head>
<body>
<div id="Header" class="container-fluid">
    <img src="Log.png" id="HeaderLogo"/>
    <div id="HeaderButton">
        <div id="HeaderButton2">
            <div><a href="register.php"><input id="b2" type="button" value="Regisztráció"></a></div>
            <div><a href="login.php"><input id="b3" type="button" value="Bejelentkezés"></a></div>
        </div></div></div>
<div id="szoveg">
    <hr>
    <p id="Header-p">Remek állás lehetöségek!</p>
</div>
<div id="HeaderBody" class="container-fluid"><p id="HeaderBody-p">IT Állásajánlatok, álláskeresés  </p></div>
<div id="Body">
    <div id="Within" class="container-fluid align-self-center">
        <table id="Within-table" >
            <?php

            require_once 'config.php';

            $sql = 'select * from work ';
            $stmt2 = $pdo->prepare($sql);
            $stmt2->execute();
            $dates2 = $stmt2->fetchAll();

            foreach($dates2 as $dates):
                ?>
                <?php
                $nu = date("Y-m-d H:i:s");
                $num = date_create ($dates['work_date']);
                $num3 = date_add($num,date_interval_create_from_date_string("10 days"));
                $hh = date_format($num3,"Y/m/d H:i:s");

                if( $hh <= $nu ){ ?>
                    <tr class="Whitin-tr2">
                        <td class="Whitin-td">
                            <table class="Within-table-table">
                                <tr class="Whitin-tr-tr"><td class="Whitin-td-td"><center>
                                            <?php  ?>
                                            <p class="description" value="<?= $dates['work_category']; ?>"><?= $dates['work_category']; ?></p>
                                        </center></td></tr>
                                <tr class="Whitin-tr-tr"><td class="Whitin-td-td"><center>
                                            <p class="money" value="<?= $dates['work_money']; ?>"><?= $dates['work_money']; ?></p>
                                        </center></td></tr>
                                <tr class="Whitin-tr-tr"><td class="Whitin-td-td"><center>
                                            <p class="Address" value="<?= $dates['work_address']; ?>"><?= $dates['work_address']; ?></p>
                                            <p class="Address" value="<?= $dates['work_date']; ?>"><?= $dates['work_date'];?></p>
                                        </center>
                                        <?php  ?>
                                        <a href="Working.php"  class="within-href"><input id="Select" type="button" value="Munkára"></a>
                                        </center>
                                        <?php
                                        $next = $dates['work_id'];
                                        $_SESSION['work_id'] = $next; ?>
                                    </td></tr>
                            </table>
                        </td>
                    </tr>
                <?php }else{ ?>
                    <tr class="Whitin-tr1" >
                        <td class="Whitin-td">
                            <table class="Within-table-table">
                                <tr class="Whitin-tr-tr"><td class="Whitin-td-td"><center>
                                            <?php  ?>
                                            <p class="description" value="<?= $dates['work_category']; ?>"><?= $dates['work_category']; ?></p>
                                        </center></td></tr>
                                <tr class="Whitin-tr-tr"><td class="Whitin-td-td"><center>
                                            <p class="money" value="<?= $dates['work_money']; ?>"><?= $dates['work_money']; ?></p>
                                        </center></td></tr>
                                <tr class="Whitin-tr-tr"><td class="Whitin-td-td"><center>
                                            <p class="Address" value="<?= $dates['work_address']; ?>"><?= $dates['work_address']; ?></p>
                                            <p class="Address" value="<?= $dates['work_date']; ?>"><?= $dates['work_date'];?></p>
                                        </center>
                                        <?php  ?>
                                        <a href="Working.php"  class="within-href"><input id="Select" type="button" value="Munkára"></a>
                                        </center>
                                        <?php
                                        $next = $dates['work_id'];
                                        $_SESSION['work_id'] = $next; ?>
                                    </td></tr>
                            </table>
                        </td>
                    </tr>
                <?php } ?>
            <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
