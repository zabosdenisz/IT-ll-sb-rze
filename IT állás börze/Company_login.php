<?php
session_start();
require_once('config.php');

if(isset($_POST['submit']))
{
    if(isset($_POST['email'],$_POST['company_password']) && !empty($_POST['email']) && !empty($_POST['company_password']))
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['company_password']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = "select * from company where company_email = :email ";
            $handle = $pdo->prepare($sql);
            $params = ['email'=>$email];
            $handle->execute($params);
            if($handle->rowCount() > 0)
            {
                $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                /*if(password_verify($password, $getRow['company_password']))//itt van valami
                {*/
                    unset($getRow['company_password']);
                    $_SESSION = $getRow;
                    header('location:Company_Works.php');
                    exit();
                /*}
                else
                {
                    $errors[] = "Rossz e-mail cím vagy jelszó1";
                }*/
            }
            else
            {
                $errors[] = "Hibás e-mail vagy jelszó2";
            }

        }
        else
        {
            $errors[] = "Az e-mail cím érvénytelen";
        }

    }
    else
    {
        $errors[] = "E-mail és jelszó szükséges!";
    }
    /*
    <a href="#" id="fl">Forgot your password?</a>
                <form action="web.php" method="post" name="forget" id="forget" style="display:none">
                    <div class="form-group">
                        <label for="forgetEmail">E-mail</label>
                        <input type="email" class="form-control" id="forgetEmail" placeholder="Enter your e-mail address"
                               name="email">
                    </div>
                    <input type="hidden" name="action" value="forget">
                    <button type="submit" class="btn btn-primary">Reset password</button>
                </form>
    */
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>IT állásbörze</title>
</head>
<body class="bg-dark">
<script src="Company_login.js"></script>
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
            <h1><center>Cég bejelentezés</center></h1>
            <?php
            if(isset($errors) && count($errors) > 0)
            {
                foreach($errors as $error_msg)
                {
                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
            }
            ?>
            <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Email" id="Newuser2" class="form-control-plaintext">
                </div>
                <div class="form-group">
                    <label for="email">jelszó:</label>
                    <input type="password" name="company_password" placeholder="jelszó" id="password3" class="form-control-plaintext">
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Bejelentkezés</button>
                <a href="register.php" class="btn btn-dark">Regisztráció</a>
                <a href="login.php" class="btn btn-dark">Vissza</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
