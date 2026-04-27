<?php
session_start();
?>

<?php require_once("../includes/sql.php"); ?>
<?php include("tpl/header.html"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `log`='".$username."' AND `pass`='".md5($password)."'";
    echo $sql;
    $data =select_row($link, $sql);
var_dump($data);
    $dbusername = $data[0]['log'];
    $dbpassword = $data[0]['pass'];
    echo $data[0]['log'];
    echo $data[0]['pass'];
    if($username == $dbusername && md5($password) == $dbpassword)

    {


    $_SESSION['session_username']=$username;

    /* Redirect browser */
    header("Location: intropage.php");
    
    } else {

 $message =  "Не верное имя пользователя или пароль";
    }

} else {
    $message = "Все поля должны быть заполнены!";
}
}
?>




 
	<?php include("tpl/footer.html"); ?>
	
	<?php if (!empty($message)) {echo "<br><br><br><br><br><br><p class=\"error\">" . "СООБЩЕНИЕ: ". $message . "</p>";} ?>
	