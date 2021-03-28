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
//    mysqli_select_db($conn, "rotodb");
    
    if ($stmt = $conn->prepare('SELECT username, password FROM administrator WHERE username = ?')) {
	   $stmt->bind_param('s', $_POST['username']);
	   $stmt->execute();
	   $stmt->store_result();
        if ($stmt->num_rows > 0) {
	       $stmt->bind_result($id, $password);
	       $stmt->fetch();
	       if (password_verify($_POST['password'], $password)) {
		      session_regenerate_id();
              echo "Date corecte";
	       } else {
                  echo 'Nume si parola gresite';
	       }
        } else {
	       echo 'GRESIT!';
        }
	   $stmt->close(); 
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
       