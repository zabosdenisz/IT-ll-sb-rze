<?php
session_start();
require_once('config.php');

if(!$_SESSION['id']) {
    header('location:User_login.php');
}
if(isset($_POST['submit']))
{
    if(isset($_POST['his'],$_POST['title'],$_POST['content'])
        && !empty($_POST['his']) && !empty($_POST['title'])  && !empty($_POST['content']))
    {
        $address = trim($_POST['his']);
        $category = trim($_POST['title']);
        $description = trim($_POST['content']);

        $id = $_SESSION['email'];

        $options = array("cost"=>4);
        $date = date('Y-m-d H:i:s');

        $query = $pdo->prepare(
            "insert into mail (mine,his, title, content, mail_date)
                    values (:min,:his,:tit,:con,:mdate)"
        );

        $sql = 'select * from company ';
        $stmt2 = $pdo->prepare($sql);
        $stmt2->execute();
        $dates2 = $stmt2->fetchAll();

        $i = 0;
        foreach ($dates2 as $dates):
            if ($address == $dates['company_email']) {

                $query->execute(array(
                    ':min' => $id,
                    ':his' => $address,
                    ':tit' => $category,
                    ':con' => $description,
                    ':mdate' => $date
                ));
            }else if($i == 1){ $i ++;
                $errors[] = 'Nem létezik ilyen emailü cég!';} endforeach;
    }else{
        if(!isset($_POST['his']) || empty($_POST['his']))
        {
            $errors[] = 'Kinek küldi';
        }
        else
        {
            $valPassword = $_POST['his'];
        }
        if(!isset($_POST['content']) || empty($_POST['content']))
        {
            $errors[] = 'Szöveg tartalma!';
        }
        else
        {
            $valPhone = $_POST['content'];
        }
        if(!isset($_POST['title']) || empty($_POST['title']))
        {
            $errors[] = 'Mi a fejléce?';
        }
        else
        {
            $valPhone = $_POST['title'];
        }
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
                <h1><center><?php echo ucfirst($_SESSION['first_name']); echo ucfirst($_SESSION['last_name']);?><br>
                        Levél írás</center></h1>
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
                        <label for="email">Küldi:</label>
                        <?php echo ucfirst($_SESSION['email']); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Kinek:</label>
                        <input type="text" name="his" placeholder="összeg" class="form-control-plaintext" >
                    </div>
                    <div class="form-group">
                        <label for="email">Cím:</label>
                        <input type="text" name="title" placeholder="Cím" class="form-control-plaintext" >
                    </div>
                    <div class="form-group">
                        <label for="email">Tartalom:</label><br>
                        <textarea name="content" id="text" placeholder="Leírás" class="form-control-plaintext"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-dark">Létrehozás</button>
                    <a href=User_identification%20.php" class="btn btn-dark">Vissza</a>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>