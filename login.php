<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
<title> Login Page   </title>
</head>
    
<body onunload="javascript:funcionCalculo()">
...
<script type="text/javascript">
function funcionCalculo() {
     aquí la llamada a la función que cierra sesión
}
</script>

    
<form action="" method="post">
    <table width="200" border="0">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="user" > </td>
  </tr>
  <tr>
    <td> PassWord  </td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>
</body>
</html>

<?php  session_start(); ?>  // session starts with the help of this function 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }
else
{
    include 'login.html';
}

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

    if(isset($_POST["user"]) && isset($_POST["pass"])){
    $file = fopen('data.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
    if(trim($array[0]) == $_POST['user'] && trim($array[1]) == $_POST['pass']){
            $good=true;
            break;
        }
    }

    if($good){
    $_SESSION['use'] = $user;
        echo '<script type="text/javascript"> window.open("home.php","_self");</script>';  
    }else{
        echo "invalid UserName or Password";
    }
    fclose($file);
    }
    else{
        include 'login.html';
    }

}

?>