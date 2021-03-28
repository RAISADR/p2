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
    
    if(isset($_POST['username'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="select * from administrator where username=".$username."AND password=".$password."limit 1";
        $result=mysqli_query($conn,$sql);
        if(! $sql){ // de aici cred ca intervine problema oricarui rezultat aruncat in 'else'
            echo "Nume si parola corecte";
        }else{
            echo"Incorect";
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
       