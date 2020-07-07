<?php

if(isset($_POST['login-submit'])){

    require "dbh.inc.php";

    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pass'];
     
    if(empty($mailuid) || empty($pwd)){
        header("Location: ../index.php?error=emptfields");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE userName =? OR email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result)){
               $pwdCheck = password_verify($pwd,$row['pwd']);
               if($pwdCheck === false){
                header("Location: ../index.php?error=wrongpwd");
                exit();   
               }else if($pwdCheck === true){
                 session_start();
                 $_SESSION['email'] = $row['email'];
                 $_SESSION['id'] = $row['id'];

                 header("Location: ../index.php?login=success");
                exit();
               }else{
                header("Location: ../index.php?error=nouser2");
                exit();
               }
            }else{
                header("Location: ../index.php?error=nouser1");
                exit();
            }
        }
    }

}else{
    header("Location: ../index.php");
    exit();
}