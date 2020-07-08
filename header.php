 <?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score</title>
</head>

<header>
  <nav>
    <a href="">
<!--       <img src="img/logo.icon" alt="logo"> -->
    </a>
    <ul>
      <li><a href="index.php"></a>Home</li>
      <li><a href="index.php"></a>Portofolio</li>
      <li><a href="index.php"></a>About Me</li>
      <li><a href="index.php"></a>Contact</li>
    </ul>

    <div>
      <?php
        if(isset($_SESSION['id'])){
          echo 'ID:'.$_SESSION['id'];
              echo '<form action="includes/logout.inc.php">
              <button type="submit" name="logout-submit">Logout</button>
             </form>';
         }else{
            echo '<form action="includes/login.inc.php" method="POST">
            <input type="text" name="mailuid" placeholder="Username/Email...">
            <input type="password" name="pass" placeholder="Password...">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php">signUp</a>';
        }
      ?>  
     
    </div>
  </nav>
</header>

</html>

<!-- <?php
      $num1 =  $_REQUEST['num_1'];
      $num2 =  $_REQUEST['num_2'];

      echo $num2;
    ?> -->
