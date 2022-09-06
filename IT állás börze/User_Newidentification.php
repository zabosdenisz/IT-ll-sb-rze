<?php
session_start();
require_once('config.php');

    if(!$_SESSION['id']) {
        header('location:User_login.php');
    }
if(isset($_POST['submit'])) {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['biography'], $_POST['password'])
        && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['biography'])) {

        $fname = trim($_POST['first_name']);
        $lname = trim($_POST['last_name']);
        $password = trim($_POST['password']);
        $phone = trim($_POST['phone']);
        $biography = trim($_POST['biography']);

        $id = ucfirst($_SESSION['id']);

        $sql = "UPDATE user SET first_name='$fname', last_name='$lname', phone='$phone',
               biography='$biography',password='$password' where id='$id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $pdo = null;
    }
}

?>



<!doctype html>
<html>
<head>
    <title>IT_állásbörze</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-dark">
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1><center><p id="Header-p"><?php echo ucfirst($_SESSION['first_name']);?><?php echo " "?><?php echo ucfirst($_SESSION['last_name']); ?></p>
                    </p>Adatt modositása</center></h1>
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
                <div class="form-group">
                    <label for="email">Vezeték név:</label>
                    <input type="text" name="first_name" placeholder="Vezeték név" class="form-control-plaintext" value="<?php echo ($valFirstName??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">Kereszt név:</label>
                    <input type="text" name="last_name" placeholder="Kereszt név" class="form-control-plaintext" value="<?php echo ($valLastName??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">Telefon:</label>
                    <input type="text" name="phone" placeholder="Telefon" class="form-control-plaintext" value="<?php echo ($valPhone??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">Önéletrajz:</label><br>
                    <textarea name="biography" id="text" placeholder="Önéletrajz" class="form-control-plaintext"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">jelszó:</label>
                    <input type="password" name="password" placeholder="jelszó" class="form-control-plaintext" value="<?php echo ($valPassword??'')?>">
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Modositás</button>
                <a href="User_Working.php"><button type="submit" name="back" class="btn btn-dark">Vissza</button></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
