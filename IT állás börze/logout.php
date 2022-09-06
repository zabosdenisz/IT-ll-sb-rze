
<?php
session_start();
if(isset($_SESSION)){
    session_destroy();
    header('location:Works.php');
    exit();
}
?>
<?php
session_start();
require_once('Works.php');

?>