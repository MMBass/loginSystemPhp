<?php

if(isset($_POST['signup_submit'])){

    require "dbh.inc.php";

    $userName = $_POST['un'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passRepeat = $_POST['pwd_repeat'];

    if(empty($userName)|| empty($email)||empty($password)||empty($passRepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$userName."&email=".$email);
        exit();
    }else if(!preg_match("/^[a-zA-Z00-9]*$/",$userName) && !filter_var($email,FILTER_VALIDATE_EMAIL)){

        header("Location: ../signup.php?error=invalidmail&uid=");
          exit();

    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$userName);
          exit();
    }else if(!preg_match("/^[a-zA-Z00-9]*$/",$userName)){
        header("Location: ../signup.php?error=invalidmail&uid=".$email);
          exit();
    }else if($password !== $passRepeat){
        header("Location: ../signup.php?error=passcheckuid=".$email);
          exit();
    }else{
      $sql = "SELECT id FROM users WHERE id=?";
      $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../signup.php?error=sqlerror1");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt,"s", $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $reaultCheck = mysqli_stmt_num_rows($stmt);

        if($reaultCheck >  0 ){
            header("Location: ../signup.php?error=sqlerror2");
             exit();
        }else{
          $sql = "INSERT INTO users(userName,email,pwd) VALUES(?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror3");
            exit();
          } else{
             $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
  
             mysqli_stmt_bind_param($stmt,"sss", $userName,$email,$hashedPwd);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
  
             header("Location: ../signup.php? signup=success");
             exit();
          }
        }
      } 
    }   
     
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt);

}else {
  header("Location: .../signup.php");
  exit();
}

?>