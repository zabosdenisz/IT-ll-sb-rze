<?php
session_start();
require_once('config.php');

if(isset($_POST['submit']))
{
    if(isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['biography'])
        && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['biography']))
    {
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $phone = trim($_POST['phone']);
        $biogra = trim($_POST['biography']);

        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = 'select * from user where email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);

            if($stmt->rowCount() == 0)
            {
                $sql = "insert into user (first_name, last_name, email, phone , biography, `password`, date) values(:fname,:lname,:email,:phon,:bio,:pass,:created_at)";

                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fname'=>$firstName,
                        ':lname'=>$lastName,
                        ':email'=>$email,
                        ':pass'=>$hashPassword,
                        ':phon'=>$phone,
                        ':bio'=>$biogra,
                        ':created_at'=>$date,

                    ];

                    $handle->execute($params);

                    $success = 'A felhasználó létrehozása sikeresen megtörtént';

                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $valFirstName = $firstName;
                $valLastName = $lastName;
                $valEmail = '';
                $valPassword = $password;
                $valPhone = $phone;

                $errors[] = 'Az email cim már regisztrált';
            }
        }
        else
        {
            $errors[] = "Az e-mail cím érvénytelen";
        }
    }
    else
    {
        if(!isset($_POST['first_name']) || empty($_POST['first_name']))
        {
            $errors[] = 'A keresztnév megadása kötelező';
        }
        else
        {
            $valFirstName = $_POST['first_name'];
        }
        if(!isset($_POST['last_name']) || empty($_POST['last_name']))
        {
            $errors[] = 'A vezetéknév megadása kötelező';
        }
        else
        {
            $valLastName = $_POST['last_name'];
        }

        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'E-mail megadása kötelező';
        }
        else
        {
            $valEmail = $_POST['email'];
        }

        if(!isset($_POST['password']) || empty($_POST['password']))
        {
            $errors[] = 'Jelszó szükséges';
        }
        else
        {
            $valPassword = $_POST['password'];
        }
        if(!isset($_POST['phone']) || empty($_POST['phone']))
        {
            $errors[] = 'Telefon szükséges';
        }
        else
        {
            $valPhone = $_POST['phone'];
        }
        if(!isset($_POST['biography']) || empty($_POST['biography']))
        {
            $errors[] = 'önéletrajz szükséges';
        }
        else
        {
            $valPhone = $_POST['biography'];
        }

    }

}
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>IT_állásbörze</title>
</head>
<body class="bg-dark">

<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1><center>Regisztráció</center></h1>
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
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Email" class="form-control-plaintext" value="<?php echo ($valEmail??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">jelszó:</label>
                    <input type="password" name="password" placeholder="jelszó" class="form-control-plaintext" value="<?php echo ($valPassword??'')?>">
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Regisztráció</button>
                <a href="login.php" class="btn btn-dark">Bejelentkezés</a>
                <a href="register.php"><button type="submit" name="back" class="btn btn-dark">Vissza</button></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
