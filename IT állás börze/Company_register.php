

<?php
session_start();
require_once('config.php');

if(isset($_POST['submit']))
{
    if(isset($_POST['company_name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['web'],$_POST['address'],$_POST['description'])
        && !empty($_POST['company_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['web']) && !empty($_POST['address'])  && !empty($_POST['description']))
    {
        $companyName = trim($_POST['company_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $phone = trim($_POST['phone']);
        $web = trim($_POST['web']);
        $address = trim($_POST['address']);
        $description = trim($_POST['description']);

        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = 'select * from company where company_email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);

            if($stmt->rowCount() == 0)
            {
                $sql = "insert into company (company_name, web, company_email, company_phone, address, company_description, company_password ,company_date) 
                        values(:cname,:web,:email,:phon,:address,:description,:pass,:date)";

                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':cname'=>$companyName,
                        ':web'=>$web,
                        ':email'=>$email,
                        ':phon'=>$phone,
                        ':address'=>$address,
                        ':description'=>$description,
                        ':pass'=>$password,
                        ':date'=>$date,

                    ];

                    $handle->execute($params);

                    $success = 'A felhaszn??l?? l??trehoz??sa sikeresen megt??rt??nt!';

                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $valCompanyName = $companyName;
                $valEmail = '';
                $valPassword = $password;
                $valPhone = $phone;

                $errors[] = 'Az email cim m??r regisztr??lt';
            }
        }
        else
        {
            $errors[] = "Az e-mail c??m ??rv??nytelen";
        }
    }
    else
    {
        if(!isset($_POST['company_name']) || empty($_POST['company_name']))
        {
            $errors[] = 'C??g nev??nek megad??sa k??telez??';
        }
        else
        {
            $valFirstName = $_POST['company_name'];
        }
        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'Email megad??sa k??telez??';
        }
        else
        {
            $valFirstName = $_POST['email'];
        }
        if(!isset($_POST['password']) || empty($_POST['password']))
        {
            $errors[] = 'jelsz?? megad??sa k??telez??';
        }
        else
        {
            $valFirstName = $_POST['password'];
        }

        if(!isset($_POST['phone']) || empty($_POST['phone']))
        {
            $errors[] = 'Telefon megad??sa k??telez??';
        }
        else
        {
            $valEmail = $_POST['phone'];
        }

        if(!isset($_POST['web']) || empty($_POST['web']))
        {
            $errors[] = 'Weboldal megad??sa k??telez??';
        }
        else
        {
            $valPassword = $_POST['web'];
        }
        if(!isset($_POST['address']) || empty($_POST['address']))
        {
            $errors[] = 'C??mnek  megad??sa k??telez??';
        }
        else
        {
            $valPhone = $_POST['address'];
        }
        if(!isset($_POST['description']) || empty($_POST['description']))
        {
            $errors[] = 'Le??r??s a c??gr??l megad??sa k??telez??';
        }
        else
        {
            $valPhone = $_POST['description'];
        }
    }
}
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>IT ??ll??sb??rze</title>
</head>
<body class="bg-dark">
<script src="Company_register.js"></script>
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
            <h1><center>C??g regisztr??ci??</center></h1>
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
            <form id="form" method="POST"  action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="email">C??g neve:</label>
                    <input type="text" name="company_name" placeholder="C??g neve" class="form-control-plaintext" value="<?php echo ($valCompanyName??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">Telefon:</label>
                    <input type="text" name="phone" placeholder="Telefon" class="form-control-plaintext" value="<?php echo ($valPhone??'')?>">
                    <span id="errSelect"></span>
                </div>
                <div class="form-group">
                    <label for="email">Weboldal:</label>
                    <input type="text" name="web" placeholder="Weboldal" class="form-control-plaintext" value="<?php /*echo ($valPhone??'')*/?>">
                </div>
                <div class="form-group">
                    <label for="email">C??m:</label>
                    <input type="text" name="address" placeholder="C??m" class="form-control-plaintext" value="<?php /*echo ($valPhone??'')*/?>">
                </div>
                <div class="form-group">
                    <label for="email">C??gle??r??s:</label><br>
                    <textarea name="description" id="text" placeholder="C??gle??r??s" class="form-control-plaintext"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Email" class="form-control-plaintext" value="<?php echo ($valEmail??'')?>">
                </div>
                <div class="form-group">
                    <label for="email">jelsz??:</label>
                    <input type="password" name="password" placeholder="jelsz??" class="form-control-plaintext" value="<?php echo ($valPassword??'')?>">
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Regisztr??ci??</button>
                <a href="login.php" class="btn btn-dark"> Bejelentkez??s</a>
                <a href="register.php" class="btn btn-dark> "Vissza"</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
