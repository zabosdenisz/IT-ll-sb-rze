
<?php
session_start();
require_once('config.php');

    if(!$_SESSION['company_id']) {
    header('location:Company_login.php');
    }

if(isset($_POST['submit']))
{
    if(isset($_POST['address'],$_POST['category'],$_POST['description'],$_POST['money'])
        && !empty($_POST['address']) && !empty($_POST['category'])  && !empty($_POST['description']) && !empty($_POST['money']))
    {
        $address = trim($_POST['address']);
        $category = trim($_POST['category']);
        $description = trim($_POST['description']);
        $money = trim($_POST['money']);

        $id = ucfirst($_SESSION['company_id']);

        $options = array("cost"=>4);
        $date = date('Y-m-d H:i:s');

        $query = $pdo->prepare(
            "insert into work (company_id,work_category, work_description, work_address, work_money, work_date) 
                    values (:cid,:cate,:descr,:addre,:mone,:created_at)"
        );

        $query->execute(array(
            ':cid'=>$id,
            ':cate'=>$category,
            ':descr'=>$description,
            ':addre'=>$address,
            ':mone'=>$money,
            ':created_at'=>$date
        ));
    }else{
        if(!isset($_POST['category']) || empty($_POST['category']))
        {
            $errors[] = 'kategoria szükséges';
        }
        else
        {
            $valPassword = $_POST['category'];
        }
        if(!isset($_POST['description']) || empty($_POST['description']))
        {
            $errors[] = 'leírás  szükséges';
        }
        else
        {
            $valPhone = $_POST['description'];
        }
        if(!isset($_POST['address']) || empty($_POST['address']))
        {
            $errors[] = 'helység szükséges';
        }
        else
        {
            $valPhone = $_POST['address'];
        }
        if(!isset($_POST['money']) || empty($_POST['money']))
        {
            $errors[] = 'PÉNZ megadása szükséges';
        }
        else
        {
            $valPhone = $_POST['money'];
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
<script src="Create_work.js"></script>
<div class="container h-100">
    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">


            <h1><center><?php echo ucfirst($_SESSION['company_name']); ?><br>
                    Munka létrehozása</center></h1>
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
                    <label for="email">Munka kategóriája:</label>
                    <input type="text" name="category" placeholder="kategória" class="form-control-plaintext" >
                </div>
                <div class="form-group">
                    <label for="email">Leírás:</label><br>
                    <textarea name="description" id="text" placeholder="Leírás" class="form-control-plaintext"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">Fizetni kíván összeg:</label>
                    <input type="text" name="money" placeholder="összeg" class="form-control-plaintext" >
                </div>
                <div class="form-group">
                    <label for="email">Cím:</label>
                    <input type="text" name="address" placeholder="Cím" class="form-control-plaintext" >
                </div>
                <button type="submit" name="submit" class="btn btn-dark">Létrehozás</button>
                <a href="Company_Works.php" class="btn btn-dark">Vissza</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
