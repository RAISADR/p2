<?php
   session_id("mainID");
   session_start();
?>

<html>
   
   <head>
      <title>Login</title> 
      <link rel="stylesheet" href="login.css">  
   </head>
	
   <body>

    <?php
            $conn=mysqli_connect("localhost", "root", "") or 
                  die(mysqli_error($myConnection));
                  mysqli_select_db($conn, "rotodb");


            $sql_read = "SELECT * FROM administrator";
            $result = mysqli_query($conn, $sql_read);
            if(! $result )
            {
              die("Nu se pot citi date din tabelul 'administrator' : " . mysqli_error());
            }
            while($row = $result->fetch_assoc()){
                $user = $row['username'];
                $pass = $row['password'];
                echo "Username :".$user;
                echo "<br>";
                echo "Parola: ".$pass;
                echo "<br>";
            }  

            $msg = '';
    ?>

<div class="login-box">
  <h2>Bine ai venit !</h2>      
         <?php 
            if (isset($_POST['login']) && !empty($_POST['username']) 
                   && !empty($_POST['password'])) {         
                   if ($_POST['username'] == $user && 
                      $_POST['password'] == $pass) {
                      $_SESSION['valid'] = true;
                      $_SESSION['timeout'] = time();
                      $_SESSION['username'] = 'user';
                        echo "Username :".$user;
                        echo "<br>";
                        echo "Parola: ".$pass;
                        echo "<br>";
                    
//                      header('Location: https://www.google.ro/');
                   }else {
                      echo "<div class='warning-msg'>".'Nume sau parola gresita'."</div>";
                   }
                }
        ?>
         <form  method = "post">
            <div class="user-box"> 
                <input type ="text" name ="username" placeholder="Nume utilizator" required>
            </div>   
            
            <div class="user-box"> 
                <input type ="password" name ="password" placeholder="Parola" required>
            </div>    
                <button class="button button2" type = "submit" name ="login">Login</button>
         </form>
         
</div> 
      
   </body>
</html>
       