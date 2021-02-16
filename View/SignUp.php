<?php
session_start();
include "./header.php";

?>


<style>
    .logincon{
    margin: 7% 20% !important;
    width:60%;
}

.alert {
  color: 'red'
}

    </style>
<div  class="container logincon">
    <h2>Regester</h2>
    <br><br>
<form method="POST" action="../Controler/ServerLogIn.php">
<div class="mb-3">
    <label for="FullName" class="form-label">Full Name</label>
    <input required type="text"  name="FullName" class="form-control"  >
 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" required class="form-control"  name="Email" >
 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" required class="form-control" name="Password">
  </div>
  <div class="mb-3">
    <label  class="form-label"> Confirm Password</label>
    <input required type="password" class="form-control" name='rePaswword' >
  </div>
  <?php
  if(isset($_SESSION['msgPass'])) {
    echo '<p style = "color:red">' . $_SESSION['msgPass'] . '</p>';
      unset($_SESSION['msgPass']);
  }
  ?>
  <div class="mb-3">
    <label for="Address" class="form-label">Your Address</label>
    <input type="text"  name="Address" class="form-control"  >
 
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="Gender" value="Male">
  <label class="form-check-label" for="flexRadioDefault1">
   Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio"  name="Gender" value="Female" >
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
  <button name = 'signUp' type="submit" class="btn btn-primary">SignUp</button>
  <br>
  <br>

</form>
</div>










<?php include "./footer.php" ?>