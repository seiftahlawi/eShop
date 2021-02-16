<?php
session_start();
if(isset($_SESSION['user'])) {
  header('Location: ../View/index.php');
  require_once('./GoogleAPI/config.php');
  $login_url = $google_client->createAuthUrl(); 
}
include "./header.php";
include './FacebookApi/config.php';
$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token']))
 {
  $access_token = $_SESSION['access_token'];
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }

 $_SESSION['user_id'] = '';
 $_SESSION['user_name'] = '';
 $_SESSION['user_email_address'] = '';
 $_SESSION['user_image'] = '';

 $graph_response = $facebook->get("/me?fields=name,email", $access_token);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['user_email_address'] = $facebook_user_info['email'];
 }
 
}
else
{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/e-commerce/View/', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><div class="loginBtn loginBtn--facebook"> <text>Login with Facebook </text></div> </a></div>';
}
?>

 


<style>
    .logincon{
    margin: 7% 20% !important;
    width:60%;
}
.s{
    color:'blue';
}

.alert {
  color: 'red'
}

.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
  width: 180px
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}

.loginBtn--facebook text {
  font-size: 14px
}

/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}


.login-with-google-btn-container {
    width: 100%;
    text-align: center;
    padding-bottom: 10px;
    box-sizing: border-box
  }
.login-with-google-btn {
  transition: background-color .3s, box-shadow .3s;
  margin: auto;
  padding: 12px 16px 12px 42px;
  border: none;
  border-radius: 3px;
  box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
  
  color: #757575;
  font-size: 14px;
  font-weight: 500;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
  
  background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
  background-color: white;
  background-repeat: no-repeat;
  background-position: 12px 11px;
  
}

.login-with-google-btn:hover {
  opacity: 0.5

}

    </style>
<div  class="container logincon">
<div style="width:100%">



</div>
    <h2>LogIn</h2>
    <br>
    <br>
<form method = 'post' action="../Controler/ServerLogIn.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name = 'Email' required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name = 'Password' required type="password" class="form-control" required id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary" name = 'logIn'>LogIn</button>
  <br>
  <?php
  if(isset($_SESSION['msg'])) {
    echo '<br><p style = "color:red">' . $_SESSION['msg'] . '</p>';
    unset($_SESSION['msg']);
  }
  ?>

<?php
  require_once('./GoogleAPI/config.php');
  $login_url = $google_client->createAuthUrl(); 
?>
<div class = 'login-with-google-btn-container'>
                     <a href = <?php echo $login_url ?>> <button type="button" class="login-with-google-btn" >
                      Sign in with Google
                    </button> </a>
                    

        
                                  </div>

                                  <div class="panel panel-default">
    <?php 

if(isset($facebook_login_url))
    {
     echo $facebook_login_url;
   
  
} else
    {
      echo '<h3><b>Name :</b> '.$_SESSION['user_name'].'</h3>';
      echo '<h3><b>Email :</b> '.'</h3>';
      echo '<h3><a href="logout.php">Logout</h3></div>';
}

    ?>

   </div>

  <a  href="./SignUp.php" >I dont have account regester now</a>
</form>
</div>


<?php include "./footer.php" ?>