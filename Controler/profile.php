<?php include '../Model/dblog.php'?>
<?php

    $user=new user();
 
    
    $x = array('Email'=> $_SESSION['user']);
    $rows=$user->SelectOneItems($x);
    foreach($rows as $row){
        ?>
<div class="card">
      <div class="card__header">
        <div class="card__profile">
          <img
            src="https://randomuser.me/api/portraits/men/52.jpg"
            alt="A man smiling"
          />
        </div>
        <div class="card__name">
            <h2><?php echo $row->FullName; ?></h2>
            <p><?php echo $row->Email;?></p>
          <div class="card__handle">
          </div>
        </div>
      </div>
      <hr class="border" />
      <?php
    
      ?>
      <div class="card__insights">
        <div class="card__heading">
          <div class="heading">User Profile</div>
        </div>
        <form method = 'post' action = '#' > 
        <div class="input-wrapper">
        <p>Full Name </p>
        <br>
        <input class="inputs" name = 'FullName' disabled  value="<?php echo $row->FullName; ?>" type = 'text'>
    </div>
    <div class="input-wrapper">
    <p>Password </p>
        <br>
        <input class="inputs"  name = 'password' disabled placeholder= 'Password' value="<?php echo $row->Password; ?>" type = 'password'>
    </div>

    <div class="input-wrapper">
    <p>Email Address </p>
        <br>
        <input class="inputs"  name = 'email' disabled placeholder= 'Email Address' value="<?php echo $row->Email;?>" type = 'email'>
    </div>

    <div class="input-wrapper">
    <p> Address </p>
        <br>
        <input class="inputs"  name = 'address' disabled placeholder= 'Address' value="<?php echo $row->Address;?>" type = 'text'>
    </div>


</form>
</div>
    </div>

<?php }?>
    
