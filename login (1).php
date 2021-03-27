<html>
   
   <head>
      <title>Login</title> 
      <link rel="stylesheet" href="login.css">  
   </head>
	
   <body>

<div class="login-box">
  <h2>Bine ai venit !</h2>      
         <?php 
            session_start();
            $db = mysqli_connect("localhost","root","","rotodb");
            
            if (isset($_POST['login'])){  
                $sql = "SELECT * FROM administrator WHERE username=$_POST['username'] AND password=$_POST['password'] "; 
                $result = mysqli_query($db,$sql);
                
                if($_POST['username'] == $username && $_POST['password'] == $password){
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = 'user';
                    echo "Username :".$user;
                    echo "<br>";
                    echo "Parola: ".$pass;
                    echo "<br>";
                }else{
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
       