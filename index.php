<?php
include "includes/header.php";

// session_destroy();
?>
<main id="main">
  <div class="container">


<?php if($flag ==1){
  ?>
<div id="user-prof" class="w-sm-100">
  <img src="<?=$_SESSION['avatar']?>"  alt="">
  <div>
  <h3>User: <?=$_SESSION['username']?></h3>
  <h4>Your score: <?=$_SESSION['score']?></h4>
  <a href="logout.php">Logout</a>
  </div>
</div>

<?php
}
?>
    <div class="landing"><h1>Welcome to Pairs</h1>

<?php

  if(isset($_SESSION["username"])&&$_SESSION["username"]!=""){
    echo '<a href="pairs.php">Click here to play</a>';
  }else{
    echo '<p>You’re not using a registered session?
    <a href="registration.php">Register now</a></p>';
  }

?>
</div>
</div>
</main>
<?php

include "includes/footer.php";