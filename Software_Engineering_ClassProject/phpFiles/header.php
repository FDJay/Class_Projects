

<?php
session_start();
 require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="style.css">
</head>


<body>

	<header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.png" alt="chicagogigs_logo" width="75px">
        </a>
        <ul>
          <li><a href="index.php" 
            <?php   

            $url = $_SERVER['REQUEST_URI'];

            if ($url == '/project/index.php')
            {
              echo 'style="color: green;"';
            }

            ?>

          >Home</a></li>
          <li><a href="venues.php"
              <?php   

            $url = $_SERVER['REQUEST_URI'];

            if ($url == '/project/venues.php')
            {
              echo 'style="color: green;"';
            }

            ?>



            >Venues</a></li>
          <li><a href="concerts.php"
            <?php   

            $url = $_SERVER['REQUEST_URI'];

            if ($url == '/project/concerts.php')
            {
              echo 'style="color: green;"';
            }

            ?>

            >Concerts</a></li>
          <li><a href="tickets.php"
            <?php   

            $url = $_SERVER['REQUEST_URI'];

            if ($url == '/project/tickets.php')
            {
              echo 'style="color: green;"';
            }

            ?>


            >Tickets</a></li>
        </ul>
      </nav>
      <div class="header-login">

      	<?php
        				if (!isset($_SESSION['id'])) {
         				 echo '<form action="includes/login.inc.php" class= "signinform" method="post">
          				  <input type="text" name="mailuid" placeholder="E-mail/Username">
         				   <input type="password" name="pwd" placeholder="Password">
         			   <button type="submit" name="login-submit">Login</button>
         			 </form>
        			  <a href="signup.php" class="header-signup">Signup</a>';
       					 }
       				 else if (isset($_SESSION['id'])) {
        			  echo '<form action="includes/logout.inc.php" class = "signinform" method="post">
        			    <button type="submit" name="login-submit">Logout</button>
        			  </form>';
        				}
        ?>


   

      	
          
        
       
      </div>
    </header>
