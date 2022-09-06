<?php
session_start();

if(!$_SESSION['company_id']) {
    header('location:Company_login.php');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IT állásbörze</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-dark">
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1><center><?php echo ucfirst($_SESSION['company_name']);?><br>
                    Küldött levelek!</center></h1>
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

                $sql = 'select * from mail ';
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute();
                $dates2 = $stmt2->fetchAll();

                $x = $_SESSION['company_email'];

                foreach ($dates2 as $dates):
                if ($x == $dates['his']) { ?>
                <div class="form-group">
                    <label for="email">Küldte:</label>
                    <p value="<?= $dates['mine']; ?>"><?= $dates['mine']; ?></p>
                </div>
                <div class="form-group">
                    <label for="email">Cím:</label>
                    <p value="<?= $dates['title']; ?>"><?= $dates['title']; ?></p>
                </div>
                <div class="form-group">
                    <label for="email">Tartalom:</label><br>
                    <p value="<?= $dates['content']; ?>"><?= $dates['content']; ?></p>
                </div>
                <?php }endforeach;?>
                <a href="Company_SendMessege.php" class="btn btn-dark">Levél küldés</a>
                <a href="company_Works.php" class="btn btn-dark">Vissza</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>