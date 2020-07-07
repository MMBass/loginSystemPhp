<?php
  require "header.php";
?>

<main>
  <div>
      <section>
          <h1>Sign Up</h1>
          
          <?php
            if(isset($_GET['error'])){
              if($_GET['error'] == 'emptyfields'){
                echo '<p>fill all the fields</p>';
              }
            }else if($_GET['signup'] == 'success'){
              echo '<p>invalid email</p>';
            }
          ?>

          <form action="includes/signup.inc.php" method="POST">
            <input type="text" name="un" id="" placeholder="User Name...">
            <input type="email" name="email" id="" placeholder="Email...">
            <input type="password" name="pwd" id="" placeholder="Password...">
            <input type="password" name="pwd_repeat" id="" placeholder="Repeat Password...">

            <button type="submit" name="signup_submit">Sign Up</button>
          </form>

      </section>
  </div>
</main>

<?php
  require "footer.php";
?>