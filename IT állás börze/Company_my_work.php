<?php
session_start();

if(!$_SESSION['company_id']) {
    header('location:Company_login.php');
}
?>
<!doctype html>
<html>
<head>
    <title>IT állásbörze</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-dark">
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1><center><?php echo ucfirst($_SESSION['company_name']);?><br>
                    Munkáim!</center></h1><hr><hr>
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
                <?php
                require_once 'config.php';

                $sql = 'select * from work ';
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute();
                $dates2 = $stmt2->fetchAll();

                $x = $_SESSION['company_id'];

                foreach ($dates2 as $dates):
                    if ($x == $dates['company_id']) { ?>
                        <div class="form-group">
                            <label for="email"><h5>Kategoria:</h5></label>
                            <p value="<?= $dates['work_category']; ?>"><?= $dates['work_category']; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="email"><h5>Szöveg:</h5></label>
                            <p value="<?= $dates['work_description']; ?>"><?= $dates['work_description']; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="email"><h5>Felrakás dátuma:</h5></label><br>
                            <p value="<?= $dates['work_date']; ?>"><?= $dates['work_date']; ?></p>
                        </div><hr>
                        <center><button type="submit" name="submit" class="btn btn-dark">Törlés</button></center><hr><hr>
                    <?php }endforeach;?>
                <a href="Company_identification%20.php" class="btn btn-dark">Vissza</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>