<?php
$user_total= 0;


if(isset($_POST['act']) && !empty($_POST['act']) && $_POST['act']=="register"){

  if(isset($_POST['username']) && isset($_POST['avatar']) && isset($_POST['score'])
        && $_POST['username']!="" && $_POST['avatar'] && $_POST['score']!=""){
          $username = $_POST['username'];
          $avatar = $_POST['avatar'];
          $score = $_POST['score'];
          $level = $_POST['level'];
          session_start();
          $_SESSION['username']=$username;          
          $_SESSION['avatar']=$avatar;          
          $_SESSION['score']=$score;
          $_SESSION['level'] = $level;          
         
          if(setcookie("user[".$username."]",$avatar."|".$level."|".$score,time()+30*86400)){
            echo '1';
          }else{
            echo '0';
          }
          if(isset($_COOKIE['total_user_num'])){
            $user_total = $_COOKIE['total_user_num'];
            $user_total++;
            setcookie("total_user_num",$user_total,time()+86400);
            //$_COOKIE['total_user_num']=$user_total;
          }else{
            $user_total++;
            setcookie("total_user_num",$user_total);
          }
         
         
  }else{
          echo '0';
  }
}else 
if(isset($_POST['act']) && $_POST['act']=="saveimg"){

  try{
 // Define the Base64 value you need to save as an image
 $data = $_POST['image'];

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
 $imgname=uniqid().".png";

 // create image file
 
 $fp = fopen("./assets/avatar/".$imgname,"w+");
 
 // write data to image
 
 fwrite($fp,$data);

 echo "./assets/avatar/".$imgname;
  }catch(Exception $e){
    echo '0';
  }
 
}else if(isset($_POST['act']) && $_POST['act']=="user_check"){
  $user_name_chk = $_POST['username'];
  if (isset($_COOKIE['user'])) {
    $status = 0;
    foreach ($_COOKIE['user'] as $name => $value) {
        $name = htmlspecialchars($name);
        if($name == $user_name_chk){
         $status = 1;
         break;
        }
    }
    if($status == 1){
      echo "inuse";
    }else{
      echo "1";
    }
}else{
  echo "1";
}
}else if(isset($_POST['act']) && $_POST['act']=="score"){
  session_start();
  $username = $_SESSION['username'];
  $avatar = $_SESSION['avatar'];
  $level = $_SESSION['level'];
  $score = $_POST['score'];
  $_SESSION['score']=$score;
  setcookie("user[".$username."]",$avatar."|".$level."|".$score,time()+30*86400);
}else{
  echo '0';
}
?>