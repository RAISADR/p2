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
    $conn=mysqli_connect("localhost", "root", "","rotodb") or die(mysqli_error($myConnection));
    
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];  
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password); 
     
        $sql = "select * from administrator where username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        if($count == 1){  
            echo "BUN";  
        }  
        else{  
            echo "GRESIT";  
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
       