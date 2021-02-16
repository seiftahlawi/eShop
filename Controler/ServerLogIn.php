<?php include '../Model/dblog.php'?>

<?php
session_start();
//Sign Up Proccess
if(isset($_POST['signUp'])) { 
if ($_POST['Password'] != $_POST['rePaswword']) {
    $_SESSION['msgPass'] = 'Passwords not match'; 
    header('Location:../View/SignUp.php ');
   
} else {

    $FullName=$_POST['FullName'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $Address=$_POST['Address'];
    $Gender=["Gender"];
    $user=new user();
   $user->insertDocument($FullName, $Email,$Password,$Address,$Gender);
   $_SESSION['user'] = $Email;
   header('Location: ../View/index.php');
}
}

//Login Proccess

if(isset($_POST['logIn'])) {
    $i = 0;
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $LoggedInUser = array('Email'=> $Email, 'Password'=> $Password);
    $user=new user();
    $User =$user->SelectOneItems($LoggedInUser);
foreach($User as $c){
    $i = $i + 1;
}
if($i === 0) {
    $_SESSION['msg'] = 'user not found';
    header('Location:../View/login.php ');
} else {
    $_SESSION['user'] = $Email;
    header('Location: ../View/index.php ');
}
}
?>